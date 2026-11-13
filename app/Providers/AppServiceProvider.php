<?php

namespace App\Providers;

use Illuminate\Foundation\DevCommands;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        DevCommands::artisan('serve --host=0.0.0.0 --port=8000', 'server');

        $applicationHost = parse_url(config('app.url'), PHP_URL_HOST);

        if (
            app()->isLocal()
            && is_string($applicationHost)
            && str_ends_with($applicationHost, '.asse.devtunnels.ms')
        ) {
            Vite::useHotFile(storage_path('framework/vite-tunnel.hot'))
                ->createAssetPathsUsing(
                    fn (string $path, ?bool $secure): string => url(
                        $path,
                        [],
                        $secure ?? (
                            request()->isSecure()
                            || str_ends_with(request()->getHost(), '.asse.devtunnels.ms')
                        ),
                    ),
                );
        }
    }
}
