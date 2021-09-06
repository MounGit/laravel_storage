<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view('pages.articles.articles', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.articles.articlesCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "date" => "required",
            "author" => "required",
            "url" => "required",
        ]);
        $article = new Article;
        $article->url = $request->file('url')->hashName();
        $article->name = $request->name;
        $article->description = $request->description;
        $article->date = $request->date;
        $article->author = $request->author;
        $request->file('url')->storePublicly('img', 'public');
        $article->save();
        return redirect()->route('articles.index')->with('message', 'The success message!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('pages.articles.articlesShow', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('pages.articles.articlesEdit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "date" => "required",
            "author" => "required",
            "url" => "required",
        ]);
        Storage::disk('public')->delete(('img/' . $article->url));
        $article->name = $request->nom;
        $article->description = $request->description;
        $article->date = $request->date;
        $article->author = $request->author;
        $article->url = $request->file('url')->hashName();
        $article->save();
        return redirect()->route('articles.index')->with('message', 'The success message!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Storage::disk('public')->delete(('img/' . $article->url));
        $article->delete();
        return redirect()->route('articles.index');
    }
}
