<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CompanyResource;
use App\Models\Article;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function trending_articles()
    {
        $articles = Article::orderBy('views', 'desc')->where('status', 'show')->take(5)->get();
        return ArticleResource::collection($articles);
    }

    public function latest_articles()
    {
        $articles = Article::latest()->take(3)->get();
        return ArticleResource::collection($articles);
    }

    public function category_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title" => "required|max:50",
            "slug" => "required|max:50",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $category = new Category();
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->save();

        return response()->json([
            'success' => true,
            'message' => 'Category added successfully'
        ]);
    }
}
