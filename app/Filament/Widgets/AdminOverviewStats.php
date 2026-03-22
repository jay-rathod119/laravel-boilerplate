<?php

namespace App\Filament\Widgets;

use App\Enums\UserRole;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminOverviewStats extends BaseWidget
{
    protected static ?int $sort = -10;

    protected static bool $isLazy = true;

    public static function canView(): bool
    {
        $user = auth()->user();

        return $user instanceof \App\Models\User && $user->isAdmin();
    }

    protected function getStats(): array
    {
        $totalProducts = Product::query()->count();
        $thisWeek = Product::query()
            ->where('created_at', '>=', now()->startOfWeek())
            ->count();
        $panelUsers = User::query()
            ->whereIn('role', [UserRole::Admin->value, UserRole::ProductCreator->value])
            ->count();

        return [
            Stat::make('Products in catalog', (string) $totalProducts)
                ->description('All SKUs')
                ->descriptionIcon('heroicon-m-cube')
                ->color('success')
                ->icon('heroicon-o-cube'),
            Stat::make('New this week', (string) $thisWeek)
                ->description('Created since Monday')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('warning')
                ->icon('heroicon-o-calendar-days'),
            Stat::make('Panel users', (string) $panelUsers)
                ->description('Admins + product creators')
                ->descriptionIcon('heroicon-m-users')
                ->color('info')
                ->icon('heroicon-o-users'),
        ];
    }
}
