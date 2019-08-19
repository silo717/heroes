<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Powers;
use Validator;


class PowersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Powers::all();
        return $this->sendResponse($data->toArray(), 'Powers successfully retrieved');
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
            'powers' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $powers = Powers::create($input);
        return $this->sendResponse($powers->toArray(), 'Power successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $power = Powers::find($id);
        if (is_null($power)) {
            return $this->sendError('Power not found.');
        }

        return $this->sendResponse($power->toArray(), 'Power successfully retrieved');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Powers $power)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'powers' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $power->powers = $input['powers'];
        $power->save();

        return $this->sendResponse($power->toArray(), 'Power successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Powers $power)
    {
        $power->delete();
  
        return $this->sendResponse($power->toArray(), 'Power successfully deleted.');
    }
}
