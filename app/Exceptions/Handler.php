<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Arr;
use App\Http\Resources\Api\StatusCollection;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return (new StatusCollection(false,trans('api.user_unauthenticated')))->response()->setStatusCode(401);

            return response()
                ->json($json, 401);
        }
        $guard = \Arr::get($exception->guards(),0);
        switch ($guard) {
            default:
                $login = 'admin.login';
                break;
        }
        return redirect()->guest(route($login));
    }

}