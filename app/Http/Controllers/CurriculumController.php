<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function import(Request $request)
    {
        try {
            if($request->hasFile('cv')) {
                $nombre = str_replace(' ', '-', $request->nombre);
                $image = $request->file('cv');
                $reImage = $request->usuario . '-'.$nombre.'_CV.'.$image->getClientOriginalExtension();
                $destination = public_path('curriculumns-jueces');
                $image->move($destination, $reImage);
                return response()->json([
                    'error' => false,
                    'path' => 'public/curriculumns-jueces/'.$reImage
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'msg' => 'debes adjuntar el CV'
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
