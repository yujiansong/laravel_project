<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->share('siteName', '健力宝');
        view()->share('siteUrl', 'http://www.jianlibao.com.cn');
        view()->share('userName', '半职业选手王老二');
        view()->share('userNo', '20190102');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
