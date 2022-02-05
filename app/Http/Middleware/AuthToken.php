<?php

namespace App\Http\Middleware;

use App\Models\Login_Tokens;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AuthToken
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
        $login_token = Login_Tokens::where('token', $request->token)->first();
        if (!$login_token) {
            return response()->json([
                "status" => false,
                "message" => "unauthorized user"
            ]);
        }

        // Ambil Data dari tabel user
        $user_data = User::find($login_token->user_id);

        // Passing data dari tabel user ke request agar bisa digunakan dinext proses
        $request->user_data = $user_data;

        return $next($request);
    }
}
