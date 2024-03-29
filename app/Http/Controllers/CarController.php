<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Traits\Common;
use App\Models\ModelName;

class CarController extends Controller
{
    use Common;
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
        $categories = Category::select('id', 'categoryName')->get();
        return view("addCar", compact('categories'));
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
        $messages = $this->messages();
        $data = $request->validate(['carTitle' => 'required|string|max:50',
        'description' => 'required|string|max:100', 'price' => 'required','category_id' => 'required',
        'image' => 'required|mimes:png,jpg,jpeg|max:7000'], $messages);

        $data['image'] = $this->uploadFile($request->image, 'assets/images/upload');        
        $data['published'] = isset($request['published']);
        Car::create($data);
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
        $categories = Category::select('id', 'categoryName')->get();
        return view('updateCar', compact('car', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        // $car = $request->only($this->columns);
        $messages = $this->messages();

        $data = $request->validate(['carTitle' => 'required|string|max:50',
        'price' => 'required',
        'category_id' => 'required',
        'description' => 'required|string|max:100',
        'image' => 'sometimes|mimes:png,jpg,jpeg|max:7000'], $messages);

        if($request->hasFile('image')) {
            $data['image'] = $request['image'];
        }

        // if(isset($request->image))
        //     $data['image'] = $this->uploadFile($request->image, 'assets/images');        
        
        // else{
        //     $car = Car::findorfail($id);
        //     $data['image'] = $car['image'];}

        $data['published'] = isset($request['published']);
        Car::where('id', $id)->update($data);
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

    public function messages(){
        $messages = ['carTitle.required' => __('messages.carTitle.required'),
        'carTitle.string' => __('messages.carTitle.string'),
        'carTitle.max' => __('messages.carTitle.max'),
        'description.required' => __('messages.description.required'),
        'description.string' => __('messages.description.string'),
        'description.discription' => __('messages.description.discription'),
        'category_id.required' => __('messages.category_id.required'),
        'image.mimes'=> __('messages.image.mimes')];
        return $messages;
    }
}
