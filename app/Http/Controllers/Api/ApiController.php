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

class ApiController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function company()
    {
        $company = Company::first();
        return new CompanyResource($company);
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
}
