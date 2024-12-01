<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Configuración';
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->hasRole('Super Admin');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required(),
                Forms\Components\Select::make('roles')
                    ->multiple()
                    ->label('Roles')->multiple()->relationship('roles', 'name')->options(Role::all()->pluck('name', 'id')),
                Forms\Components\Select::make('permissions')
                    ->multiple()
                    ->label('Permisos')->multiple()->relationship('permissions', 'name')->options(Permission::all()->pluck('name', 'id'))->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')->sortable(),
                Tables\Columns\TextColumn::make('roles.name'),
            ])
            ->filters([
                //
            ])
            ->filters([
                Tables\Filters\Filter::make('verified')
                    ->query(fn(Builder $query): Builder => $query->whereNotNull('email_verified_at')),
                Tables\Filters\Filter::make('unverified')
                    ->query(fn(Builder $query): Builder => $query->whereNull('email_verified_at')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('verify')->icon('heroicon-m-check-badge')
                    ->action(function (User $user) {
                        $user->email_verified_at = now();
                        $user->save();
                    }),
                Tables\Actions\Action::make('Unverify')->icon('heroicon-m-x-circle')
                    ->action(function (User $user) {
                        $user->email_verified_at = null;
                        $user->save();
                    })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
