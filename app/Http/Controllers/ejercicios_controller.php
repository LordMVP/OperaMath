<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\user_request;
use DB;

class ejercicios_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::where('tipo', '!=', 'medico')->orderBy('id', 'ASC')->paginate(5);
        //dd('hola');
        //Flash::success("Usuarios");

        //return view('pagina.funcionalidad.admin.usuarios.usuarios')->with('users', $users);
        return view('pagina.funcionalidad.admin.ejercicios.ejercicios');
        //dd($users);

    }

    public function webindex()
    {
        //$users = User::where('tipo', '!=', 'medico')->orderBy('id', 'ASC')->toJson();

        $users = DB::select("SELECT * FROM users order by id");
        //$users = json_encode($users);
        //$users = json_decode($users);
        $datos = array(["usuario" => $users]);

        /*foreach ($users as $usuario) {
            $json['usuario'][] = $usuario;
            array_push($datos, $json);
        }*/

        /*$datos2 = array();

        foreach ($datos as $usuario) {
            //$json2['usuario'][] = $usuario;
            array_push($datos2, $usuario);
        }*/

        //dd($datos);

        //echo $datos;
        //Flash::success("Usuarios");

        $json['usuario'] = $users;
        return $json;
        //return $datos;

        //return view('pagina.funcionalidad.admin.usuarios.usuarios')->with('users', $users);
        //return view('pagina.funcionalidad.admin.usuarios.usuarios');
        //dd($users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagina.funcionalidad.admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(user_request $request)
    {
            //dd('pausa');
         $usuario = new User($request->all());

         if($request->file('imagen'))
         {
                //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugin\imagenes';
            $file->move($path, $name);
                //Fin Imagen 
            $usuario->imagen = $name;  
        }else{
            if ($request->genero == 'masculino') {
                $usuario->imagen = 'masculino.png';
            }else{
                $usuario->imagen = 'femenino.png';
            }
        }
        $usuario->password = bcrypt($request->password);
                //dd($usuario);
        $usuario->save();
        Flash::success("Se ha Creado El Usuario " . $request->nombre . ' ' . $request->apellido);
        return redirect()->route('admin.usuarios.index');
    }

    public function webstore()
    {

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $genero = $_POST['genero'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $tipo = $_POST['tipo'];
        $password = $_POST['password'];
        $imagen  = $_POST['imagen'];    

        //$path = "imagenes/$nombre.jpg";
        //$url = "http://$hostname_localhost/ejemploBDRemota/$path";
        $path = "../plugin/imagenes/".$apellido . '_' . $nombre . '_' . $id.".jpg";
        file_put_contents($path,base64_decode($imagen));
        $bytesArchivo=file_get_contents($path);

        echo "registra";

    }


    public function webstoreLa(user_request $request)
    {

        $usuario = new User($request->all());

        //dd($usuario);

        if($request->file('imagen'))
         {

            //echo "entro";
                //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            //$path = '.186.81.113.40/rapihealth/public/plugin/imagenes/';
            $path = public_path() . '\plugin\imagenes';
            $file->move($path, $name);

            //echo $path;
                //Fin Imagen 
            $usuario->imagen = $name;  
        }else{
            if ($request->genero == 'masculino') {
                $usuario->imagen = 'masculino.jpg';
            }else{
                $usuario->imagen = 'femenino.jpg';
            }
        }
        $usuario->password = bcrypt($request->password);
        
        if($usuario->save()){
            echo "registra";
        }else {
            echo "noregistra";
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   

        $array = explode("_", $id);
        $id = $array[0];
        if (!empty($array[1])) {
            $id2 = $array[1];
        }else{
            $id2 = 0;
        }

        $user = User::find($id);
        $user->id2 = $id2;
        //dd($user);   
        return view('pagina.funcionalidad.admin.usuarios.edit')->with('user', $user);
    }

    public function Webedit($id)
    {   

        $json = array();
        $array = explode("_", $id);
        $id = $array[0];
        if (!empty($array[1])) {
            $id2 = $array[1];
        }else{
            $id2 = 0;
        }

        $user = User::find($id);
        $user->id2 = $id2;
        //dd($user);   
        //return view('pagina.funcionalidad.admin.usuarios.edit')->with('user', $user);
        $json['usuario'][] = $user;
        return json_encode($json);
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
        $usuario = User::find($id);

        $usuario->id = $request->id;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->genero = $request->genero;
        $usuario->direccion = $request->direccion;
        $usuario->telefono = $request->telefono;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->tipo = $request->tipo;

        if($request->file('imagen'))
        {
            //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugin\imagenes';
            //Storage::delete(public_path() . $usuario->imagen);
            $file->move($path, $name);
            //Fin Imagen 
            $usuario->imagen = $name;  
        }else{
            if ($request->genero == 'masculino') {
                $usuario->imagen = 'masculino.png';
            }else{
                $usuario->imagen = 'femenino.png';
            }
        }

        $usuario->save();

        Flash::warning("Se ha Editado El Usuario " . $request->nombre . ' ' . $request->apellido);

        if($request->id2 == 1){
            return redirect()->route('admin.perfil.index');
        }else{
            return redirect()->route('admin.usuarios.index');
        }
        //dd($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Flash::error("Se ha Eliminado El Usuario " . $user->nombre . ' ' . $user->apellido);
        return redirect()->route('admin.usuarios.index');
    }
}
