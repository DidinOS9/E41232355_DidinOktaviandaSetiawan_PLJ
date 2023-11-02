<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ApiPendidikanController extends Controller
{
    public function getAll(){
        $pendidikan = Pendidikan::all();
        return Response::json($pendidikan, 200);
    }
    
    public function getPen($id){
        $pendidikan = Pendidikan::find($id);
        return Response::json($pendidikan, 200);
    }

    public function createPen(Request $request){
        Pendidikan::create($request->all());
        return Response::json([
            'status' => 'ok',
            'message' => 'Data Pendidikan berhasil ditambahkan!'
        ], 201);
    }

    public function updatePen($id, Request $request) {
        $pendidikan = Pendidikan::find($id)->update($request->all());

        if (!$pendidikan) {
            return Response::json([
                'status' => 'error',
                'message' => 'Data Pendidikan tidak ditemukan!'
            ], 404);
        }
        
        return Response::json([
            'status' => 'ok',
            'message' => 'Data Pendidikan berhasil diubah!'
        ], 200);
    }
    
    public function deletePen($id){
        Pendidikan::destroy($id);
        return Response::json([
            'status' => 'ok',
            'message' => 'Data Pendidikan berhasil dihapus!'
        ], 201);
    }


}
