<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // private $columns=['newsTitle', 'content', 'author'];
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
        $messages = ['newsTitle.required' => 'title field is required',
        'newsTitle.string' => 'title must be a string',
         'newsTitle.max' => 'title must be less than 50 in length',
         'content.required' => 'content field is required',
        'content.string' => 'content must be a string',
         'content.max' => 'content must be less than 200 in length',
         'author.required' => 'author field is required',
        'author.string' => 'author must be a string'      
    ];
        $data = $request->validate(['newsTitle' => 'required|string|max:50', 'content' => 'required|string|max:200',
        'author' => 'required|string'], $messages);
        $data['published'] = isset($request['published']);
        News::create($data);
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
