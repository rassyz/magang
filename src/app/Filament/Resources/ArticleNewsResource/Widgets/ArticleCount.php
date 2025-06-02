<?php

namespace App\Filament\Resources\ArticleNewsResource\Widgets;

use App\Models\ArticleNews;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ArticleCount extends BaseWidget
{

    protected int | string | array $columnSpan = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Article News', ArticleNews::count())
                ->description('Total articles published')
                ->color('primary')
                ->icon('heroicon-o-newspaper'),
        ];
    }
}
