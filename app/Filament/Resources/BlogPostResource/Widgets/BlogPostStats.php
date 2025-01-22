<?php

namespace App\Filament\Resources\BlogPostResource\Widgets;

use App\Models\BlogPost;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BlogPostStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Published Posts', value: BlogPost::where('is_published', true)->count())
                ->icon('heroicon-o-document-text')
                ->color('blue'),
            Stat::make('Draft Posts', value: BlogPost::where('is_published', false)->count())
                ->icon('heroicon-o-document')
                ->color('gray'),
            Stat::make('Total Views', value: BlogPost::sum('views'))
                ->icon('heroicon-o-eye')
                ->color('green'),
        ];
    }
}
