<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $cards = [
            Card::make("Total number of users' CVs", User::count()),
        ];

        User::withCount('projects')->each(function ($user) use (&$cards) {
            $cards[] = Card::make("Total Number of projects for {$user->username}", $user->projects_count);
        });

        User::withCount('testimonials')->each(function ($user) use (&$cards) {
            $cards[] = Card::make("Total Number of testimonials for {$user->username}", $user->testimonials_count);
        });

        return $cards;
    }


}
