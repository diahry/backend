<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    function get()
    {
        $data = Users::all();

        return response()->json(
            [
                "message" => "Success",
                "data" => $data
            ]
        );
    }

    function post(Request $request)
    {
        //print nilai
        if($request->file('print_nilai') !=null){
            $file =$request->file('print_nilai');
            $print_nilai = time().".".$file->getClientOriginalExtension();
            $path =$request->file('print_nilai')->move(public_path('/files'),$print_nilai);
            $fileUrl =url('/files/'.$print_nilai);
        }else{
            $print_nilai = null;
        }

        $Users = new Users; 
        $Users->nama = $request->nama;
        $Users->nim = $request->nim;
        $Users->no_telepon = $request->no_telepon;
        $Users->email = $request->email;
        $Users->pembayaran = $request->pembayaran;
        $Users->print_nilai = $print_nilai;
        $Users->status_pembayaran = $request->status_pembayaran;
        $Users->up_pembayaran = $request->up_pembayaran;

        $Users->save();
        return response()->json(
            [
                "message" => "Success",
                "data" => $Users
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
