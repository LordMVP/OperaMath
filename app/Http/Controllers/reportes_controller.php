<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class reportes_controller extends Controller
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
                        users.id documento,
                        CONCAT(users.nombre, ' ', users.apellido) nombre,
                        ejer.tipo,
                        ejer.ejer_nombre ejercicio,
                        count(resp.resp_id) cantidad,
                        sum(CASE WHEN ejer.respuesta = resp.respuesta then 1 else 0 end) correctas,
                        (count(resp.resp_id) - sum(CASE WHEN ejer.respuesta = resp.respuesta then 1 else 0 end)) incorrectas,
                        ((sum(CASE WHEN ejer.respuesta = resp.respuesta then 1 else 0 end) / count(resp.resp_id)) * 100) promedio
                FROM
                        users,
                        respuestas resp,
                        ejercicios ejer
                WHERE
                        users.id = resp.id
                        and resp.ejer_id = ejer.ejer_id
                group BY
                        users.id,
                        ejer.tipo";

        $lreporte = DB::select($sql);

        //dd($result);

        //return view('pagina.funcionalidad.admin.usuarios.usuarios')->with('users', $users);
        return view('pagina.funcionalidad.admin.reportes.reportes')->with('lreporte', $lreporte);
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

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Flash::error("Se ha Eliminado El Usuario " . $user->nombre . ' ' . $user->apellido);
        return redirect()->route('admin.usuarios.index');
    }
}
