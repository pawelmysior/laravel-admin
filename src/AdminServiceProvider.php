<?php

namespace PawelMysior\Admin;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use PawelMysior\Admin\Http\Middleware\CheckIsAdmin;

class AdminServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'admin');

        $this->publishes([
            __DIR__ . '/../public' => public_path('vendor/admin'),
        ], 'admin-assets');

        Route::group([
            'prefix' => 'admin',
            'as' => 'admin.',
            'middleware' => 'web',
        ], function () {
            Route::group([
                'namespace' => 'PawelMysior\Admin\Http\Controllers',
            ], function () {
                $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
            });

            Route::group([
                'namespace' => 'App\Http\Controllers\Admin',
                'middleware' => ['auth', CheckIsAdmin::class],
            ], function () {
                $this->loadRoutesFrom(base_path('routes/admin.php'));
            });
        });
    }
}
