<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends BaseDashboard
{
    public function getTitle(): string | Htmlable
    {
        return __('Admin overview');
    }

    public function getSubheading(): string | Htmlable | null
    {
        $user = auth()->user();
        if ($user instanceof \App\Models\User && $user->isAdmin()) {
            return __('Monitor catalog activity, recent items, and your account.');
        }

        return __('Use the sidebar to add products or manage your account.');
    }

    /**
     * @return int | string | array<string, int | string | null>
     */
    public function getColumns(): int | string | array
    {
        return [
            'default' => 1,
            'sm' => 2,
            'lg' => 2,
        ];
    }
}
