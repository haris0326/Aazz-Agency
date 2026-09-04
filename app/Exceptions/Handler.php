<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthenticationException::class,
        AuthorizationException::class,
        NotFoundHttpException::class,
        ModelNotFoundException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $exception) {
            //
        });

        // Custom handling for 404 error
        $this->renderable(function (NotFoundHttpException $e, Request $request) {
            // Check if it's an API request or web request
            if ($request->wantsJson()) {
                return response()->json(['error' => 'Not Found'], 404);
            }

            // Return custom 404 page view
            return response()->view('errors.404', [], 404);
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        // If it's a NotFoundHttpException (404)
        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.404', [], 404);  // Custom 404 page view
        }

        // Handle other types of exceptions (like 500, 403 etc.)
        return parent::render($request, $exception);
    }
}
