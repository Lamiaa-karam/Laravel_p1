<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("addCar");
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store()
    // {
    //     $cars = new Car;
    //     $cars->carTitle = "BMW";
    //     $cars->description = "the discreption";
    //     $cars->published = true;
    //     $cars->save();
    //     return 'data is saved';
    // }

    public function store(Request $request)
    {
        $cars = new Car;
        $cars = new Car;
        $cars->carTitle = $request['title'];
        $cars->description = $request['description'];
       if(isset($request['published'])){
        $cars->published = true;
       }
       else{
        $cars->published = false;
       }
        $cars->save();
        return "data is saved".  $request['published'];

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}