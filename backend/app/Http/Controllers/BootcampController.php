<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;
use App\Http\Requests\StoreBootcampRequest;
use App\Http\Resources\BootcampResource;
use App\Http\Resources\BootcampCollection;
use App\Http\Controllers\BaseController;



class BootcampController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //metodos json
      //parametros: 1. data a enviar al client
      //2. codigo de status
       /* return response()->json(  
        new BootcampCollection(Bootcamp::all()),
        200);*/
        try {
            return  $this->sendResponse( new BootcampCollection(Bootcamp::all()));
        } catch (\Exception $e) {
            return  $this->sendError("serve error", 500);
        }

    }
   // []

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    public function store(StoreBootcampRequest $request)
    {
        
    try {
        return $this ->sendResponse( new BootcampResource(
                                    Bootcamp::create($request->all()))
                                    , 200);  
    } catch (\Exception $e) {
        return  $this->sendError("serve error", 500);
    }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $bootcamp=Bootcamp::find($id);
            if(!$bootcamp){
                return  $this->sendError( "BOOTCAMP NO ENCONTRADO, EL ID $id no se encuentra", 400);
            }
            return $this->sendResponse(new bootcampResource($bootcamp));

        } catch (\Exception $e) {
            return  $this->sendError("serve error", 500);
        }
       
    }       

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
       //1. localizar  el bootcamp con id
       
        try {
            $b = Bootcamp::find($id);

            if(!$b){
             return  $this->sendError( "BOOTCAMP NO ENCONTRADO, EL ID $id no se encuentra", 400);
         }
             // actualizar
             $b->update($request->all());
             return $this->sendResponse(new bootcampResource($b));
     
        } catch (\Exception $e) {
            return  $this->sendError("serve error", 500);
        }
        
    }


    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $b=Bootcamp::find($id);
            if(!$b){
                return  $this->sendError( "BOOTCAMP NO ENCONTRADO, EL ID $id no se encuentra", 400);
            }
            $b->delete();
            return $this->sendResponse(new bootcampResource($b));
            
        } catch (\Exception $e) {
            return  $this->sendError("serve error", 500);
        }


        
    }
}
