<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class CustomerAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authorizationHeader = $request->header('Authorization');

        if ($authorizationHeader) {
            $credentials = explode(':', base64_decode(substr($authorizationHeader, 6)));
            $email = $credentials[0];
            $password = $credentials[1];
            
            $user = DB::table('clients')
                ->where('email', $email)
                ->where('password', $password)
                ->first();
                
            if (!$user) {
                $user = DB::table('fixers')
                ->where('email', $email)
                ->where('password', $password)
                ->first();
            }
            if (!$user) {
                $user = DB::table('admins')
                ->where('email', $email)
                ->where('password', $password)
                ->first();
            }    
            if ($user) {
                return $next($request);
            }
        }
        
        return response()->json(['message' => 'Invalid email or password'], 401);
    }
}

