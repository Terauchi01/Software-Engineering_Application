<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin = Auth::guard('admins')->check();

        if (!$admin || !$admin->hasAnyRole($roles)) {
            // ログインしていないか、権限がない場合はリダイレクトまたはエラー処理を行う
            return redirect('/')->withErrors('権限がありません。');
        }

        return $next($request);
    }
}
