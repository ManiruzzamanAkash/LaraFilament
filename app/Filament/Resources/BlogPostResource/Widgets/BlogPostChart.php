<?php

namespace App\Filament\Resources\BlogPostResource\Widgets;


use App\Models\BlogPost;
use Filament\Widgets\ChartWidget;

class BlogPostChart extends ChartWidget
{
    protected static ?string $heading = 'Blog Posts Created by Month';

    protected function getData(): array
    {
        $posts = BlogPost::selectRaw('COUNT(*) as count, strftime("%m", published_at) as month')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $month = str_pad($i, 2, '0', STR_PAD_LEFT);
            $data[] = $posts[$month] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => $data,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
