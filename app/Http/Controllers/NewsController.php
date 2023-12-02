<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $columns=['newsTitle', 'content', 'author', 'published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::get();
        // return print_r($news);
        return view("news", compact("news"));
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
        $request->validate(['newsTitle' => 'required|string|max:50', 'content' => 'required|string|max:200',
        'author' => 'required|string']);
        $news = $request->only($this->columns);
        $news['published'] = isset($news['published'])?true:false;
        News::create($news);
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
    public function update(Request $request, string $id):RedirectResponse
    {
        $news = $request->only($this->columns);
        $news['published'] = isset($news['published'])?true:false;
        News::where('id', $id)->update($news);
        return redirect('news');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id): RedirectResponse
    {
        News::where('id', $id)->delete();
        return redirect('news');
    }

    public function trashed()
    {
        $news = News::onlyTrashed()->get();
        return view('trashedNews', compact('news'));
    }

    public function restore(string $id): RedirectResponse
    {
        News::where('id', $id)->restore();
        return redirect('news');
    }

    public function destroy(string $id): RedirectResponse
    {
        News::where('id', $id)->forceDelete();
        return redirect('trashedNews');
    }
}
