<?php

namespace App\Providers;

<<<<<<< HEAD
use App\Http\View\Composers\SidebarComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
=======
use Illuminate\Support\ServiceProvider;
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699

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
<<<<<<< HEAD
        View::composer('components.sidebar', SidebarComposer::class);
=======
        //
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
    }
}
