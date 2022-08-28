<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class FasesController extends Controller
{
    public function insertarGanadoresEstatal(Request $request)
    {
        try {
            $calificaciones = $request->calificaciones;
            $sedes = ['El Mante', 'Victoria', 'Reynosa', 'Madero', 'Nuevo Laredo', 'Matamoros'];
            $categorias = ['petit', 'kids', 'juvenil', 'media_superior', 'superior', 'posgrado'];
            foreach ($sedes as &$sede) {
                foreach ($categorias as &$categoria) {
                    foreach ($calificaciones[$sede][$categoria] as &$proyecto) {
                        if ($proyecto != null) {
                            $this->registrarGanadoresEstatal($proyecto);
                        }
                    }
                }
            }
            return response()->json([
                'error' => false,
                'msg' => 'se activo correctamente la fase estatal',
            ]);
        } catch (\Exception$th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage(),
            ]);
        }
    }
    public function insertarGanadoresInternacional(Request $request)
    {
        try {
            $calificaciones = $request->calificaciones;
            $categorias = ['petit', 'kids', 'juvenil', 'media_superior', 'superior', 'posgrado'];
            foreach ($categorias as &$categoria) {
                foreach ($calificaciones['Estatal'][$categoria] as &$proyecto) {
                    if ($proyecto != null) {
                        $this->registrarGanadoresInternacional($proyecto);
                    }
                }
            }
            return response()->json([
                'error' => false,
                'msg' => 'se activo correctamente la fase internacional',
            ]);
        } catch (\Exception$th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage(),
            ]);
        }
    }
    private function registrarGanadoresEstatal($proyecto)
    {
        $proyecto = Proyecto::where('id', $proyecto['id_proyectos'])->first();
        $proyectoNuevo = new Proyecto();
        $proyectoNuevo->idparticipante = $proyecto['idparticipante'];
        $proyectoNuevo->modalidad = $proyecto['modalidad'];
        $proyectoNuevo->sede = 'Estatal';
        $proyectoNuevo->urlvideo = $proyecto['urlvideo'];
        $proyectoNuevo->categoria = $proyecto['categoria'];
        $proyectoNuevo->titulo = $proyecto['titulo'];
        $proyectoNuevo->descripcion = $proyecto['descripcion'];
        $proyectoNuevo->area = $proyecto['area'];
        $proyectoNuevo->activo_foto = $proyecto['activo_foto'];
        $proyectoNuevo->foto = $proyecto['foto'];
        $proyectoNuevo->save();
    }
    private function registrarGanadoresInternacional($proyecto)
    {
        $proyecto = Proyecto::where('id', $proyecto->id_proyectos)->first();
        $proyectoNuevo = new Proyecto();
        $proyectoNuevo->idparticipante = $proyecto->idparticipante;
        $proyectoNuevo->modalidad = $proyecto->modalidad;
        $proyectoNuevo->sede = 'Internacional';
        $proyectoNuevo->urlvideo = $proyecto->urlvideo;
        $proyectoNuevo->categoria = $proyecto->categoria;
        $proyectoNuevo->titulo = $proyecto->titulo;
        $proyectoNuevo->descripcion = $proyecto->descripcion;
        $proyectoNuevo->area = $proyecto->area;
        $proyectoNuevo->activo_foto = $proyecto->activo_foto;
        $proyectoNuevo->save();
    }
}
