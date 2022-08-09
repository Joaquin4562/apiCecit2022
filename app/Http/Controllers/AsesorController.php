<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsesorController extends Controller
{
    public function getAsesoresAll()
    {
        $asesores = DB::select("CALL getAsesoresAll()");
        return response()->json([
            'error' => false,
            'asesores' => $asesores,
        ]);
    }
    public function getAsesoresSede($sede)
    {
        $asesores = DB::select("CALL getAsesoresSede('" . $sede . "')");
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
