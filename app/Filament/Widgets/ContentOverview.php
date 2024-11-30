<?php

namespace App\Filament\Widgets;

use App\Models\Content;
use App\Models\ContentType;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;

class ContentOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Card::make('Total de Contenidos', Content::count())
                ->description('Todos los contenidos registrados')
                ->icon('heroicon-o-document')
                ->color('gray'),

            // Contenidos activos
            Card::make('Contenidos Activos', Content::where('is_active', true)->count())
                ->description('Contenidos que están activos actualmente')
                ->color('success'),

            // Contenidos publicados
            Card::make('Contenidos Publicados', Content::whereNotNull('published_at')->count())
                ->description('Contenidos que ya han sido publicados')
                ->color('primary'),

            // Tipos de contenido
            Card::make('Tipos de Contenido', ContentType::count())
                ->description('Cantidad de tipos de contenido disponibles')
                ->color('warning'),
        ];
    }
}
