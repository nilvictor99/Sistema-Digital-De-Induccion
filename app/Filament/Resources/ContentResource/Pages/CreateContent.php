<?php

namespace App\Filament\Resources\ContentResource\Pages;

use App\Filament\Resources\ContentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContent extends CreateRecord
{
    protected static string $resource = ContentResource::class;

    public function canCreate(): bool
    {
        return auth()->user()->can('create Content'); // Verificación del permiso
    }
}
