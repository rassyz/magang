<?php

namespace App\Filament\Resources\ArticleNewsResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ArticleNewsResource;
use App\Filament\Resources\ArticleNewsResource\Widgets\ArticleCount;
use App\Filament\Resources\ArticleNewsResource\Widgets\PostCountOrderByDayChart;

class ListArticleNews extends ListRecords
{
    protected static string $resource = ArticleNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            PostCountOrderByDayChart::make(),
            ArticleCount::make(),
        ];
    }
}
