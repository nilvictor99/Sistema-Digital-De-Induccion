<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'userChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Usuarios Registrados';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $monthlyCounts = array_fill(0, 12, 0); // Crear un array con 12 ceros para cada mes

        // Obtener el conteo de usuarios por mes
        User::select(DB::raw("strftime('%m', created_at) as month"), DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y')) // Filtrar por el año actual
            ->groupBy(DB::raw("strftime('%m', created_at)")) // Agrupar por mes
            ->orderBy(DB::raw("strftime('%m', created_at)")) // Ordenar por mes
            ->get()
            ->each(function ($item) use (&$monthlyCounts) {
                $monthlyCounts[(int) $item->month - 1] = $item->count; // Asignar el conteo al mes correspondiente
            });
        return [
            'chart' => [
            'type' => 'area',
            'width' => '100%', // Cambiar a '100%' para ocupar todo el ancho
            'height' => 300,
            ],
            'series' => [
            [
                'name' => 'UserChart',
                'data' => $monthlyCounts,
            ],
            ],
            'xaxis' => [
            'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'labels' => [
                'style' => [
                'fontFamily' => 'inherit',
                ],
            ],
            ],
            'yaxis' => [
            'labels' => [
                'style' => [
                'fontFamily' => 'inherit',
                ],
            ],
            ],
            'colors' => ['#f59e0b'],
            'stroke' => [
            'curve' => 'smooth',
            ],
            'dataLabels' => [
            'enabled' => false,
            ],
        ];
        }
    }
