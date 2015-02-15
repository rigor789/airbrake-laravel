<?php namespace rigor789\AirbrakeLaravel;

use Illuminate\Support;
use Illuminate\Support\ServiceProvider;
use Exception;
use Airbrake;

class AirbrakeServiceProvider extends ServiceProvider {

  /**
   * Load the provider only if it's required
   *
   * @var bool
   */
  protected $defer = false;

  /**
   * Catch all exceptions and send them to Airbrake if enabled.
   *
   * @return void
   */
  public function boot()
  {
    $this->publishes([
      __DIR__.'/config/airbrake.php' => config_path('airbrake.php'),
    ]);

    $app = $this->app;

    if ( ! $this->isEnabled())
    {
      return;
    }

    $app->error(
      function (Exception $exception) use ($app)
      {
        $app['airbrake']->notifyOnException($exception);
      }
    );

    $app->fatal(
      function ($exception) use ($app)
      {
        $app['airbrake']->notifyOnException($exception);
      }
    );
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->mergeConfigFrom(
      __DIR__.'/config/airbrake.php', 'airbrake'
    );
      
    $this->app->singleton(
      'airbrake',
      function ($app)
      {
        $options = [
          'async'           => $app['config']->get('airbrake-laravel::airbrake.async'),
          'environmentName' => $app->environment(),
          'projectRoot'     => base_path(),
          'url'             => $app['request']->url(),
          'filters'         => $app['config']->get('airbrake-laravel::airbrake.ignore_exceptions'),
          'host'            => $app['config']->get('airbrake-laravel::airbrake.connection.host'),
          'port'            => $app['config']->get('airbrake-laravel::airbrake.connection.port'),
          'secure'          => $app['config']->get('airbrake-laravel::airbrake.connection.secure'),
          'verifySsl'       => $app['config']->get('airbrake-laravel::airbrake.connection.verifySsl'),
        ];

        $config = new Airbrake\Configuration(
          $app['config']->get('airbrake-laravel::airbrake.api_key'), $options
        );

        return new Airbrake\Client($config);
      }
    );
  }

  /**
   * Should we send exceptions to Airbrake?
   *
   * @return bool
   */
  protected function isEnabled()
  {
    $enabled = $this->app['config']->get('airbrake-laravel::airbrake.enabled', false);
    $ignored = $this->app['config']->get('airbrake-laravel::airbrake.ignore_environments', []);

    return $enabled && ! in_array($this->app->environment(), $ignored);
  }
}
    