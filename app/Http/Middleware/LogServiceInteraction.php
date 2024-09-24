<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogServiceInteraction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        $service = $request->path();

        $requestBody = $request->getContent();

        $ipAddress = $request->ip();

        $response = $next($request);

        $statusCode = $response->getStatusCode();

        $responseBody = $response->getContent();

        Log::info('Service Interaction', [
            'user_id' => $user ? $user->id : null,
            'service' => $service,
            'request_body' => $requestBody,
            'response_code' => $statusCode,
            'response_body' => $responseBody,
            'ip_address' => $ipAddress,
        ]);

        return $response;
    }
}
