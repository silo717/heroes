<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Heroes;
use Validator;


class HeroesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Heroes::all();
        return $this->sendResponse($data->toArray(), 'Heroes retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'fullname' => 'required',
            'gender' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $heroes = Heroes::create($input);
        return $this->sendResponse($heroes->toArray(), 'Your Hero successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hero = Heroes::find($id);
        if (is_null($hero)) {
            return $this->sendError('Your Hero not found.');
        }

        return $this->sendResponse($hero->toArray(), 'Hero retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Heroes $hero)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'fullname' => 'required',
            'gender' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $hero->fullname = $input['fullname'];
        $hero->gender = $input['gender'];
        $hero->save();

        return $this->sendResponse($hero->toArray(), 'Your Hero sucessfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Heroes $hero)
    {
        $hero->delete();
  
        return $this->sendResponse($hero->toArray(), 'Your Hero successfully deleted');
    }
}
