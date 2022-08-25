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
        asesor.id AS id_asesores,
        proyecto.sede AS sede,
        asesor.nombre AS nombre,
        asesor.apellidop AS ape_pat,
        asesor.apellidom AS ape_mat,
        asesor.RFC AS rfc,
        asesor.telefono AS telefono,
        asesor.CURP AS curp,
        asesor.domicilio AS domicilio,
        asesor.ciudad AS municipio,
        asesor.estado AS localidad,
        asesor.correo AS email,
        asesor.descripcion AS descripcion
    FROM
        asesor
    JOIN proyecto ON asesor.idparticipante = proyecto.idparticipante
    JOIN usuarios ON asesor.idparticipante = usuarios.idparticipante
    WHERE usuarios.estado = 0");
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
        JOIN proyecto ON asesor.idparticipante = proyecto.idparticipante
        JOIN usuarios ON asesor.idparticipante = usuarios.idparticipante
        WHERE usuarios.estado = 0
        AND proyecto.sede = '".$sede."'");
        return response()->json([
            'error' => false,
            'asesores' => $asesores,
        ]);
    }
    public function update(Request $request)
    {
        try {
            $asesor = Asesor::where('id', $request->id_asesores)->first();
            $asesor->nombre = $request->nombre;
            $asesor->apellidom = $request->ape_mat;
            $asesor->apellidop = $request->ape_pat;
            $asesor->telefono = $request->telefono;
            $asesor->correo = $request->email;
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
