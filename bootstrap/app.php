<?php

use App\Http\Middleware\Middleware\AdminAuthenticate;
use App\Http\Middleware\Middleware\AdminRedirect;
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
        $middleware->alias(
            [
                'admin.guest' => AdminRedirect::class,
                'admin.auth' => AdminAuthenticate::class,
            ],
        );
        $middleware->redirectTo(
            guests: '/member/login',
            users: '/member/dashboard'
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
