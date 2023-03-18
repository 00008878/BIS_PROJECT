<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\HttpRepositories\GaiHttpRepository\GaiHttpRepository;
use App\HttpRepositories\MibHttpRepository\MibHttpRepository;
use App\HttpRepositories\GaiHttpRepository\LocalGaiHttpRepository;
use App\HttpRepositories\MibHttpRepository\LocalMibHttpRepository;
use App\HttpRepositories\GaiHttpRepository\GaiHttpRepositoryInterface;
use App\HttpRepositories\MibHttpRepository\MibHttpRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MibHttpRepositoryInterface::class, static function () {
            if (config('app.env') === 'production') {
                return new MibHttpRepository();
            }

            return new LocalMibHttpRepository();
        });

        $this->app->bind(GaiHttpRepositoryInterface::class, static function () {
            if (config('app.env') === 'production') {
                return new GaiHttpRepository();
            }

            return new LocalGaiHttpRepository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
