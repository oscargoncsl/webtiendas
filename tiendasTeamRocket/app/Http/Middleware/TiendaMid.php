<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;



class TiendaMid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //Verificar si el usuario que está intetando acceder al recursos es administrados


        if(Auth::check() && Auth::user()->roles->name=='tienda'){
            Session::flash('tipoMensaje','danger');
            Session::flash('mensaje','funciona');
            return $next($request);
        }else{
            Session::flash('tipoMensaje','danger');
            Session::flash('mensaje','No tiene privilegios para acceder');
            return Redirect::back();
        }


    }
}
