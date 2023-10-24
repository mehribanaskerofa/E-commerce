<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        User::observe(UserObserver::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        Model::preventLazyLoading(!$this->app->isProduction());

        $womanCategory=Category::first();
        $menuBar=Menu::where('active',1)->get();
        View::share([
            'womanCategory'=>$womanCategory,
            'menuBar'=>$menuBar
        ]);
    }
}
