<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sertifikat;

class SertifikatController extends Controller
{
    function get()
    {
        $Sertifikat = Sertifikat::get();
        return response()->json(
            [
            "message" => "Success",
            "data" => $Sertifikat
            ]
        );
    }

    function post(Request $request)
    {
        $request->validate([
            'nama'=> 'required',
            'nim'=> 'required',
            'no_hp'=> 'required',
            'email'=> 'required',
            'sertifikat'=> 'required'
        ]);

        //sertifikat
        if($request->file('sertifikat') !=null){
            $file =$request->file('sertifikat');
            $sertifikat = time().".".$file->getClientOriginalExtension();
            $path =$request->file('sertifikat')->move(public_path('/files'),$sertifikat);
            $fileUrl =url('/files/'.$sertifikat);
        }else{
            $sertifikat = null;
        }
        
        $Sertifikat = new Sertifikat;
        $Sertifikat->nama = $request->nama;
        $Sertifikat->nim = $request->nim;
        $Sertifikat->no_hp = $request->no_hp;
        $Sertifikat->email = $request->email;
        $Sertifikat->sertifikat = $sertifikat;

        $Sertifikat->save();
        return response()->json(
            [
                "message" => "Success",
                "data" => $Sertifikat
            ]
        );
    }

    function editSertifikat(Request $request, $id)
    {
        $Sertifikat = Sertifikat::where('id', $id)->first();
        
        //sertifikat
        if($request->file('sertifikat') !=null){
            $file =$request->file('sertifikat');
            $sertifikat = time().".".$file->getClientOriginalExtension();
            $path =$request->file('sertifikat')->move(public_path('/files'),$sertifikat);
            $fileUrl =url('/files/'.$sertifikat);
        }else{
            $sertifikat = null;
        }

        if($Sertifikat){
            $Sertifikat->nama = $request->nama;
            $Sertifikat->nim = $request->nim;
            $Sertifikat->no_hp = $request->no_hp;
            $Sertifikat->email = $request->email;
            $Sertifikat->sertifikat = $sertifikat;

            $Sertifikat->save();
            return response()->json([
                "message"=> "PUT Method Success",
                "data" => $Sertifikat
            ]);
        }
        return response()->json([
            "message"=> "user dengan id".$id."not found"
        ], 400);
    }

    function delete(Request $request, $id)
    {
        $Sertifikat = Sertifikat::findOrFail($id);
        $result = $Sertifikat->delete();
        if($result){
            return ['result'=>'Data has been deleted'];
        }   
    }
}
