<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $movies = Movie::all();

        
        return view("home.home",compact(["categories","movies"]));
    }
    public function filterMovies(Request $request)
{
    $categoryId = $request->input('category_id');

    // Filter movies berdasarkan kategori
    $movies = $categoryId 
        ? Movie::where('category_id', $categoryId)->get() 
        : Movie::all();

    return response()->json($movies);
}
public function searchMovies(Request $request)
{
    $query = $request->input('query');
    $categoryId = $request->input('category_id');

    // Query untuk mencari film berdasarkan kategori dan judul
    $movies = Movie::query();

    if ($categoryId) {
        $movies->where('category_id', $categoryId);
    }

    if ($query) {
        $movies->where('title', 'like', '%' . $query . '%');
    }

    // Ambil hasil pencarian
    $movies = $movies->get();

    return response()->json($movies);
}


}
