<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function viewAddCarForm(){
        return view("addCar");
    }

    public function viewCarData(Request $request)
    {
        $formDataArray = $request->input('data_fields');

        return view('car-data', ['formDataArray' => $formDataArray]);
    }
}
