<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('News',['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("addNews");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $news = new News;
        $news->newsTitle = $request['title'];
        $news->content = $request['content'];
        $news->author = $request['author'];
        if(isset($request['published'])){
            $news->published = true;
        }
        else{
            $news->published = false;
        }
        $news->save();
        return 'news are stored';
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
       $news = News::find($id);        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        News::where('id', $request->id)->update(
            ['title' => $request->newsTitle,'content'=> $request->content ,'author'=>$request->author, 'published'=>$request->published]);
            return $this->index();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
