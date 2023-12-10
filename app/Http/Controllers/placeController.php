<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Traits\Common;

class placeController extends Controller
{
    use Common;
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
        return view("addPlace");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate(['imageTitle'=>'required|string|max:100',
    'image' => 'required|mimes:jpg,jpeg,png', 
    'from' => 'required|numeric|min:5', 'to' => 'required|numeric|max:20000',
    'shortDescription' => 'required|max:200'], $messages);

    $data['image'] = $this->uploadFile($request->image, 'assets/images/upload');        
    Place::create($data);
    $rows = Place::orderBy('id', 'asc')->take(6)->get();
    return view('place', compact("rows"));
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

    public function messages(){
        return ['imageTitle.max' => 'title must be less than 100',
        'imageTitle.required' => 'title field is required',
        'image.required' => 'image field is required',
        'image.mimes' => 'image type must be jpg, jpeg or png',
        'from.numeric' => 'the field must be numeric',
        'from.min' => 'the number must be greater than 5',
        'to.numeric' => 'the field must be numeric',
        'from.max' => 'the number must be less than 20000',
        'shortDescription.max' => 'it must be less than 200 in length'];

    }

    public function place(){
        $rows = Place::orderBy('id', 'asc')->take(6)->get();
        return view('place', compact("rows"));
    }

    public function blog(){
        return view('blog');
    }

    public function blog1(){
        return view('blog1');
    }

  
}
