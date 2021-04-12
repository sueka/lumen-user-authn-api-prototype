<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $headers = [
            'Access-Control-Allow-Origin' => config('cors.allowed_origin'),
        ];

        if ($headers['Access-Control-Allow-Origin'] !== '*') {
            $headers['Vary'] = 'Origin';
        }

        $response = $next($request);

        foreach ($headers as $key => $value) {
            if ($value !== null)
                $response->header($key, $value);
        }

        return $response;
    }
}
