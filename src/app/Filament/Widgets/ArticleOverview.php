<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\ArticleNewsResource\Widgets\PostCountOrderByDayChart;
use App\Models\ArticleNews;
use App\Models\Author;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Widget;

class ArticleOverview extends BaseWidget
{
    protected function getStats(): array
    {
       return [
            Stat::make('Article News', ArticleNews::count())
                ->description('Total articles published')
                ->color('primary')
                ->icon('heroicon-o-newspaper'),
            Stat::make('Authors', Author::count())
                ->description('Total authors contributing')
                ->color('primary')
                ->icon('heroicon-o-user-circle'),
            Stat::make('Categories', Category::count())
                ->description('Total categories available')
                ->color('primary')
                ->icon('heroicon-o-tag'),
        ];
    }
}
