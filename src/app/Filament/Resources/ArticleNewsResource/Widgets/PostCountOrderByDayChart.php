<?php

namespace App\Filament\Resources\ArticleNewsResource\Widgets;

use Carbon\Carbon;
use App\Models\ArticleNews;
use Filament\Widgets\ChartWidget;

class PostCountOrderByDayChart extends ChartWidget
{
    protected static ?string $heading = 'Postingan Baru per Hari';

    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        // Mendapatkan data postingan baru per hari
        $postsPerDay = ArticleNews::query()
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m-%d") as date') // Format untuk mendapatkan tanggal (YYYY-MM-DD)
            ->selectRaw('COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $labels = [];
        $data = [];

        // Generate labels for the last 7 days (or adjust as needed)
        for ($i = 6; $i >= 0; $i--) { // Mengambil 7 hari terakhir (hari ini + 6 hari sebelumnya)
            $date = Carbon::now()->subDays($i);
            $labels[] = $date->format('d M'); // Label: Tanggal (contoh: 01 Jan)
        }

        // Fill data based on labels
        foreach ($labels as $label) {
            $currentDate = Carbon::createFromFormat('d M', $label)->format('Y-m-d'); // Format YYYY-MM-DD
            $postCount = $postsPerDay->firstWhere('date', $currentDate);
            $data[] = $postCount ? $postCount->count : 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Postingan',
                    'data' => $data,
                    'borderColor' => '#36A2EB',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'fill' => true,
                    'tension' => 0.3,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
        ];
    }
}
