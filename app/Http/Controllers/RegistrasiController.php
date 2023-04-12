<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrasi;

class RegistrasiController extends Controller
{
    function get()
    {
        return response()->json(
            [
                "message" => "Success",
                "data" => $Registrasi
            ]
        );
    }

    function post(Request $request)
    { 
        // dd($request);
        $request->validate([
            'nama'=> 'required',
            'nim'=> 'required',
            'no_hp'=> 'required',
            'email'=> 'required',
            'ttl'=> 'required',
            'ktm'=> 'required',
            'transkrip'=> 'required',
            'sertifikat_bam'=> 'required',
            'sertifikat_btq'=> 'required',
        ]);
        //ktm
        if($request->file('ktm') !=null){
            $file =$request->file('ktm');
            $ktm = time().".".$file->getClientOriginalExtension();
            $path =$request->file('ktm')->move(public_path('/files'),$ktm);
            $fileUrl =url('/files/'.$ktm);
        }else{
            $ktm = null;
        }

        //transkrip
        if($request->file('transkrip') !=null){
            $file =$request->file('transkrip');
            $transkrip = time().".".$file->getClientOriginalExtension();
            $path =$request->file('transkrip')->move(public_path('/files'),$transkrip);
            $fileUrl =url('/files/'.$transkrip);
        }else{
            $transkrip = null;
        }

        //sertifikat_bam
        if($request->file('sertifikat_bam') !=null){
            $file =$request->file('sertifikat_bam');
            $sertifikat_bam = time().".".$file->getClientOriginalExtension();
            $path =$request->file('sertifikat_bam')->move(public_path('/files'),$sertifikat_bam);
            $fileUrl =url('/files/'.$sertifikat_bam);
        }else{
            $sertifikat_bam = null;
        }
        
        //sertifikat_btq
        if($request->file('sertifikat_btq') !=null){
            $file =$request->file('sertifikat_btq');
            $sertifikat_btq = time().".".$file->getClientOriginalExtension();
            $path =$request->file('sertifikat_btq')->move(public_path('/files'),$sertifikat_btq);
            $fileUrl =url('/files/'.$sertifikat_btq);
        }else{
            $sertifikat_btq = null;
        }

        $Registrasi = new Registrasi;
        $Registrasi->nama = $request->nama;
        $Registrasi->nim = $request->nim;
        $Registrasi->no_hp = $request->no_hp;
        $Registrasi->email = $request->email;
        $Registrasi->ttl = $request->ttl;
        $Registrasi->ktm = $ktm;
        $Registrasi->transkrip = $transkrip;
        $Registrasi->sertifikat_bam = $sertifikat_bam;
        $Registrasi->sertifikat_btq = $sertifikat_btq;

        $Registrasi->save();
        return response()->json(
            [
                "message" => "Success",
                "data" => $Registrasi
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

    function delete(Request $request, $id)
    {
        $deleteFile = Files::where('file_id',$id)->first();
        if($deleteFile){
            if($deleteFile-> ktm != null){
                if(file_exists(public_path('/files/'.$deleteFile-> ktm))){
                    $ktm = $deleteFile-> ktm;
                    $file_path = str_replace('\\','/',public_path('/files/'));
                    $deleteFile = unlink($file_path.$ktm);
                }
            $deleteFile->delete();
            return response()->json([
                'status'=> 200,
                'message'=> "Data has been delete",
            ],200);
            }
        }else{
            return response()->json([
                'status'=> 404,
                'message'=> "Not Found",
            ],404);
        }
        // return response()->json(
        //     [
        //         "message" => "DELETE Method Success".$id
        //     ]
        // );
    }
}
