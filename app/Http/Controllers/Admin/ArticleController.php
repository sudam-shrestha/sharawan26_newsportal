<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|max:255",
            "slug" => "required|max:255",
            "content" => "required",
            "categories" => "required",
            "image" => "required|mimes:jpg,png,jpeg,avif|max:1024"
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->content = $request->content;
        $article->meta_keywords = $request->meta_keywords;
        $article->meta_description = $request->meta_description;
        $file = $request->image;
        if ($file) {
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $file_name);
            $article->image = "images/$file_name";
        }
        $article->save();

        $article->categories()->attach($request->categories);

        toast('Article Created Successfully', 'success');
        return redirect()->route('admin.article.create');
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
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('admin.article.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title" => "required|max:255",
            "slug" => "required|max:255",
            "content" => "required",
            "categories" => "required",
            "image" => "nullable|mimes:jpg,png,jpeg,avif|max:1024"
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->content = $request->content;
        $article->meta_keywords = $request->meta_keywords;
        $article->meta_description = $request->meta_description;
        $file = $request->image;
        if ($file) {
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $file_name);
            $article->image = "images/$file_name";
        }
        $article->save();

        $article->categories()->sync($request->categories);

        toast('Article Updated Successfully', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
