<?php

namespace App\Providers;

use App\Business\MutliLang;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        @session_start();
        $default_lang = MutliLang::default_lang_short();
        session()->put('locale', $default_lang);

        app()->setLocale(session()->get('locale'));
        Paginator::useBootstrap();
    }
}
