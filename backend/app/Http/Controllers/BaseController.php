<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    // responsive exitosas
    public function sendResponse($data, $http_status=200){
        //1. contruir la respuesta
        $respuesta =[
            "success" => true,
            "data" => $data
            
        ];

        //2. enviar responsive afirmativa al cliente

        return response()->json($respuesta,$http_status);

    //respondive fallidas

    }

    public function sendError($errors, $http_status=404){

        //respuesta
        $respuesta=[
            "success"=>false,
            "errors"=> $errors
                    
        ];


        return response()->json($respuesta, $http_status);
    }


}
