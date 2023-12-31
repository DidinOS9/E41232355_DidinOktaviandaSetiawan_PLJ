<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function index()
    {
        $pendidikan = Pendidikan::get();
        return view('backend.pendidikan.index', compact('pendidikan'));
    }

    public function create()
    {
        $pendidikan = null;
        return view('backend.pendidikan.create', compact('pendidikan'));
    }

    public function store(Request $request)
    {
        Pendidikan::create($request->all());

        return redirect()->route('pendidikan.index')
        ->with('success', 'Data Pendidikan Baru Berhasil Disimpan');
    }

    public function edit(Pendidikan $pendidikan)
    {
        return view('backend.pendidikan.create', compact('pendidikan'));
    }

    public function update(Request $request, Pendidikan $pendidikan)
    {
        $input = $request->all();
        // Ubah input 'tingkatan' menjadi bilangan bulat jika perlu
        $input['tingkatan'] = intval($input['tingkatan']);
        $pendidikan->update($input);
        return redirect()->route('pendidikan.index')
            ->with('success', 'Pendidikan Berhasil diperbaharui');
    }


    public function destroy(Pendidikan $pendidikan)
    {
        $pendidikan->delete();
        return redirect()->route('pendidikan.index')->with('success', 'Data Pendidikan berhasil dihapus');
    }
}
