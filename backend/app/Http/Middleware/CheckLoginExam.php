<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginExam
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
        if($request->session()->has('userInfo')) return $next($request);
        return \redirect()->route('auth/login')->with('notify', 'Đăng nhập trước khi thi thử');
    }
}
