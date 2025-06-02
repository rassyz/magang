<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\ArticleNews;
use Filament\Widgets\ChartWidget;

class PostCountChart extends ChartWidget
{
    protected static ?string $heading = 'Chart Jumlah Postingan per Minggu';

    protected function getData(): array
    {
        // Mendapatkan data postingan baru per minggu
        $postsPerWeek = ArticleNews::query()
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%v") as week') // Format untuk mendapatkan nomor minggu
            ->selectRaw('COUNT(*) as count')
            ->groupBy('week')
            ->orderBy('week', 'asc')
            ->get();

        $labels = [];
        $data = [];

        // Generate labels for the last 8 weeks (or adjust as needed)
        for ($i = 7; $i >= 0; $i--) { // Mengambil 8 minggu terakhir (minggu ini + 7 minggu sebelumnya)
            $weekStart = Carbon::now()->subWeeks($i)->startOfWeek(Carbon::MONDAY); // Mulai minggu dari Senin
            $weekEnd = Carbon::now()->subWeeks($i)->endOfWeek(Carbon::MONDAY);
            $labels[] = $weekStart->format('d M'); // Label: Tanggal awal minggu (contoh: 01 Jan)
        }

        // Fill data based on labels
        foreach ($labels as $label) {
            $date = Carbon::createFromFormat('d M', $label);
            $weekNumber = $date->format('Y-W'); // Menggunakan format tahun-minggu (ISO-8601)

            $postCount = $postsPerWeek->firstWhere('week', $weekNumber);
            $data[] = $postCount ? $postCount->count : 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Postingan',
                    'data' => $data,
                    'borderColor' => '#36A2EB', // Warna garis
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)', // Warna area di bawah garis
                    'fill' => true,
                    'tension' => 0.3, // Kehalusan garis
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
                    'beginAtZero' => true, // Mulai sumbu Y dari nol
                    'ticks' => [
                        'stepSize' => 1, // Langkah kenaikan pada sumbu Y
                    ],
                ],
            ],
        ];
    }
}
