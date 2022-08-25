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
            $mante = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('proyecto.sede', 'el mante')->where('usuarios.estado', 0)->get());
            $victoria = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('proyecto.sede', 'victoria')->where('usuarios.estado', 0)->get());
            $matamoros = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('proyecto.sede', 'matamoros')->where('usuarios.estado', 0)->get());
            $madero = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('proyecto.sede', 'madero')->where('usuarios.estado', 0)->get());
            $reynosa = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('proyecto.sede', 'reynosa')->where('usuarios.estado', 0)->get());
            $nuevoLaredo = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('proyecto.sede', 'nuevo laredo')->where('usuarios.estado', 0)->get());
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
            $petit = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('categoria', 'petit')->get());
            $kids = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('categoria', 'kids')->get());
            $juvenil = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('categoria', 'juvenil')->get());
            $mediaSuperior = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('categoria', 'media superior')->get());
            $superior = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('categoria', 'superior')->get());
            $posgrado = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('categoria', 'posgrado')->get());
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
    public function proyectosPorCategoriaPorSede($sede)
    {
        try {
            $petit = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('categoria', 'petit')->where('sede', $sede)->get());
            $kids = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('categoria', 'kids')->where('sede', $sede)->get());
            $juvenil = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('categoria', 'juvenil')->where('sede', $sede)->get());
            $mediaSuperior = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('categoria', 'media superior')->where('sede', $sede)->get());
            $superior = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('categoria', 'superior')->where('sede', $sede)->get());
            $posgrado = count(Proyecto::join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('categoria', 'posgrado')->where('sede', $sede)->get());
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
            $mante = count(Asesor::join('proyecto', 'asesor.idparticipante', '=','proyecto.idparticipante')->join('usuarios', 'asesor.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.sede', 'el mante')->get());
            $victoria = count(Asesor::join('proyecto', 'asesor.idparticipante', '=','proyecto.idparticipante')->join('usuarios', 'asesor.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.sede', 'victoria')->get());
            $madero = count(Asesor::join('proyecto', 'asesor.idparticipante', '=','proyecto.idparticipante')->join('usuarios', 'asesor.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.sede', 'madero')->get());
            $matamoros = count(Asesor::join('proyecto', 'asesor.idparticipante', '=','proyecto.idparticipante')->join('usuarios', 'asesor.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.sede', 'matamoros')->get());
            $reynosa = count(Asesor::join('proyecto', 'asesor.idparticipante', '=','proyecto.idparticipante')->join('usuarios', 'asesor.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.sede', 'reynosa')->get());
            $nuevoLaredo = count(Asesor::join('proyecto', 'asesor.idparticipante', '=','proyecto.idparticipante')->join('usuarios', 'asesor.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.sede', 'nuevo laredo')->get());
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
    public function participantesPorSede()
    {
        try {
            $mante = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('sede', 'el mante')->get());
            $victoria = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('sede', 'victoria')->get());
            $madero = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('sede', 'madero')->get());
            $matamoros = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('sede', 'matamoros')->get());
            $reynosa = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('sede', 'reynosa')->get());
            $nuevoLaredo = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('sede', 'nuevo laredo')->get());
            $mante2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('sede', 'mante')->get());
            $victoria2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('sede', 'victoria')->get());
            $madero2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('sede', 'madero')->get());
            $matamoros2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('sede', 'matamoros')->get());
            $reynosa2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('sede', 'reynosa')->get());
            $nuevoLaredo2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('sede', 'nuevo laredo')->get());
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
            $petit = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.categoria', 'petit')->get());
            $kids = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.categoria', 'kids')->get());
            $juvenil = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.categoria', 'juvenil')->get());
            $mediaSuperior = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.categoria', 'media superior')->get());
            $superior = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.categoria', 'superior')->get());
            $posgrado = count(Integrante1::join('proyecto', 'integrante1.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.categoria', 'posgrado')->get());
            $petit2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.categoria', 'petit')->get());
            $kids2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.categoria', 'kids')->get());
            $juvenil2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.categoria', 'juvenil')->get());
            $mediaSuperior2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.categoria', 'media superior')->get());
            $superior2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.categoria', 'superior')->get());
            $posgrado2 = count(Integrante2::join('proyecto', 'integrante2.idparticipante', '=', 'proyecto.idparticipante')->join('usuarios', 'proyecto.idparticipante', '=', 'usuarios.idparticipante')->where('usuarios.estado', 0)->where('proyecto.categoria', 'posgrado')->get());
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
