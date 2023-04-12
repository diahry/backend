<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info_Pembayaran;

class Info_PembayaranController extends Controller
{
    function get()
    {
        $data = Info_Pembayaran::all();

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
            'no_rek'=> 'required',
            'bukti'=> 'required'
        ]);
        $Info_Pembayaran = new Info_Pembayaran; 
        $Info_Pembayaran->nama = $request->nama;
        $Info_Pembayaran->no_rek = $request->no_rek;
        $Info_Pembayaran->bukti = $request->bukti;

        $Info_Pembayaran->save();
        return response()->json(
            [
                "message" => "Success",
                "data" => $Info_Pembayaran
            ]
        );
    }

    function put($id)
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
