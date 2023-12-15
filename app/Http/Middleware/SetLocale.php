<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {

        $locale = session("lang") ?? "fr";
        App::setLocale($locale);


        // Exécuter le middleware suivant dans la chaîne
        return $next($request);
    }
}
