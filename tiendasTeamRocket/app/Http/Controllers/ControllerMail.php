<?php

namespace App\Http\Controllers;

use App\Mail\EmailProductos;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerMail extends Controller
{
  public function send(Request $request){
        $this->validate($request, [
            'nombre'     =>  'required',
            'correo'  =>  'required'
            ]);

        $data = array(
                'nombre' =>  $request->input('nombre'),
                'correo'=>   $request->input('correo')
            );

            $email = $request->input('correo');

        Mail::to($email)->send(new EmailProductos($data));

        return back()->with('success', 'Enviado exitosamente!');

}
}
