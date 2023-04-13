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

    function put(Request $request, $id)
    {
        $Sign = Sign::where('id', $id)->first();
        if($Sign){
            $Sign->nama = $request->nama ? $request->nama : $Sign->nama;
            $Sign->password = $request->password ? $request->pasword : $Sign->password;
            
            $Sign->save();
            return response()->json([
                "message"=> "PUT Method Success",
                "data" => $Sign
            ]);
        }
        return response()->json([
            "message"=> "user dengan id".$id."not found"
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
