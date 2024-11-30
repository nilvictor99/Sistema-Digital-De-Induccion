<?php

namespace App\Filament\Resources\ContentResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActivitiesRelationManager extends RelationManager
{
    protected static string $relationship = 'activities';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan('full'),

                Forms\Components\TextInput::make('description')
                    ->label('Descripción')
                    ->maxLength(255)
                    ->columnSpan('full'),

                Forms\Components\DatePicker::make('due_date')
                    ->label('Fecha Límite')
                    ->nullable(),

                Forms\Components\Select::make('status')
                    ->label('Estado')
                    ->required()
                    ->options([
                        'pending' => 'Pendiente',
                        'in_progress' => 'En Progreso',
                        'completed' => 'Completado',
                    ])
                    ->default('pending'),

                Forms\Components\Select::make('priority')
                    ->label('Prioridad')
                    ->required()
                    ->options([
                        'low' => 'Baja',
                        'medium' => 'Media',
                        'high' => 'Alta',
                    ])
                    ->default('medium'),

                Forms\Components\DateTimePicker::make('completed_at')
                    ->label('Fecha de Finalización')
                    ->nullable()
                    ->columnSpan('full'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('description')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(), // Permite ordenar por ID
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->sortable()
                    ->searchable(), // Permite buscar por nombre
                Tables\Columns\TextColumn::make('description')
                    ->label('Descripción')
                    ->limit(50) // Limita la longitud del texto mostrado
                    ->searchable(),
                Tables\Columns\TextColumn::make('due_date')
                    ->label('Fecha Límite')
                    ->date(), // Formato de fecha
                Tables\Columns\TextColumn::make('status')
                    ->label('Estado')
                    ->sortable(), // Ordenar por estado
                Tables\Columns\TextColumn::make('priority')
                    ->label('Prioridad')
                    ->sortable(),
                Tables\Columns\TextColumn::make('completed_at')
                    ->label('Completada en')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creada en')
                    ->dateTime(),

            ])
            ->filters([
                Tables\Filters\Filter::make('pending')
                    ->label('Pendiente')
                    ->query(fn(Builder $query) => $query->where('status', 'pending')),
                Tables\Filters\Filter::make('in_progress')
                    ->label('En Progreso')
                    ->query(fn(Builder $query) => $query->where('status', 'in_progress')),
                Tables\Filters\Filter::make('completed')
                    ->label('Completadas')
                    ->query(fn(Builder $query) => $query->where('status', 'completed')),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
