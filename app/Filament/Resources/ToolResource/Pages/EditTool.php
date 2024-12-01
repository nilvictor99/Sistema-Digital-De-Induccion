<?php

namespace App\Filament\Resources\ToolResource\Pages;

use App\Filament\Resources\ToolResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTool extends EditRecord
{
    protected static string $resource = ToolResource::class;

    public function canEdit(): bool
    {
        return auth()->user()->can('update Tool'); // Verificación del permiso
    }

    // Sobrescribe este método para controlar si el usuario puede eliminar el registro
    public function canDelete(): bool
    {
        return auth()->user()->can('delete Tool'); // Verificación del permiso
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
