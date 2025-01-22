<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', value: User::count())
                ->icon('heroicon-o-user-group')
                ->color('blue'),
        ];
    }
}
