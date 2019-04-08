<?php

namespace PawelMysior\Admin;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use PawelMysior\Admin\Http\Middleware\CheckIsAdmin;

class AdminServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::group([
            'middleware' => ['web', 'auth', CheckIsAdmin::class],
            'prefix' => 'admin',
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
