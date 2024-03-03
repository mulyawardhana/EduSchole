<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;

class Authenticate extends Middleware
{


    public function handle($request, Closure $next, ...$guards)
    {

        if ($request->is('api/*')) {
            $request->headers->set('Accept', 'application/json');
            $guards = ['api'];
        } else {
            $guards = ['web'];
            $users = auth(...$guards)->user();
            // if (!$users) return redirect()->guest(route('oauth.redirect'));
            if (!$users)
                return redirect()->guest(route('login'));
            if (!empty(auth()->user()->token)) {
                try {
                    $token = FacadesJWTAuth::setToken(auth()->user()->token)->refresh();
                } catch (\Exception $th) {
                    $token = FacadesJWTAuth::fromUser($users);
                }
            } else {
                $token = FacadesJWTAuth::fromUser($users);
            }
            auth(...$guards)->user()->token = $token;
        }
        $this->authenticate($request, $guards);
        return $next($request);
    }

    protected function unauthenticated($request, array $guards)
    {
        if ($request->expectsJson()) {
            abort(response()->json([
                "message" => "Unauthenticated",
                "status" => false,
                "code" => 401
            ], 401));
        } else {
            return redirect()->guest(route('login'));
        }
    }

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }
}
