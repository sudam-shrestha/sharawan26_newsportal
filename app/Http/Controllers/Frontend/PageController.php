<?php

namespace App\Http\Controllers\Frontend;

use Anuzpandey\LaravelNepaliDate\LaravelNepaliDate;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{

    public function __construct()
    {
        $company = Company::first();
        $categories = Category::all();
        View::share([
            'company' => $company,
            'categories' => $categories
        ]);
    }

    public function home()
    {
        $latest_article = Article::latest()->first();
        $latest_articles = Article::latest()->skip(1)->take(2)->get();
        $trending_articles = Article::orderBy('views', 'desc')->take(5)->get();
        return view('frontend.home', compact('latest_article', 'latest_articles', 'trending_articles'));
    }

    public function welcome()
    {
        return view('welcome');
    }
}
