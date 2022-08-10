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
            $matamoros = count(Proyecto::where('sede', 'matamoros')->get());
            $reynosa = count(Proyecto::where('sede', 'reynosa')->get());
            $nuevoLaredo = count(Proyecto::where('sede', 'nuevo laredo')->get());
            return response()->json([
                'error' => false,
                'estadisticas' => [
                    'mante' => $mante,
                    'victoria' => $victoria,
                    'reynosa' => $reynosa,
                    'matamoros' => $matamoros,
                    'nuevoLaredo' => $nuevoLaredo,
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
                    'mediaSuperior' => $mediaSuperior,
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
            $matamoros = count(Asesor::join('proyecto', 'asesor.idparticipante', '=','proyecto.idparticipante')->where('proyecto.sede', 'matamoros')->get());
            $reynosa = count(Asesor::join('proyecto', 'asesor.idparticipante', '=','proyecto.idparticipante')->where('proyecto.sede', 'reynosa')->get());
            $nuevoLaredo = count(Asesor::join('proyecto', 'asesor.idparticipante', '=','proyecto.idparticipante')->where('proyecto.sede', 'nuevo laredo')->get());
            return response()->json([
                'error' => false,
                'estadisticas' => [
                    'mante' => $mante,
                    'victoria' => $victoria,
                    'reynosa' => $reynosa,
                    'matamoros' => $matamoros,
                    'nuevoLaredo' => $nuevoLaredo,
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
            $matamoros = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'matamoros')->get());
            $reynosa = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'reynosa')->get());
            $nuevoLaredo = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'nuevo laredo')->get());
            $mante2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'mante')->get());
            $victoria2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'victoria')->get());
            $matamoros2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'matamoros')->get());
            $reynosa2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'reynosa')->get());
            $nuevoLaredo2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->where('sede', 'nuevo laredo')->get());
            return response()->json([
                'error' => false,
                'estadisticas' => [
                    'mante' => $mante + $mante2,
                    'victoria' => $victoria + $victoria2,
                    'reynosa' => $reynosa + $reynosa2,
                    'matamoros' => $matamoros + $matamoros2,
                    'nuevoLaredo' => $nuevoLaredo + $nuevoLaredo2,
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
                    'mediaSuperior' => $mediaSuperior + $mediaSuperior2,
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
