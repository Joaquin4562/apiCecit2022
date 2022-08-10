<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
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
        $proyectos = DB::select("CALL getProyectosAll()");
        return response()->json([
            'error' => false,
            'proyectos' => $proyectos,
        ]);
    }
    public function getProyectosSede($sede)
    {
        $proyectos = DB::select("CALL getProyectosSede('" . $sede . "')");
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
}
