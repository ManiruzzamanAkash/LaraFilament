<?php

namespace App\Filament\Resources\BlogPostResource\Widgets;

use App\Models\BlogPost;
use Filament\Widgets\ChartWidget;

class BlogPostView extends ChartWidget
{
    protected static ?string $heading = 'Top 10 Blog Posts';

    protected function getData(): array
    {
        $posts = BlogPost::orderBy('views', 'desc')
            ->take(10)
            ->get(['title', 'views']);

        $labels = $posts->pluck('title')->toArray();
        $data = $posts->pluck('views')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Views',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}