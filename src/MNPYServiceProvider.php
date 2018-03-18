<?php

namespace MNPY\Laravel;

use Illuminate\Support\ServiceProvider;
use MNPY\SDK\Price;
use MNPY\SDK\Token;
use MNPY\SDK\Transaction;

class MNPYServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/mnpy.php' => config_path('mnpy.php'),
        ]);

        $this->app['MNPYTransaction'] = function ($app) {
            return $app[Transaction::class];
        };
        $this->app['MNPYPrice'] = function ($app) {
            return $app[Price::class];
        };
        $this->app['MNPYToken'] = function ($app) {
            return $app[Token::class];
        };
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/mnpy.php', 'mnpy');

        $this->app->singleton(Transaction::class, function ($app) {
            return new Transaction(config('mnpy.api_key'));
        });
        $this->app->singleton(Price::class, function ($app) {
            return new Price(config('mnpy.api_key'));
        });
        $this->app->singleton(Token::class, function ($app) {
            return new Token(config('mnpy.api_key'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            Transaction::class,
            Price::class,
            Token::class,
            'MNPYTransaction',
            'MNPYPrice',
            'MNPYToken'
        ];
    }
}