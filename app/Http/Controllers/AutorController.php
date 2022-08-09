<?php

namespace App\Http\Controllers;

use App\Models\Integrante1;
use App\Models\Integrante2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutorController extends Controller
{

    public function getAutoresSede($sede)
    {
        $autores = DB::select('CALL getAutoresSede("' . $sede . '")');
        return response()->json([
            'error' => false,
            'autores' => $autores,
        ]);
    }
    public function getAutoresAll()
    {
        $autores = DB::select('CALL getAutoresAll()');
        return response()->json([
            'error' => false,
            'autores' => $autores,
        ]);
    }
    public function update(Request $request, $id)
    {
        try {
            $autor1 = Integrante1::where('id', $id)->first();
            $autor2 = Integrante2::where('id', $id)->first();
            if ($autor1) {
                $autor1->nombre = $request->nombre;
                $autor1->apellidop = $request->apellidop;
                $autor1->apellidom = $request->apellidom;
                $autor1->CURP = $request->CURP;
                $autor1->RFC = $request->RFC;
                $autor1->telefono = $request->telefono;
                $autor1->correo = $request->correo;
                $autor1->update();
                return response()->json([
                    'error' => false,
                    'msg' => 'El autor se actualizo correctamente',
                ]);
            } else if ($autor2) {
                $autor2->nombre = $request->nombre;
                $autor2->apellidop = $request->apellidop;
                $autor2->apellidom = $request->apellidom;
                $autor2->CURP = $request->CURP;
                $autor2->RFC = $request->RFC;
                $autor2->telefono = $request->telefono;
                $autor2->correo = $request->correo;
                $autor2->update();
                return response()->json([
                    'error' => false,
                    'msg' => 'El autor se actualizo correctamente',
                ]);
            }
            return response()->json([
                'error' => true,
                'msg' => 'No se encontro el autor',
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
            $autor1 = Integrante1::where('id', $id)->first();
            $autor2 = Integrante2::where('id', $id)->first();
            if ($autor1) {
                $autor1->delete();
                return response()->json([
                    'error' => false,
                    'msg' => 'El autor se elimino con exito',
                ]);
            } else if ($autor2) {
                $autor2->delete();
                return response()->json([
                    'error' => false,
                    'msg' => 'El autor se elimino con exito',
                ]);
            }
            return response()->json([
                'error' => true,
                'msg' => 'No se encontro el autor',
            ]);
        } catch (\Exception$th) {
            return response()->json([
                'error' => true,
                'msg' => $th->getMessage(),
            ]);
        }
    }
}
