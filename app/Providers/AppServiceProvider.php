<?php

namespace App\Providers;

use App\Policies\KnjigePolicy;
use Illuminate\Support\ServiceProvider;
use App\Models\Knjige;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       Gate::policy(Knjige::class, KnjigePolicy::class);
    }
}
