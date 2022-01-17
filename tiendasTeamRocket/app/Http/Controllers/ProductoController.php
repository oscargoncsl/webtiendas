<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Tienda;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
       public function __construct()
    {
        //$this->middleware('auth');  //Todo lo que afecta a este controlador
        //$this->middleware('auth')->only('show','index');   //Solo a estas dos funciones
        //$this->middleware('auth')->except('index'); //Afecta a todo excepto a index
        $this->middleware('invitado')->only('index', 'show');
        $this->middleware('tienda')->only('store','create','destroy','update','edit');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Controlador accede al modelo para enviarselo a vista
        $usuarios = User::all();
        if(!request()->has('id')){
            return view('productos.index',['productos'=> Producto::all()]);
        } else{
            //echo Tienda::where('id_comerciante', request()->filled('r'))->first();
            return view('productos.index',['productos'=> Producto::where('tienda_id', request()->id)->get()]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Recibir datos
        $datos=$request->all();
       //Validar datos
       $rules= array (
        'nombre' => 'required',
        'descripcion' => 'required',
        'precio' => 'required|numeric',
       );

       $messages= array (
        'nombre' => 'Campo nombre es requerido',
        'descripcion' =>'Campo descripcion es requerido',
        'precio.required' => 'Campo precio es requerido',
        'precio.numeric' => 'Campo precio debe ser numerico',
       );

       $validador= Validator::make($datos,$rules,$messages);
       if($validador->fails()){
            $errors=$validador->messages();
            $errors->add('mierror','Se ha cancelado la creación de la tienda.');
            Session::flash('tipoMensaje','danger');
            Session::flash('mensaje','Error, no se cumplen las validaciones. Compruebe todos los campos');
            //Volver con los errores

            return Redirect::back()->withInput()->withErrors($validador);
        }else{
                $producto=new Producto();
                $producto->nombre=$datos["nombre"];
                $producto->descripcion=$datos["descripcion"];
                $producto->precio=$datos["precio"];
                $producto->imagen="a";
                //$producto->imagen=$datos["imagen"];
                $producto->tienda_id=Auth::user()->id;
            }
            try{
                //Almacenar en la BD
                $producto->save();
                //Almacenar el archivo en el servidor
                    //Volver al listado
                    //Mensaje de OK
                    Session::flash('tipoMensaje','success');
                    Session::flash('mensaje','Plotter creado correctamente');

            }catch(\Exception $e){
                echo $e->getMessage();
                //Mensaje de KO
                Session::flash('tipoMensaje','danger');
                Session::flash('mensaje','Error al crear el plotter');


            }
            return Redirect::back();
    }









    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productos=Producto::find($id);
       if (is_null($productos))
        echo "No existe el plotter solicitado";
       else
       {
        //Devolvemos la vista
        return view('productos.show',['producto'=> $productos]);
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->all();
        
        $rules=array(
            'imagen'=>'required|mimes:jpeg,jpg|max:1024*1024*1',
            'brand'=>'required',
            'IAMSPEED'=>'required|numeric',
        );
        $messages=array(
            'imagen.required'=>'campo imagen es requerido',
            //'imagen.mimes'=>'el tipo de archivo debe ser una imagen',
            'imagen.image'=>'el tipo de archivo debe ser una imagen',
            'imagen.max'=>'el tamaño de la imagen es excesivo',
            'brand.required'=>'campo marca es requerido',
            'IAMSPEED.required'=>'campo velocidad requerido',
            'IAMSPEED.numeric'=>'campo velocidad debe ser un numero',
        );
        $validador=Validator::make($datos,$rules,$messages);
        if($validador->fails()){
            $errors=$validador->messages();
            Session::flash('tipoMensaje','danger');
            Session::flash('mensaje','Error,no se cumplen las validaciones.Compuebe los campos');
            return Redirect::back()->withInput()->withErrors($validador);
        }else{
            $tienda=Tienda::find($id);
            $tienda->ubicacion = $datos["ubicacion"];
            
            try{
                //Almacenar en la BD
                $tienda->save();

                //Volver al listado
                Session::flash('tipoMensaje','success');
                Session::flash('mensaje','Plotter creado correctamente');
                        //Volver al listado
                return Redirect::back();
            }catch(\Exception $e){
                //$e->getMessage();
                //volver a la página anterior con errores
                Session::flash('tipoMensaje','danger');
                Session::flash('mensaje','Error al crear el Plotter');
            }
        }
        return Redirect::back();
        //echo "Plotter Creado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        Session::flash('tipoMensaje','info');
        Session::flash('mensaje','Plotter borrado correctamente');
        return Redirect::back();
    }
}
