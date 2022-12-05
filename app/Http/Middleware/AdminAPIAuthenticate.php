<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\App;

class AdminAPIAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $client = new Client(['verify' => false]);
        $quzzle_request = $client->post(env('MS_URL') . 'authorization', $params = [
            'headers' => [
                'Authorization' => $request->header('Authorization'),
            ]
        ]);
        $response = json_decode($quzzle_request->getBody());
        if ($response->error) {
            return response('Unauthorized.', 401);
        }
        return $next($request);
    }
}
