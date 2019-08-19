<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Address;
use Validator;


class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Address::all();
        return $this->sendResponse($data->toArray(), 'Address successfully retrieved');
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
            'address' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $Address = Address::create($input);
        return $this->sendResponse($Address->toArray(), 'address successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = Address::find($id);
        if (is_null($address)) {
            return $this->sendError('address not found.');
        }

        return $this->sendResponse($address->toArray(), 'address successfully retrieved');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'address' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $address->address = $input['address'];
        $address->city = $input['city'];
        $address->country = $input['country'];
        $address->save();

        return $this->sendResponse($address->toArray(), 'address successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
  
        return $this->sendResponse($address->toArray(), 'address successfully deleted.');
    }
}
