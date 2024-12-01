<?php

namespace App\Filament\Widgets;

use App\Models\Content;
use App\Models\ContentType;
use App\Models\Tool;
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

            // Herramientas
            Card::make('Total de Herramientas', Tool::count())
                ->description('Todas las herramientas registradas')
                ->icon('heroicon-o-wrench')
                ->color('gray'),

            // Herramientas activas
            Card::make('Herramientas Activas', Tool::where('is_active', true)->count())
                ->description('Herramientas que están activas actualmente')
                ->color('success'),

            // Herramientas en mantenimiento
            Card::make('Herramientas en Mantenimiento', Tool::where('is_in_maintenance', true)->count())
                ->description('Herramientas que están en mantenimiento')
                ->color('warning'),
        ];
    }
}