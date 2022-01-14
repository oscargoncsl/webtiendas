<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Tienda;
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
        $this->middleware('tienda')->only('index', 'show');
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
        $productos = Producto::all();
        
        //Devolvemos la vista
         return view('productos.index',['productos'=> $productos]);
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
        //
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