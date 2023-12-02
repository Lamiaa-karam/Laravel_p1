<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    private $columns=['carTitle', 'description', 'published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view("cars", compact("cars"));
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

    public function store(Request $request):RedirectResponse
    {
        $request->validate(['carTitle' => 'required|string|max:50',
        'description' => 'required|string|max:100']);
        
        $car = $request->only($this->columns);
        $car['published'] = isset($car['published'])?true:false;
        Car::create($car);
        return redirect('cars');
        
    //     $cars = new Car;
    //     $cars = new Car;
    //     $cars->carTitle = $request['title'];
    //     $cars->description = $request['description'];
    //    if(isset($request['published'])){
    //     $cars->published = true;
    //    }
    //    else{
    //     $cars->published = false;
    //    }
    //     $cars->save();
    //     return "data is saved".  $request['published'];

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findorfail($id);
        return view('showCar', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findorfail($id);
        return view('updateCar', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        $car = $request->only($this->columns);
        $car['published'] = isset($car['published'])?true:false;
        Car::where('id', $id)->update($car);
        return redirect('cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    { 
        Car::where('id', $id)->forceDelete();
        return redirect('trashedCars'); 
    }

    public function trashed()
    {
        $cars = Car::onlyTrashed()->get();
        return view('trashedCars', compact('cars'));
    }

    public function restore(string $id):RedirectResponse
    {
        Car::where('id', $id)->restore();
        return redirect('cars');        
    }

    public function delete(string $id):RedirectResponse
    {
        Car::where('id', $id)->delete();
        return redirect('cars');
    }
}
