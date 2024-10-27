<?php

namespace YourVendor\CashierPaymob;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;

class CashierPaymobServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerPublishables();
        $this->registerRoutes();
        $this->registerMigrations();
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        // TODO: Register PayMob adapter (client)
        // $this->app->bind(PaymobClient::class, function ($app) {
        //     return new PaymobClient(
        //         config('cashier.secret'),
        //         config('cashier.key')
        //     );
        // });

        // TODO: Extend Cashier's payment gateway
        // $this->app->extend('cashier', function ($cashier, $app) {
        //     return new PaymobCashierManager($app);
        // });
    }

    /**
     * Register the publishable resources.
     */
    protected function registerPublishables(): void
    {
        if ($this->app->runningInConsole()) {
            // Publish config
            $this->publishes([
                __DIR__.'/../config/cashier-paymob.php' => config_path('cashier-paymob.php'),
            ], 'cashier-paymob-config');

            // Publish migrations
            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'cashier-paymob-migrations');

            // Publish provider
            $this->publishes([
                __DIR__.'/CashierPaymobServiceProvider.php' => app_path('Providers/CashierPaymobServiceProvider.php'),
            ], 'cashier-paymob-provider');
        }
    }

    /**
     * Register the package routes.
     */
    protected function registerRoutes(): void
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::group([
            'prefix' => config('cashier.path', 'paymob'),
            'middleware' => config('cashier.middleware', ['web']),
        ], function () {
            // TODO: add webhook controller route
            // Route::post('/paymob/webhook', WebhookController::class)->name('cashier.paymob.webhook');
        });
    }

    /**
     * Register the package migrations.
     */
    protected function registerMigrations(): void
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }
}
