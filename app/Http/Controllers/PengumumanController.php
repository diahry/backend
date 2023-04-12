<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    function get()
    {
        $data = Pengumuman::all();

        return response()->json(
            [
                "message" => "Success",
                "data" => $data
            ]
        );
    }

    function post(Request $request)
    {
        $request->validate([
            'nama'=> 'required',
            'nim'=> 'required',
            'prodi'=> 'required',
            'fakultas'=> 'required',
            'tes_baca_al_quran'=> 'required'
        ]);
        $Pengumuman = new Pengumuman; 
        $Pengumuman->nama = $request->nama;
        $Pengumuman->nim = $request->nim;
        $Pengumuman->prodi = $request->prodi;
        $Pengumuman->fakultas = $request->fakultas;
        $Pengumuman->tes_baca_al_quran = $request->tes_baca_al_quran;

        $Pengumuman->save();
        return response()->json(
            [
                "message" => "Success",
                "data" => $Pengumuman
            ]
        );
    }

    function put()
    {
        return response()->json(
            [
                "message" => "PUT Method Success".$id
            ]
        );
    }

    function delete()
    {
        return response()->json(
            [
                "message" => "DELETE Method Success".$id
            ]
        );
    }
}
