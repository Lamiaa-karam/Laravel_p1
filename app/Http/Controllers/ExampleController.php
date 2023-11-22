<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function test1(){
        return view("login");
    }

    public function viewAddCarForm(){
        return view("addCar");
    }

    public function viewCarData(Request $request)
    {
        $formDataArray = $request->input('data_fields');

        return view('car-data', ['formDataArray' => $formDataArray]);
    }
}
