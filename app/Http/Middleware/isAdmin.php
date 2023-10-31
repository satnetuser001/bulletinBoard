<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * 
     * Middleware проверки id == 1 у текущего пользователя (админ ли он)
     */
    public function handle(Request $request, Closure $next)
    {
        //Гостя отправляем на начальную страницу сайта
        if (Auth::guest()) {
            return redirect()->route('index');
        }

        //Пользователей с id != 1 на страницу с их обявлениями(homepage для зарегистрированных)
        if (Auth::user()->id != 1) {
            return redirect()->route('home');
        }

        //остальных(с id == 1) пропускаем дальше
        return $next($request);
    }
}
