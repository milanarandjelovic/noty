<?php

namespace MA\Noty;

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

/**
 * Class NotyServiceProvider
 *
 * @package MA\Noty
 */
class NotyServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfigs();

        $this->registerBladeDirectives();

        $this->publishAssets();
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('noty', function (Container $app) {
            return new Noty(NotyFactory::make($app['config']['noty']), $app['session'], $app['config']);
        });

        $this->app->alias('noty', Noty::class);

        $this->registerConfigs();
    }

    /**
     * Publish Noty configs.
     */
    public function publishConfigs()
    {
        $this->publishes([
            dirname(__DIR__) . '/publishable/config/noty.php' => config_path('noty.php'),
        ], 'config');
    }

    /**
     * Register Noty configs.
     */
    public function registerConfigs()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/publishable/config/noty.php',
            'noty'
        );
    }

    /**
     * Add Noty balde directives.
     */
    public function registerBladeDirectives()
    {
        Blade::directive('noty_render', function () {
            return '<?php echo app(\'noty\')->render(); ?>';
        });

        Blade::directive('noty_styles', function () {
            return '<?php echo noty_styles(); ?>';
        });

        Blade::directive('noty_scripts', function () {
            return '<?php echo noty_scripts(); ?>';
        });
    }

    /**
     * Publish Noty assets.
     */
    public function publishAssets()
    {
        $this->publishes([
            dirname(__DIR__) . '/publishable/assets/' => public_path('vendor/noty/'),
        ], 'public');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'noty',
        ];
    }
}
