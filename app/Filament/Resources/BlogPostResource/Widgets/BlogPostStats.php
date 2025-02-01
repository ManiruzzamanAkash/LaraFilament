<?php

namespace App\Filament\Resources\BlogPostResource\Widgets;

use App\Models\BlogPost;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BlogPostStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalPublishedBlogPosts = BlogPost::where('is_published', true)->count();
        $totalDraftBlogPosts = BlogPost::where('is_published', false)->count();
        $totalViews = BlogPost::sum('views');

        return [
            Stat::make('Published Posts', number_format($totalPublishedBlogPosts))
                ->icon('heroicon-o-document-text')
                ->color('blue'),
            Stat::make('Draft Posts', number_format($totalDraftBlogPosts))
                ->icon('heroicon-o-document')
                ->color('gray'),
            Stat::make('Total Views', number_format($totalViews))
                ->icon('heroicon-o-eye')
                ->color('green'),
        ];
    }
}
