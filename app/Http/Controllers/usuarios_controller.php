<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class usuarios_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(5);

        //Flash::success("Usuarios");

        return view('pagina.funcionalidad.admin.usuarios.usuarios')->with('users', $users);
        //return view('pagina.funcionalidad.admin.usuarios.usuarios');
        //dd($users);

    }

    public function create()
    {
        return view('pagina.funcionalidad.admin.usuarios.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $usuario = new User($request->all());

        if ($request->file('imagen')) {
            //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugin\imagenes';
            $file->move($path, $name);
            //Fin Imagen
            $usuario->imagen = $name;
        } else {
            if ($request->genero == 'masculino') {
                $usuario->imagen = 'masculino.png';
            } else {
                $usuario->imagen = 'femenino.png';
            }
        }
        $usuario->password = bcrypt($request->password);
        //dd($usuario);
        $usuario->save();
        Flash::success("Se ha Creado El Usuario " . $request->nombre . ' ' . $request->apellido);
        return redirect()->route('admin.usuarios.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $array = explode("_", $id);
        $id    = $array[0];
        if (!empty($array[1])) {
            $id2 = $array[1];
        } else {
            $id2 = 0;
        }

        $user      = User::find($id);
        $user->id2 = $id2;
        //dd($user);
        return view('pagina.funcionalidad.admin.usuarios.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $usuario = User::find($id);

        $usuario->id       = $request->id;
        $usuario->nombre   = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->genero   = $request->genero;
        $usuario->telefono = $request->telefono;
        $usuario->email    = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->tipo     = $request->tipo;

        if ($request->file('imagen')) {
            //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugin\imagenes';
            //Storage::delete(public_path() . $usuario->imagen);
            $file->move($path, $name);
            //Fin Imagen
            $usuario->imagen = $name;
        } else {
            if ($request->genero == 'masculino') {
                $usuario->imagen = 'masculino.png';
            } else {
                $usuario->imagen = 'femenino.png';
            }
        }

        $usuario->save();

        Flash::warning("Se ha Editado El Usuario " . $request->nombre . ' ' . $request->apellido);

        if ($request->id2 == 1) {
            return redirect()->route('admin.perfil.index');
        } else {
            return redirect()->route('admin.usuarios.index');
        }
        //dd($id);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Flash::error("Se ha Eliminado El Usuario " . $user->nombre . ' ' . $user->apellido);
        return redirect()->route('admin.usuarios.index');
    }
}
