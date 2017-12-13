<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\user_request;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use Storage;

class ejercicios_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id  = Auth::user()->id;
        $sql = "SELECT
                        ejer.ejer_nombre ejercicio,
                        count(resp.resp_id) cantidad,
                        sum(CASE WHEN ejer.respuesta = resp.respuesta then 1 else 0 end) correctas,
                        (count(resp.resp_id) - sum(CASE WHEN ejer.respuesta = resp.respuesta then 1 else 0 end)) incorrectas,
                        ((sum(CASE WHEN ejer.respuesta = resp.respuesta then 1 else 0 end) / count(resp.resp_id)) * 100) promedio
                FROM
                        respuestas resp,
                        ejercicios ejer
                WHERE
                        resp.ejer_id = ejer.ejer_id
                        and ejer.tipo = 'suma'
                group BY
                        ejer.ejer_nombre";
        $lsuma = DB::select($sql);

        $sqlr = "SELECT
                        ejer.ejer_nombre ejercicio,
                        count(resp.resp_id) cantidad,
                        sum(CASE WHEN ejer.respuesta = resp.respuesta then 1 else 0 end) correctas,
                        (count(resp.resp_id) - sum(CASE WHEN ejer.respuesta = resp.respuesta then 1 else 0 end)) incorrectas,
                        ((sum(CASE WHEN ejer.respuesta = resp.respuesta then 1 else 0 end) / count(resp.resp_id)) * 100) promedio
                FROM
                        respuestas resp,
                        ejercicios ejer
                WHERE
                        resp.ejer_id = ejer.ejer_id
                        and ejer.tipo = 'resta'
                group BY
                        ejer.ejer_nombre";
        $lresta = DB::select($sqlr);

        $sqlm = "SELECT
                        ejer.ejer_nombre ejercicio,
                        count(resp.resp_id) cantidad,
                        sum(CASE WHEN ejer.respuesta = resp.respuesta then 1 else 0 end) correctas,
                        (count(resp.resp_id) - sum(CASE WHEN ejer.respuesta = resp.respuesta then 1 else 0 end)) incorrectas,
                        ((sum(CASE WHEN ejer.respuesta = resp.respuesta then 1 else 0 end) / count(resp.resp_id)) * 100) promedio
                FROM
                        respuestas resp,
                        ejercicios ejer
                WHERE
                        resp.ejer_id = ejer.ejer_id
                        and ejer.tipo = 'multiplicacion'
                group BY
                        ejer.ejer_nombre";
        $lmulti = DB::select($sqlm);

        $sqld = "SELECT
                        ejer.ejer_nombre ejercicio,
                        count(resp.resp_id) cantidad,
                        sum(CASE WHEN ejer.respuesta = resp.respuesta then 1 else 0 end) correctas,
                        (count(resp.resp_id) - sum(CASE WHEN ejer.respuesta = resp.respuesta then 1 else 0 end)) incorrectas,
                        ((sum(CASE WHEN ejer.respuesta = resp.respuesta then 1 else 0 end) / count(resp.resp_id)) * 100) promedio
                FROM
                        respuestas resp,
                        ejercicios ejer
                WHERE
                        resp.ejer_id = ejer.ejer_id
                        and ejer.tipo = 'division'
                group BY
                        ejer.ejer_nombre";
        $ldivi = DB::select($sqld);
        //dd($result);

        //return view('pagina.funcionalidad.admin.usuarios.usuarios')->with('users', $users);
        return view('pagina.funcionalidad.admin.ejercicios.ejercicios')->with('lsuma', $lsuma)->with('lresta', $lresta)->with('lmulti', $lmulti)->with('ldivi', $ldivi);
        //dd($users);
    }

    public function almacenar($id1, $id2, $id3)
    {
        //dd($id1 . " | " . $id2 . " | " . $id3);

        DB::insert("INSERT INTO respuestas(resp_id, id, ejer_id, respuesta) VALUES (null," . $id1 . ", " . $id2 . ", " . $id3 . ")");
        echo "Almacenado Correctamente";
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

        $usuario->id        = $request->id;
        $usuario->nombre    = $request->nombre;
        $usuario->apellido  = $request->apellido;
        $usuario->genero    = $request->genero;
        $usuario->direccion = $request->direccion;
        $usuario->telefono  = $request->telefono;
        $usuario->email     = $request->email;
        $usuario->password  = bcrypt($request->password);
        $usuario->tipo      = $request->tipo;

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
