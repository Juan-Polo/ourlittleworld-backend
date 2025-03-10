<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Permitir solicitudes desde cualquier origen
        $response->header('Access-Control-Allow-Origin', '*');

        // Permitir los métodos HTTP permitidos
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

        // Permitir ciertos encabezados específicos
        $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, X-Auth-Token, Authorization, X-Requested-With');

        // Permitir credenciales (cookies, autenticación HTTP)
        $response->header('Access-Control-Allow-Credentials', 'true');

        // Configurar la edad máxima de la caché para las solicitudes pre-vuelo (preflight requests)
        $response->header('Access-Control-Max-Age', '3600');

        return $response;
    }
}
