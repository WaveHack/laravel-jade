<?php namespace LaravelJade;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerEngineResolver();
    }

    /**
     * Register the engine resolver instance.
     */
    public function registerEngineResolver()
    {
        $resolver = $this->app['view.engine.resolver'];

        $this->registerJadeEngine($resolver);
    }

    /**
     * Register the Jade engine implementation.
     *
     * @param \Illuminate\View\Engines\EngineResolver $resolver
     */
    public function registerJadeEngine(EngineResolver $resolver)
    {
        $app = $this->app;

        $app->singleton('jade.compiler', function ($app) {
            $cache = $app['config']['view.compiled'];

            return new JadeCompiler($app['files'], $cache);
        });

        $resolver->register('jade', function () use ($app) {
            return new CompilerEngine($app['jade.compiler'], $app['files']);
        });

        $app['view']->addExtension('jade.php', 'jade');
    }
}
