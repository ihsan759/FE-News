<?php

namespace App\Http\Middleware;

use App\Helpers\HttpClient;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = HttpClient::fetch(
            "GET",
            "home"
        );
        if ($response['status'] == false) {
            return redirect()->route('/')->with(['message' => 'Harap login terlebih dahulu']);
        }
        return $next($request);
    }
}
