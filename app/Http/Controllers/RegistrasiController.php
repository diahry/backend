<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrasi;
use Illuminate\Support\Str;

class RegistrasiController extends Controller
{
    function get()
    {
        $Registrasi = Registrasi::get();
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
        $validasi=$request->validate([
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
            $ktm = Str::uuid().".".$file->getClientOriginalExtension();
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

    function editRegistrasi(Request $request, $id)
    {
        
        $Registrasi = Registrasi::where('id', $id)->first();
        
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

        if($Registrasi){
            $Registrasi->nama = $request->nama ? $request->nama : $Registrasi->nama;
            $Registrasi->nim = $request->nim ? $request->nim : $Registrasi->nim;
            $Registrasi->no_hp = $request->no_hp ? $request->no_hp : $Registrasi->no_hp;
            $Registrasi->email = $request->email ? $request->email : $Registrasi->email;
            $Registrasi->ttl = $request->ttl ? $request->ttl : $Registrasi->ttl;
            $Registrasi->ktm = $ktm ? $request->$ktm : $Registrasi->ktm;
            $Registrasi->transkrip = $transkrip ? $request->transkrip : $Registrasi->transkrip;
            $Registrasi->sertifikat_bam = $sertifikat_bam ? $request->sertifikat_bam : $Registrasi->sertifikat_bam;
            $Registrasi->sertifikat_btq = $sertifikat_btq ? $request->sertifikat_btq : $Registrasi->sertifikat_btq;
            
            $Registrasi->save();
            return response()->json([
                "message"=> "PUT Method Success",
                "data" => $Registrasi
            ]);
        }
        return response()->json([
            "message"=> "user dengan id".$id."not found"
        ], 400);
    }

    function delete(Request $request, $id)
    {
        $registrasi = Registrasi::findOrFail($id);
        $result = $registrasi->delete();
        if($result){
            return ['result'=>'Record has been deleted'];
        }        

    }
}
