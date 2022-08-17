<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyectoController extends Controller
{
    public function get($id)
    {
        try {
            $proyecto = Proyecto::where('id', $id)->first();
            return response()->json([
                'error' => false,
                'data' => $proyecto,
            ]);
        } catch (\Exception$th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage(),
            ]);
        }
    }
    public function getProyectosAll()
    {
        $proyectos = DB::select("SELECT
    proyecto.id as id_proyectos,
    proyecto.idparticipante as id_participante,
    asesor.id AS id_asesores,
    CONCAT(
        asesor.nombre,
        ' ',
        asesor.apellidop,
        ' ',
        asesor.apellidom
    ) AS asesor,
    proyecto.area AS areas,
    proyecto.categoria AS categorias,
    proyecto.sede AS sede,
    proyecto.titulo AS nombre,
    proyecto.modalidad as modalidad,
    proyecto.descripcion AS resumen,
    proyecto.urlvideo AS video,
    proyecto_extenso.Location as pdf
FROM
    proyecto
JOIN asesor ON proyecto.idparticipante = asesor.idparticipante
JOIN proyecto_extenso ON proyecto_extenso.Folder = proyecto.idparticipante");
        return response()->json([
            'error' => false,
            'proyectos' => $proyectos,
        ]);
    }
    public function getProyectosSede($sede)
    {
        $proyectos = DB::select("SELECT
        proyecto.idparticipante as id_proyectos,
        asesor.id AS id_asesores,
        CONCAT(
            asesor.nombre,
            ' ',
            asesor.apellidop,
            ' ',
            asesor.apellidom
        ) AS asesor,
        proyecto.area AS areas,
        proyecto.categoria AS categorias,
        proyecto.sede AS sede,
        proyecto.titulo AS nombre,
        proyecto.modalidad as modalidad,
        proyecto.descripcion AS resumen,
        proyecto.urlvideo AS video,
        proyecto_extenso.Location as pdf
    FROM
        proyecto
    JOIN asesor ON proyecto.idparticipante = asesor.idparticipante
    JOIN proyecto_extenso ON proyecto_extenso.Folder = proyecto.idparticipante
    WHERE proyecto.sede = '" . $sede . "'");
        return response()->json([
            'error' => false,
            'proyectos' => $proyectos,
        ]);
    }
    public function getProyectosSedeCat($sede, $cat)
    {
        try {
            $proyectos = Proyecto::where('sede', $sede)->where('categoria', $cat)->get();
            return response()->json([
                'error' => false,
                'data' => $proyectos,
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
            $proyecto = Proyecto::where('id', $id)->first();
            if ($proyecto) {
                $proyecto->delete();
                return response()->json([
                    'error' => false,
                    'msg' => 'El proyecto se elimino con exito',
                ]);
            }
            return response()->json([
                'error' => true,
                'msg' => 'No se encontro el proyecto',
            ]);
        } catch (\Exception$th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage(),
            ]);
        }
    }
    public function update(Request $request)
    {
        try {
            $proyecto = Proyecto::where('id', $request->id_proyectos)->first();
            if ($proyecto) {
                $proyecto->titulo = $request->nombre;
                $proyecto->sede = $request->sede;
                $proyecto->categoria = $request->categorias;
                $proyecto->descripcion = $request->descripcion;
                $proyecto->area = $request->areas;
                $proyecto->update();
                return response()->json([
                    'error' => false,
                    'msg' => 'se actualizo correctamente el proyecto',
                ]);
            }
            return response()->json([
                'error' => true,
                'msg' => 'No se encontro el proyecto',
            ]);
        } catch (\Exception$th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage(),
            ]);
        }
    }
}
