<?php

namespace App\Filament\Resources\ContentResource\Pages;

use App\Filament\Resources\ContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContent extends EditRecord
{
    protected static string $resource = ContentResource::class;

    public function canEdit(): bool
    {
        return auth()->user()->can('update Content'); // Verificación del permiso
    }

    // Sobrescribe este método para controlar si el usuario puede eliminar el contenido
    public function canDelete(): bool
    {
        return auth()->user()->can('delete Content'); // Verificación del permiso
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
