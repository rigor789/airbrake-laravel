<?php  namespace rigor789\AirbrakeLaravel\Handler;

use Exception;
use Illuminate\Contracts\Debug\ExceptionHandler;

class AirbrakeExceptionHandler implements ExceptionHandler {

  /**
   * @var
   */
  private $handler;

  public function __construct(ExceptionHandler $handler)
  {

    $this->handler = $handler;
  }

  /**
   * Report or log an exception.
   *
   * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
   *
   * @param  \Exception  $e
   * @return void
   */
  public function report(Exception $e)
  {

    App::make('airbrake')->notifyOnException($e);
    return $this->handler->report($e);
  }

  /**
   * Render an exception into an HTTP response.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Exception $e
   * @return \Symfony\Component\HttpFoundation\Response
   */
  public function render($request, Exception $e)
  {

    return $this->handler->render($request, $e);
  }

  /**
   * Render an exception to the console.
   *
   * @param  \Symfony\Component\Console\Output\OutputInterface $output
   * @param  \Exception $e
   * @return void
   */
  public function renderForConsole($output, Exception $e)
  {

    return $this->handler->renderForConsole($output, $e);
  }
}