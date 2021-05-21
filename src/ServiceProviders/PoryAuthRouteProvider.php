<?php


namespace Pory\Auth\ServiceProviders;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;


class PoryAuthRouteProvider extends RouteServiceProvider
{
     protected $namespace = 'Pory\\Auth\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     * @return void
     */
    public function boot()
    {
        parent::boot();
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api/auth')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(__DIR__.'/../routes/api.php');
        });
    }

    /**
     * Configure the rate limiters for the application.
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }

}
