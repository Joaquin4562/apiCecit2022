<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsesorController extends Controller
{
    public function getAsesoresAll()
    {
        $asesores = DB::select("SELECT
        asesor.id as id_asesores,
        proyecto.sede as sede,
        asesor.nombre as nombre,
        asesor.apellidop as ape_pat,
        asesor.apellidom as ape_mat,
        asesor.RFC as rfc,
        asesor.telefono as telefono,
        asesor.CURP as curp,
        asesor.domicilio as domicilio,
        asesor.ciudad as municipio,
        asesor.estado as localidad,
        asesor.correo as email,
        asesor.descripcion as descripcion
        FROM asesor
        JOIN proyecto
        ON asesor.idparticipante = proyecto.idparticipante");
        return response()->json([
            'error' => false,
            'asesores' => $asesores,
        ]);
    }
    public function getAsesoresSede($sede)
    {
        $asesores = DB::select("SELECT
        asesor.id as id_asesores,
        proyecto.sede as sede,
        asesor.nombre as nombre,
        asesor.apellidop as ape_pat,
        asesor.apellidom as ape_mat,
        asesor.RFC as rfc,
        asesor.telefono as telefono,
        asesor.CURP as curp,
        asesor.domicilio as domicilio,
        asesor.ciudad as municipio,
        asesor.estado as localidad,
        asesor.correo as email,
        asesor.descripcion as descripcion
        FROM asesor
        JOIN proyecto
        ON asesor.idparticipante = proyecto.idparticipante
        WHERE proyecto.sede = '".$sede."'");
        return response()->json([
            'error' => false,
            'asesores' => $asesores,
        ]);
    }
    public function update(Request $request, $id)
    {
        try {
            $asesor = Asesor::where('id', $id)->first();
            $asesor->nombre = $request->nombre;
            $asesor->apellidom = $request->apellidom;
            $asesor->apellidop = $request->apellidop;
            $asesor->telefono = $request->telefono;
            $asesor->correo = $request->correo;
            $asesor->descripcion = $request->descripcion;
            $asesor->update();
            return response()->json([
                'error' => false,
                'msg' => 'asesor actualizado correctamente',
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
            $asesor = Asesor::where('id', $id)->first();
            if($asesor) {
                $asesor->delete();
                return response()->json([
                    'error' => false,
                    'msg' => 'El asesor se elimino con exito',
                ]);
            }
            return response()->json([
                'error' => true,
                'msg' => 'No se encontro el asesor',
            ]);
        } catch (\Exception$th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage()
            ]);
        }
    }
}
