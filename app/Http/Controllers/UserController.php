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
        $request->validate([
            'nama'=> 'required',
            'nim'=> 'required',
            'no_telepon'=> 'required',
            'email'=>'required',
            'pembayaran'=>'required',
            'print_nilai'=>'required',
            'status_pembayaran'=>'required',
            'up_pembayaran'=>'required'
        ]);
        //print nilai
        if($request->file('print_nilai') !=null){
            $file =$request->file('print_nilai');
            $print_nilai = time().".".$file->getClientOriginalExtension();
            $path =$request->file('print_nilai')->move(public_path('/files'),$print_nilai);
            $fileUrl =url('/files/'.$print_nilai);
        }else{
            $print_nilai = null;
        }

        //print pembayaran
        if($request->file('pembayaran') !=null){
            $file =$request->file('pembayaran');
            $pembayaran = time().".".$file->getClientOriginalExtension();
            $path =$request->file('pembayaran')->move(public_path('/files'),$pembayaran);
            $fileUrl =url('/files/'.$pembayaran);
        }else{
            $pembayaran = null;
        }

        //up pembayaran
        if($request->file('up_pembayaran') !=null){
            $file =$request->file('up_pembayaran');
            $up_pembayaran = time().".".$file->getClientOriginalExtension();
            $path =$request->file('up_pembayaran')->move(public_path('/files'),$up_pembayaran);
            $fileUrl =url('/files/'.$up_pembayaran);
        }else{
            $up_pembayaran = null;
        }

        $Users = new Users; 
        $Users->nama = $request->nama;
        $Users->nim = $request->nim;
        $Users->no_telepon = $request->no_telepon;
        $Users->email = $request->email;
        $Users->pembayaran = $pembayaran;
        $Users->print_nilai = $print_nilai;
        $Users->status_pembayaran = $request->status_pembayaran;
        $Users->up_pembayaran = $up_pembayaran;

        $Users->save();
        return response()->json(
            [
                "message" => "Success",
                "data" => $Users
            ]
        );
    }

    function editprofile(Request $request, $id)
    {
        $Users = Users::where('id', $id)->first();

        //print nilai
        if($request->file('print_nilai') !=null){
            $file =$request->file('print_nilai');
            $print_nilai = time().".".$file->getClientOriginalExtension();
            $path =$request->file('print_nilai')->move(public_path('/files'),$print_nilai);
            $fileUrl =url('/files/'.$print_nilai);
        }else{
            $print_nilai = null;
        }

        //print pembayaran
        if($request->file('pembayaran') !=null){
            $file =$request->file('pembayaran');
            $pembayaran = time().".".$file->getClientOriginalExtension();
            $path =$request->file('pembayaran')->move(public_path('/files'),$pembayaran);
            $fileUrl =url('/files/'.$pembayaran);
        }else{
            $pembayaran = null;
        }

        //up pembayaran
        if($request->file('up_pembayaran') !=null){
            $file =$request->file('up_pembayaran');
            $up_pembayaran = time().".".$file->getClientOriginalExtension();
            $path =$request->file('up_pembayaran')->move(public_path('/files'),$up_pembayaran);
            $fileUrl =url('/files/'.$up_pembayaran);
        }else{
            $up_pembayaran = null;
        }
        
        if($Users){
            $Users->nama = $request->nama ? $request->nama : $Users->nama;
            $Users->nim = $request->nim ? $request->nama : $Users->nim;
            $Users->no_telepon = $request->no_telepon ? $request->no_telepon : $Users->no_telepon;
            $Users->email = $request->email ? $request->email : $Users->email;
            $Users->pembayaran = $pembayaran ? $request->pembayaran : $Users->pembayaran;
            $Users->print_nilai = $pembayaran ? $request->pembayaran : $Users->pembayaran;
            $Users->status_pembayaran = $request->status_pembayaran ? $request->status_pembayaran : $Users->status_pembayaran;
            $Users->up_pembayaran = $up_pembayaran ? $request->up_pembayaran : $Users->up_pembayaran;

            $Users->save();
            return response()->json([
                "message" => "Success",
                "data" => $Users
             ]);
        }
        return response()->json([
            "message"=> "user dengan id".$id."not found"
        ], 400);
    }

    function delete(Request $request, $id)
    {
        $Users = Users::findOrFail($id);
        $result = $Users->delete();
        if($result){
            return ['result'=>'Data has been deleted'];
        }      
    }
}
