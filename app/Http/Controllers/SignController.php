<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sign;

class SignController extends Controller
{
    function get()
    {
        $data = Sign::all();

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
            'password'=> 'required'
        ]);
        $Sign = new Sign; 
        $Sign->nama = $request->nama;
        $Sign->password = $request->password;

        $Sign->save();
        return response()->json(
            [
                "message" => "Success",
                "data" => $Sign
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
