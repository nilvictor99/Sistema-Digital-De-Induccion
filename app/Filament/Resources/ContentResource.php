<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentResource\Pages;
use App\Filament\Resources\ContentResource\RelationManagers;
use App\Models\Content;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class ContentResource extends Resource
{
    protected static ?string $model = Content::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Herramientas y Contenidos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Título')
                    ->required()
                    ->maxLength(255), // Limita la longitud máxima del título

                Forms\Components\Textarea::make('description')
                    ->label('Descripción')
                    ->rows(4)
                    ->nullable(), // Campo opcional

                Forms\Components\FileUpload::make('file_path')
                    ->label('Archivo')
                    ->directory('contents') // Carpeta donde se almacenará el archivo
                    ->nullable()
                    ->maxSize(5120)
                    ->helperText('El tamaño máximo del archivo es de 1 MB.'),

                Forms\Components\TextInput::make('link')
                    ->label('Enlace')
                    ->url()
                    ->required(),

                Forms\Components\Select::make('content_type_id')
                    ->label('Tipo de Contenido')
                    ->relationship('contentType', 'name') // Relación con content_types
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->label('Nombre')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique('content_types', 'slug'),

                        Forms\Components\Textarea::make('description')
                            ->label('Descripción')
                            ->nullable(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Activo')
                            ->default(true),
                    ])
                    ->required(),

                Forms\Components\Toggle::make('is_active')
                    ->label('Activo')
                    ->default(true),

                Forms\Components\DateTimePicker::make('published_at')
                    ->label('Fecha de Publicación')
                    ->nullable(),

                Forms\Components\Select::make('created_by')
                    ->label('Creado por')
                    ->relationship('createdBy', 'name') // Relación con el modelo User
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable() // Permite buscar por este campo
                    ->sortable(), // Permite ordenar por este campo

                Tables\Columns\TextColumn::make('contentType.name')
                    ->label('Tipo de Contenido')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Descripción')
                    ->searchable()
                    ->limit(50),

                Tables\Columns\BooleanColumn::make('is_active')
                    ->label('Activo'),

                Tables\Columns\TextColumn::make('link')
                    ->label('Enlace')
                    ->searchable()
                    ->url(fn($record) => $record->link)
                    ->openUrlInNewTab(),



                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado el')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('content_type_id')
                    ->label('Tipo de Contenido')
                    ->relationship('contentType', 'name') // Filtra por la relación con ContentType
                    ->placeholder('Todos los tipos'),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Activo')
                    ->trueLabel('Sí')
                    ->falseLabel('No'),

                Tables\Filters\Filter::make('published_at')
                    ->label('Publicado Desde')
                    ->form([
                        Forms\Components\DatePicker::make('published_at')
                            ->label('Seleccionar fecha')
                            ->placeholder('Seleccionar fecha')
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        // Filtra por la fecha seleccionada
                        if (isset($data['published_at'])) {
                            $query->whereDate('published_at', $data['published_at']);
                        }
                        return $query;
                    }),

            ])
            ->actions([
                Tables\Actions\EditAction::make(), // Permite editar registros desde la tabla
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // Permite eliminar múltiples registros
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ActivitiesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContents::route('/'),
            'create' => Pages\CreateContent::route('/create'),
            'edit' => Pages\EditContent::route('/{record}/edit'),
        ];
    }
}
