<?php


namespace Pory\Auth\ServiceProviders;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Pory\Auth\Services\PoryAuthServices;

class PoryAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app['router']->aliasMiddleware('pory-auth', MiddlewareServices::class);

        Config::set('pory.modules.auth', [
            'description'    => '',
            'active'    => true,
            'config'    => [
                'dbConnection' => [
                    'driver' => env('AUTH_DB_CONNECTION'),
                    'host' => env('AUTH_DB_HOST'),
                    'port' => env('AUTH_DB_PORT'),
                    'database' => env('AUTH_DB_DATABASE'),
                    'username' => env('AUTH_DB_USERNAME'),
                    'password' => env('AUTH_DB_PASSWORD'),
                ]
            ]

        ]);
        $this->publishes([
            __DIR__ . '/../../publishes/config.auth.php' => config_path('pory.auth.php'),
            __DIR__ . '/../../publishes/PoryAuthCheck.php' => app_path('HTTP/Middleware/PoryAuthCheck.php')
        ]);
    }

    public function register()
    {
        $this->app->singleton('poryAuth', function () {
            return new PoryAuthServices();
        });
    }

}
