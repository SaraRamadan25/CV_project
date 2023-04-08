<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {    $usersCount = User::count();
        $testimonialsCount = Testimonial::count();
        $projectsCount = Project::count();
        $CategoryCount = Category::count();

        return [
            Card::make("Total number of users' CVs", $usersCount),
            Card::make("Total number of testimonials", $testimonialsCount),
            Card::make("Total number of projects", $projectsCount),
            Card::make("Total number of categories", $CategoryCount),

        ];


    }
}
