<?php

use App\Http\Middleware\AdminAuthenticate;
use App\Http\Middleware\AdminRedirect;
use App\Http\Middleware\CheckRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\App;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        ///Written to make a middleware redirect into limited path
        $middleware->alias(
            [
                'admin.guest' => AdminRedirect::class,
                'admin.auth' => AdminAuthenticate::class,
                'role' => CheckRole::class,


            ],
        );
        // $middleware->redirectTo(
        //     guests: '/member/login',
        //     users: '/member/dashboard'
        // );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
