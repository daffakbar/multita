<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapWalikelaRoutes();

        $this->mapWalikelassRoutes();

        $this->mapKepalasekolahRoutes();

        $this->mapSiswaRoutes();

        $this->mapWalimuridRoutes();

        $this->mapTimketertibanRoutes();

        $this->mapBkRoutes();

        //
    }

    /**
     * Define the "bk" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapBkRoutes()
    {
        Route::group([
            'middleware' => ['web', 'bk', 'auth:bk'],
            'prefix' => 'bk',
            'as' => 'bk.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/bk.php');
        });
    }

    /**
     * Define the "timketertiban" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapTimketertibanRoutes()
    {
        Route::group([
            'middleware' => ['web', 'timketertiban', 'auth:timketertiban'],
            'prefix' => 'timketertiban',
            'as' => 'timketertiban.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/timketertiban.php');
        });
    }

    /**
     * Define the "walimurid" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWalimuridRoutes()
    {
        Route::group([
            'middleware' => ['web', 'walimurid', 'auth:walimurid'],
            'prefix' => 'walimurid',
            'as' => 'walimurid.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/walimurid.php');
        });
    }

    /**
     * Define the "siswa" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapSiswaRoutes()
    {
        Route::group([
            'middleware' => ['web', 'siswa', 'auth:siswa'],
            'prefix' => 'siswa',
            'as' => 'siswa.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/siswa.php');
        });
    }

    /**
     * Define the "kepalasekolah" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapKepalasekolahRoutes()
    {
        Route::group([
            'middleware' => ['web', 'kepalasekolah', 'auth:kepalasekolah'],
            'prefix' => 'kepalasekolah',
            'as' => 'kepalasekolah.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/kepalasekolah.php');
        });
    }

    /**
     * Define the "walikelass" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWalikelassRoutes()
    {
        Route::group([
            'middleware' => ['web', 'walikelass', 'auth:walikelass'],
            'prefix' => 'walikelass',
            'as' => 'walikelass.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/walikelass.php');
        });
    }

    /**
     * Define the "walikela" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWalikelaRoutes()
    {
        Route::group([
            'middleware' => ['web', 'walikela', 'auth:walikela'],
            'prefix' => 'walikela',
            'as' => 'walikela.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/walikela.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
