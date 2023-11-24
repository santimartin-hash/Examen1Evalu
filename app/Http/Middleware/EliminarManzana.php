<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Manzana;
use Illuminate\Support\Facades\Log;

class EliminarManzana
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $nombreManzana = $request->input('tipoManzana');
        Log::info("Se ha eliminado la manzana $nombreManzana");
        return $next($request);
    }
}
