<?php

namespace App\Http\Controllers;

use App\Models\Integrante1;
use App\Models\Integrante2;
use App\Models\Proyecto;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getHeaderDashboardAll()
    {
        try {
            $proyectos = count(Proyecto::all());
            $integrante1 = count(Integrante1::all());
            $integrante2 = count(Integrante2::all());
            return response()->json([
                'error' => false,
                'data' => [
                    'proyectos' => $proyectos,
                    'participantes' => $integrante1 + $integrante2,
                ],
            ]);
        } catch (\Exception$th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage(),
            ]);
        }
    }
    public function getHeaderDashboardSede($sede)
    {
        try {
            $proyectos = count(Proyecto::where('sede', $sede)->get());
            $integrante1 = count(DB::select('SELECT
                                            *
                                        FROM
                                            integrante1
                                        JOIN proyecto ON integrante1.idparticipante = proyecto.idparticipante
                                        WHERE
                                            proyecto.sede = "' . $sede . '"'));
            $integrante2 = count(DB::select('SELECT
                                            *
                                        FROM
                                            integrante2
                                        JOIN proyecto ON integrante2.idparticipante = proyecto.idparticipante
                                        WHERE
                                            proyecto.sede = "' . $sede . '"'));
            return response()->json([
                'error' => false,
                'data' => [
                    'proyectos' => $proyectos,
                    'participantes' => $integrante1 + $integrante2,
                ],
            ]);
        } catch (\Exception$th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage(),
            ]);
        }
    }
    public function getEstadisticasAll()
    {
        try {
            $kids = count(Proyecto::where('categoria', 'kids')->get());
            $juvenil = count(Proyecto::where('categoria', 'juvenil')->get());
            $petit = count(Proyecto::where('categoria', 'petit')->get());
            $mediaSuperior = count(Proyecto::where('categoria', 'media superior')->get());
            $superior = count(Proyecto::where('categoria', 'superior')->get());
            $posgrado = count(Proyecto::where('categoria', 'posgrado')->get());
            return response()->json([
                'error' => false,
                'data' => [
                    'petit' => $petit,
                    'kids' => $kids,
                    'juvenil' => $juvenil,
                    'mediaSuperior' => $mediaSuperior,
                    'superior' => $superior,
                    'posgrado' => $posgrado
                ]
                ]);
        } catch (\Exception $th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage()
            ]);
        }
    }
    public function getEstadisticasSede($sede)
    {
        try {
            $kids = count(Proyecto::where('categoria', 'kids')->where('sede', $sede)->get());
            $juvenil = count(Proyecto::where('categoria', 'juvenil')->where('sede', $sede)->get());
            $petit = count(Proyecto::where('categoria', 'petit')->where('sede', $sede)->get());
            $mediaSuperior = count(Proyecto::where('categoria', 'media superior')->where('sede', $sede)->get());
            $superior = count(Proyecto::where('categoria', 'superior')->where('sede', $sede)->get());
            $posgrado = count(Proyecto::where('categoria', 'posgrado')->where('sede', $sede)->get());
            return response()->json([
                'error' => false,
                'data' => [
                    'petit' => $petit,
                    'kids' => $kids,
                    'juvenil' => $juvenil,
                    'mediaSuperior' => $mediaSuperior,
                    'superior' => $superior,
                    'posgrado' => $posgrado
                ]
                ]);
        } catch (\Exception $th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage()
            ]);
        }
    }
}
