<?php

namespace App\Http\Controllers;

use App\Models\PengalamanKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ApiPengalamanKerjaController extends Controller
{
    public function getAll(){
        $pengalaman_kerja = PengalamanKerja::all();
        return Response::json($pengalaman_kerja, 200);
    }
    
    public function getPen($id){
        $pengalaman_kerja = PengalamanKerja::find($id);
        return Response::json($pengalaman_kerja, 200);
    }

    public function createPen(Request $request){
        PengalamanKerja::create($request->all());
        return Response::json([
            'status' => 'ok',
            'message' => 'Data Pengalaman Kerja berhasil ditambahkan!'
        ], 201);
    }

    public function updatePen($id, Request $request){
        PengalamanKerja::find($id)->update($request->all());
        return Response::json([
            'status' => 'ok',
            'message' => 'Data Pengalaman Kerja berhasil dirubah!'
        ], 201);
    }

    
    public function deletePen($id){
        PengalamanKerja::destroy($id);
        return Response::json([
            'status' => 'ok',
            'message' => 'Data Pengalaman Kerja berhasil dihapus!'
        ], 201);
    }
}
