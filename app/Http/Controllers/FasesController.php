<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function insertarGanadoresInternacional()
    {
        try {
            $calificaciones = DB::select("SELECT DISTINCT
            proyecto.id,
            proyecto.idparticipante,
            proyecto.modalidad,
            proyecto.sede,
            proyecto.urlvideo,
            proyecto.categoria,
            proyecto.titulo,
            proyecto.descripcion,
            proyecto.area,
            proyecto.foto,
            proyecto.activo_foto
        FROM
            proyecto
        JOIN usuarios ON proyecto.idparticipante = proyecto.idparticipante
        JOIN integrante1 ON proyecto.idparticipante = integrante1.idparticipante
        WHERE
            proyecto.categoria = 'Media Superior' AND (integrante1.ingles = '61 - 80%' OR integrante1.ingles = '81 - 100%') AND usuarios.estado = 0
            UNION
            SELECT DISTINCT
            proyecto.id,
            proyecto.idparticipante,
            proyecto.modalidad,
            proyecto.sede,
            proyecto.urlvideo,
            proyecto.categoria,
            proyecto.titulo,
            proyecto.descripcion,
            proyecto.area,
            proyecto.foto,
            proyecto.activo_foto
        FROM
            proyecto
        JOIN usuarios ON proyecto.idparticipante = proyecto.idparticipante
        JOIN integrante1 ON proyecto.idparticipante = integrante1.idparticipante
        WHERE
            proyecto.categoria = 'Media Superior' AND integrante1.ingles = '61 - 80%' OR integrante1.ingles = '81 - 100%' AND usuarios.estado = 0
        UNION
        SELECT DISTINCT
            proyecto.id,
            proyecto.idparticipante,
            proyecto.modalidad,
            proyecto.sede,
            proyecto.urlvideo,
            proyecto.categoria,
            proyecto.titulo,
            proyecto.descripcion,
            proyecto.area,
            proyecto.foto,
            proyecto.activo_foto
        FROM
            proyecto
        JOIN usuarios ON proyecto.idparticipante = proyecto.idparticipante
        JOIN integrante1 ON proyecto.idparticipante = integrante1.idparticipante
        WHERE
            proyecto.categoria = 'Superior' AND (integrante1.ingles = '61 - 80%' OR integrante1.ingles = '81 - 100%') AND usuarios.estado = 0");

            foreach ($calificaciones as &$proyecto) {
                $this->registrarGanadoresInternacional($proyecto);
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
        $proyecto = Proyecto::where('id', $proyecto['id_proyectos'])->first();
        $proyectoNuevo = new Proyecto();
        $proyectoNuevo->idparticipante = $proyecto['idparticipante'];
        $proyectoNuevo->modalidad = $proyecto['modalidad'];
        $proyectoNuevo->sede = 'Internacional';
        $proyectoNuevo->urlvideo = $proyecto['urlvideo'];
        $proyectoNuevo->categoria = $proyecto['categoria'];
        $proyectoNuevo->titulo = $proyecto['titulo'];
        $proyectoNuevo->descripcion = $proyecto['descripcion'];
        $proyectoNuevo->area = $proyecto['area'];
        $proyectoNuevo->foto = $proyecto['foto'];
        $proyectoNuevo->activo_foto = $proyecto['activo_foto'];
        $proyectoNuevo->save();
    }
}
