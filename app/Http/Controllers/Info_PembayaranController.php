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
        //bukti
        if($request->file('bukti') !=null){
            $file =$request->file('bukti');
            $bukti = time().".".$file->getClientOriginalExtension();
            $path =$request->file('bukti')->move(public_path('/files'),$bukti);
            $fileUrl =url('/files/'.$bukti);
        }else{
            $bukti = null;
        }

        $Info_Pembayaran = new Info_Pembayaran; 
        $Info_Pembayaran->nama = $request->nama;
        $Info_Pembayaran->no_rek = $request->no_rek;
        $Info_Pembayaran->bukti = $bukti;

        $Info_Pembayaran->save();
        return response()->json(
            [
                "message" => "Success",
                "data" => $Info_Pembayaran
            ]
        );
    }

    function editPembayaran(Request $request, $id)
    {
        $Info_Pembayaran = Info_Pembayaran::where('id', $id)->first();
        
        //bukti
        if($request->file('bukti') !=null){
            $file =$request->file('bukti');
            $bukti = time().".".$file->getClientOriginalExtension();
            $path =$request->file('bukti')->move(public_path('/files'),$bukti);
            $fileUrl =url('/files/'.$bukti);
        }else{
            $bukti = null;
        }

        if($Info_Pembayaran){
            $Info_Pembayaran->nama = $request->nama ? $request->nama : $Info_Pembayaran->nama;
            $Info_Pembayaran->no_rek = $request->no_rek ? $request->no_rek : $Info_Pembayaran->no_rek;;
            $Info_Pembayaran->bukti = $bukti ? $request->bukti : $Info_Pembayaran->bukti;

            $Info_Pembayaran->save();
            return response()->json([
                "message"=> "PUT Method Success",
                "data" => $Info_Pembayaran
            ]);
        }
        return response()->json([
            "message"=> "bukti dengan id".$id."not found"
        ], 400);
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
