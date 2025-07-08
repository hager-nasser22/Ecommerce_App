<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $accessToken = $request->header('Authorization');
        if($accessToken == null){
            return response()->json([
                "message" => "Access Token Not Found"
            ], 404);
        }
        $user = User::where("access_token" , $accessToken)->first();
        if(! $user){
            return response()->json([
                "message" => "Access Token Not Correct"
            ], 404);
        }
        return $next($request);
    }
}
