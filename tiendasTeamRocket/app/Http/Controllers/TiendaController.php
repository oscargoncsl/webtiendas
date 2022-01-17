<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tienda;
use App\Models\User;
use App\Models\Producto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Output\ConsoleOutput;

class TiendaController extends Controller
{
       public function __construct()
    {
        //$this->middleware('auth');  //Todo lo que afecta a este controlador
        //$this->middleware('auth')->only('show','index');   //Solo a estas dos funciones
        //$this->middleware('auth')->except('index'); //Afecta a todo excepto a index
        $this->middleware('invitado')->only('index', 'show');
        $this->middleware('admin')->only('store','create','destroy','update','edit');

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
            return view('tiendas.index',['tiendas'=> Tienda::all(),'usuarios'=> $usuarios]);
        } else{
            //echo Tienda::where('id_comerciante', request()->filled('r'))->first();
            return view('tiendas.index',['tiendas'=> Tienda::where('id_comerciante', request()->id)->get(),'usuarios'=> $usuarios]);
        }



        //Devolvemos la vista

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
        $a=  $request->input('ubicacion');
       //Validar datos
       $rules= array (
         'nombre' => 'required',
        // 'ubicacion' => 'required',
       );

       $messages= array (
         'nombre.required' => 'Campo nombre es requerido',
        // 'ubicacion.required' => 'Campo nombre es requerido',
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
                $tienda=new Tienda();
                $tienda->nombre=$datos["nombre"];
                $tienda->ubicacion= $datos["nombre"];
                $tienda->id_comerciante=1;

            try{
                //Almacenar en la BD
                $tienda->save();
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








    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tienda=Tienda::find($id);
        $productos = Producto::where('tienda_id', $id)->get();
       if (is_null($tienda))
        echo "No existe el plotter solicitado";
       else
       {
        //Devolvemos la vista
        return view('tiendas.show',['tienda'=> $tienda, 'productos'=>$productos]);
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

    public function update(Request $request, Tienda $tienda)
    {
        $tienda2=Tienda::find($tienda->id);
        
        $datos=$request->all();
        // si los campos son null guarda elq ya tiene, sino coge el nuevo.
        if ($datos['ubicacion']!=null){
            $tienda2->ubicacion=$datos['ubicacion'];
        }
        if($datos==null){
            Session::flash('tipoMensaje', 'danger');
            Session::flash('mensaje', 'No has introducido ningun dato');
            //si no has introducido ningun dato, manda mensaje error y vuelve a la pag de edit
            return Redirect::back();
        }//HABRIA K COMPROBAR TODOS LOS DATOS DE DATOS Y PLOTTER Y SI NO HAY CAMBIOS MANDAR SMS ERROR

        
        $tienda2->save();
        Session::flash('tipoMensaje', 'info');
        Session::flash('mensaje', 'Cambios guardados con éxito');

        //volver al listado
        return Redirect::to(route('tiendas.index', ['id'=>Auth::user()->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tienda $tienda)
    {
        $productos = Producto::where('tienda_id', $tienda->id)->get();
        foreach($productos as $producto){
            $producto->delete();
        }
        $tienda->delete();
        Session::flash('tipoMensaje','info');
        Session::flash('mensaje','Plotter borrado correctamente');
        return Redirect::to(route('tiendas.index'));
    }
}
