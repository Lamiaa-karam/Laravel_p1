<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Common;

class ExampleController extends Controller
{
    use Common;
    public function test1(){
        return view("login");
    }

    public function showupload(){
        return view("upload");
    }

    // public function uploadImage(Request $request){
    //     $image_extension = $request->img->getClientOriginalExtension();
    //     $image_name = time(). '.' .$image_extension;
    //     $path = 'assets/images';
    //     $request->img->move($path, $image_name);
    //     return 'uploaded';
    // }

    public function uploadImage(Request $request){
        $filename = $this->uploadFile($request->img, 'assets/images');
        return $filename;

    }
    public function upload(Request $request){
        return dd($request);
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
