<?php

namespace App\Http\Controllers;

use App\Models\Integrante1;
use App\Models\Integrante2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutorController extends Controller
{

    public function getAutoresSede($sede)
    {
        $autores = DB::select("SELECT
        integrante1.id AS id_autores,
        integrante1.nombre AS nombre,
        integrante1.apellidop AS ape_pat,
        integrante1.apellidom AS ape_mat,
        integrante1.domicilio AS domicilio,
        integrante1.CURP AS curp,
        integrante1.RFC AS rfc,
        integrante1.telefono AS telefono,
        integrante1.correo AS email,
        integrante1.ingles AS nivel_inges,
        integrante1.institucion AS escuela,
        integrante1.ciudad AS municipio,
        integrante1.estado AS localidad,
        proyecto.id AS id_proyectos,
        proyecto.sede AS sede,
        proyecto.modalidad AS modalidad,
        proyecto.titulo AS titulo,
        proyecto.descripcion AS resumen,
        proyecto.area AS area
    FROM
        integrante1
    JOIN proyecto ON integrante1.idparticipante = proyecto.idparticipante
    WHERE
        proyecto.sede = '".$sede."'
    UNION
    SELECT
        integrante2.id AS id_autores,
        integrante2.nombre AS nombre,
        integrante2.apellidop AS ape_pat,
        integrante2.apellidom AS ape_mat,
        integrante2.domicilio AS domicilio,
        integrante2.CURP AS curp,
        integrante2.RFC AS rfc,
        integrante2.telefono AS telefono,
        integrante2.correo AS email,
        integrante2.ingles AS nivel_inges,
        integrante2.institucion AS escuela,
        integrante2.ciudad AS municipio,
        integrante2.estado AS localidad,
        proyecto.id AS id_proyectos,
        proyecto.sede AS sede,
        proyecto.modalidad AS modalidad,
        proyecto.titulo AS titulo,
        proyecto.descripcion AS resumen,
        proyecto.area AS area
    FROM
        integrante2
    JOIN proyecto ON integrante2.idparticipante = proyecto.idparticipante
    WHERE
        proyecto.sede = '".$sede."'");
        return response()->json([
            'error' => false,
            'autores' => $autores,
        ]);
    }
    public function getAutoresAll()
    {
        $autores = DB::select("SELECT
        integrante1.id AS id_autores,
        integrante1.nombre AS nombre,
        integrante1.apellidop AS ape_pat,
        integrante1.apellidom AS ape_mat,
        integrante1.domicilio AS domicilio,
        integrante1.CURP AS curp,
        integrante1.RFC AS rfc,
        integrante1.telefono AS telefono,
        integrante1.correo AS email,
        integrante1.ingles AS nivel_inges,
        integrante1.institucion AS escuela,
        integrante1.ciudad AS municipio,
        integrante1.estado AS localidad,
        proyecto.id AS id_proyectos,
        proyecto.sede AS sede,
        proyecto.modalidad AS modalidad,
        proyecto.titulo AS titulo,
        proyecto.descripcion AS resumen,
        proyecto.area AS area
    FROM
        integrante1
    JOIN proyecto ON integrante1.idparticipante = proyecto.idparticipante

    UNION
    SELECT
        integrante2.id AS id_autores,
        integrante2.nombre AS nombre,
        integrante2.apellidop AS ape_pat,
        integrante2.apellidom AS ape_mat,
        integrante2.domicilio AS domicilio,
        integrante2.CURP AS curp,
        integrante2.RFC AS rfc,
        integrante2.telefono AS telefono,
        integrante2.correo AS email,
        integrante2.ingles AS nivel_inges,
        integrante2.institucion AS escuela,
        integrante2.ciudad AS municipio,
        integrante2.estado AS localidad,
        proyecto.id AS id_proyectos,
        proyecto.sede AS sede,
        proyecto.modalidad AS modalidad,
        proyecto.titulo AS titulo,
        proyecto.descripcion AS resumen,
        proyecto.area AS area
    FROM
        integrante2
    JOIN proyecto ON integrante2.idparticipante = proyecto.idparticipante");
        return response()->json([
            'error' => false,
            'autores' => $autores,
        ]);
    }
    public function update(Request $request, $id)
    {
        try {
            $autor1 = Integrante1::where('id', $id)->first();
            $autor2 = Integrante2::where('id', $id)->first();
            if ($autor1) {
                $autor1->nombre = $request->nombre;
                $autor1->apellidop = $request->apellidop;
                $autor1->apellidom = $request->apellidom;
                $autor1->CURP = $request->CURP;
                $autor1->RFC = $request->RFC;
                $autor1->telefono = $request->telefono;
                $autor1->correo = $request->correo;
                $autor1->update();
                return response()->json([
                    'error' => false,
                    'msg' => 'El autor se actualizo correctamente',
                ]);
            } else if ($autor2) {
                $autor2->nombre = $request->nombre;
                $autor2->apellidop = $request->apellidop;
                $autor2->apellidom = $request->apellidom;
                $autor2->CURP = $request->CURP;
                $autor2->RFC = $request->RFC;
                $autor2->telefono = $request->telefono;
                $autor2->correo = $request->correo;
                $autor2->update();
                return response()->json([
                    'error' => false,
                    'msg' => 'El autor se actualizo correctamente',
                ]);
            }
            return response()->json([
                'error' => true,
                'msg' => 'No se encontro el autor',
            ]);
        } catch (\Exception$th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage(),
            ]);
        }
    }
    public function delete($id)
    {
        try {
            $autor1 = Integrante1::where('id', $id)->first();
            $autor2 = Integrante2::where('id', $id)->first();
            if ($autor1) {
                $autor1->delete();
                return response()->json([
                    'error' => false,
                    'msg' => 'El autor se elimino con exito',
                ]);
            } else if ($autor2) {
                $autor2->delete();
                return response()->json([
                    'error' => false,
                    'msg' => 'El autor se elimino con exito',
                ]);
            }
            return response()->json([
                'error' => true,
                'msg' => 'No se encontro el autor',
            ]);
        } catch (\Exception$th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage(),
            ]);
        }
    }
}
