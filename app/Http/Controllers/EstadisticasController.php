<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Integrante1;
use App\Models\Integrante2;
use App\Models\Proyecto;

class EstadisticasController extends Controller
{
    public function proyectosPorSede()
    {
        try {
            $mante = count(Proyecto::where('sede', 'mante')->get());
            $victoria = count(Proyecto::where('sede', 'victoria')->get());
            $madero = count(Proyecto::where('sede', 'madero')->get());
            $matamoros = count(Proyecto::where('sede', 'matamoros')->get());
            $reynosa = count(Proyecto::where('sede', 'reynosa')->get());
            $nuevoLaredo = count(Proyecto::where('sede', 'nuevo laredo')->get());
            return response()->json([
                'error' => false,
                'estadisticas' => [
                    'El Mante' => $mante,
                    'Victoria' => $victoria,
                    'Madero' => $madero,
                    'Reynosa' => $reynosa,
                    'Matamoros' => $matamoros,
                    'Nuevo Laredo' => $nuevoLaredo,
                ],
            ]);
        } catch (\Exception$th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage(),
            ]);
        }
    }
    public function proyectosPorCategoria()
    {
        try {
            $petit = count(Proyecto::where('categoria', 'petit')->get());
            $kids = count(Proyecto::where('categoria', 'kids')->get());
            $juvenil = count(Proyecto::where('categoria', 'juvenil')->get());
            $mediaSuperior = count(Proyecto::where('categoria', 'media superior')->get());
            $superior = count(Proyecto::where('categoria', 'superior')->get());
            $posgrado = count(Proyecto::where('categoria', 'posgrado')->get());
            return response()->json([
                'error' => false,
                'estadisticas' => [
                    'petit' => $petit,
                    'kids' => $kids,
                    'juvenil' => $juvenil,
                    'media-superior' => $mediaSuperior,
                    'superior' => $superior,
                    'posgrado' => $posgrado,
                ],
            ]);
        } catch (\Exception$th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage(),
            ]);
        }
    }
    public function asesoresPorSede()
    {
        try {
            $mante = count(Asesor::join('proyecto', 'asesor.idparticipante', '=','proyecto.idparticipante')->where('proyecto.sede', 'mante')->get());
            $victoria = count(Asesor::join('proyecto', 'asesor.idparticipante', '=','proyecto.idparticipante')->where('proyecto.sede', 'victoria')->get());
            $madero = count(Asesor::join('proyecto', 'asesor.idparticipante', '=','proyecto.idparticipante')->where('proyecto.sede', 'madero')->get());
            $matamoros = count(Asesor::join('proyecto', 'asesor.idparticipante', '=','proyecto.idparticipante')->where('proyecto.sede', 'matamoros')->get());
            $reynosa = count(Asesor::join('proyecto', 'asesor.idparticipante', '=','proyecto.idparticipante')->where('proyecto.sede', 'reynosa')->get());
            $nuevoLaredo = count(Asesor::join('proyecto', 'asesor.idparticipante', '=','proyecto.idparticipante')->where('proyecto.sede', 'nuevo laredo')->get());
            return response()->json([
                'error' => false,
                'estadisticas' => [
                    'ElMante' => $mante,
                    'Victoria' => $victoria,
                    'Madero' => $madero,
                    'Reynosa' => $reynosa,
                    'Matamoros' => $matamoros,
                    'Nuevo Laredo' => $nuevoLaredo,
                ],
            ]);
        } catch (\Exception$th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage(),
            ]);
        }
    }
    public function participantesPorSede()
    {
        try {
            $mante = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'mante')->get());
            $victoria = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'victoria')->get());
            $madero = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'madero')->get());
            $matamoros = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'matamoros')->get());
            $reynosa = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'reynosa')->get());
            $nuevoLaredo = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'nuevo laredo')->get());
            $mante2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'mante')->get());
            $victoria2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'victoria')->get());
            $madero2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'madero')->get());
            $matamoros2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'matamoros')->get());
            $reynosa2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'reynosa')->get());
            $nuevoLaredo2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'nuevo laredo')->get());
            return response()->json([
                'error' => false,
                'estadisticas' => [
                    'El Mante' => $mante + $mante2,
                    'Victoria' => $victoria + $victoria2,
                    'Madero' => $madero + $madero2,
                    'Reynosa' => $reynosa + $reynosa2,
                    'Matamoros' => $matamoros + $matamoros2,
                    'Nuevo Laredo' => $nuevoLaredo + $nuevoLaredo2,
                ],
            ]);
        } catch (\Exception$th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage(),
            ]);
        }
    }
    public function participantesPorCategoria()
    {
        try {
            $petit = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->where('proyecto.categoria', 'petit')->get());
            $kids = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->where('proyecto.categoria', 'kids')->get());
            $juvenil = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->where('proyecto.categoria', 'juvenil')->get());
            $mediaSuperior = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->where('proyecto.categoria', 'media superior')->get());
            $superior = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->where('proyecto.categoria', 'superior')->get());
            $posgrado = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->where('proyecto.categoria', 'posgrado')->get());
            $petit2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->where('proyecto.categoria', 'petit')->get());
            $kids2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->where('proyecto.categoria', 'kids')->get());
            $juvenil2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->where('proyecto.categoria', 'juvenil')->get());
            $mediaSuperior2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->where('proyecto.categoria', 'media superior')->get());
            $superior2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->where('proyecto.categoria', 'superior')->get());
            $posgrado2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->where('proyecto.categoria', 'posgrado')->get());
            return response()->json([
                'error' => false,
                'estadisticas' => [
                    'petit' => $petit + $petit2,
                    'kids' => $kids + $kids2,
                    'juvenil' => $juvenil + $juvenil2,
                    'media-superior' => $mediaSuperior + $mediaSuperior2,
                    'superior' => $superior + $superior2,
                    'posgrado' => $posgrado + $posgrado2,
                ],
            ]);
        } catch (\Exception$th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage(),
            ]);
        }
    }
}
