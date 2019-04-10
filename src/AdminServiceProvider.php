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
            'middleware' => ['web', 'auth', CheckIsAdmin::class],
            'prefix' => 'admin',
            'as' => 'admin.',
        ], function () {
            Route::namespace('PawelMysior\Admin\Http\Controllers')->group(function () {
                $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
            });

            Route::namespace('App\Http\Controllers\Admin')->group(function () {
                $this->loadRoutesFrom(base_path('routes/admin.php'));
            });
        });
    }
}
