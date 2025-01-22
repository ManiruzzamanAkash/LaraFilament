<?php

namespace App\Filament\Pages;

class Dashboard extends \Filament\Pages\Dashboard
{
    public function getWidgets(): array
    {
        return [
            \App\Filament\Resources\UserResource\Widgets\UserStats::class,
            \App\Filament\Resources\BlogPostResource\Widgets\BlogPostStats::class,
            \App\Filament\Resources\BlogPostResource\Widgets\BlogPostChart::class,
            \App\Filament\Resources\BlogPostResource\Widgets\BlogPostView::class,
        ];
    }
}