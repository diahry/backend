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
        $Users = new Users; 
        $Users->nama = $request->nama;
        $Users->nim = $request->nim;
        $Users->no_telepon = $request->no_telepon;
        $Users->email = $request->email;
        $Users->pembayaran = $request->pembayaran;
        $Users->print_nilai = $request->print_nilai;
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
