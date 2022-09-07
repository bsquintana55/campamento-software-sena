<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Http\Resources\CourseResource;
use App\Http\Resources\CourseCollection;
use App\Http\Controllers\BaseController;

class CourseController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $curso= new Courses();
        $curso->bootcamp_id =$id;
        $curso->title = $request->title;
        $curso->description =$request->description;
        $curso->weeks =$request->weeks;
        $curso->enroll_cost =$request->enroll_cost;
        $curso->minimum_skill =$request->minimum_skill;
        $curso->save();


     //  $curso->bootcamp::create($request->all());

        return response()->json([
                "sucess" => true,
                "data" => $curso
        ], 200);

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
            $curso=Courses::find($id);
            if(!$curso){
                return  $this->sendError( "CURSO NO ENCONTRADO, EL ID $id no se encuentra", 400);
            }
            return $this->sendResponse(new CourseResource($curso));

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
