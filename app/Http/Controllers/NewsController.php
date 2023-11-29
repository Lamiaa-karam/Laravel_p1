<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $columns=['newsTitle', 'content', 'author'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::get();
        return view('news',compact('news'));
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
        News::create($request->only($this->columns));
        return redirect('news');
        // $news = new News;
        // $news->newsTitle = $request['title'];
        // $news->content = $request['content'];
        // $news->author = $request['author'];
        // if(isset($request['published'])){
        //     $news->published = true;
        // }
        // else{
        //     $news->published = false;
        // }
        // $news->save();
        // return 'news are stored';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findorfail($id);
        return view('showNews', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $news = News::findorfail($id); 
       return view('updateNews', compact('news'));       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = $request->only($this->columns);
        $news['published'] = isset($news['published'])?true:false;
        News::where('id', $id)->update($news);
        return redirect('news');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
