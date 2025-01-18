<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(){
        return view("admin.dashboard");
    }
    public function movies(){
        $movies = Movie::all();
        return view("admin.movies", compact("movies"));
    }
    public function formMovie(){
        $categories = Category::all();
        return view("admin.form-movie",compact("categories"));
    }
    public function addMovie(Request $request)
{
    $request->validate([
        'category_id' => 'required|integer',
        'title' => 'required|string|max:255',
        'description' => 'required',
        'year' => 'required|string|max:255',
        'director' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'image_background' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $movie = new Movie();
    $movie->user_id = 1; // Set user_id otomatis ke 1
    $movie->category_id = $request->category_id;
    $movie->title = $request->title;
    $movie->description = $request->description;
    $movie->year = $request->year;
    $movie->director = $request->director;

    // Handle image upload
    if ($request->hasFile('image')) {
        $movie->image = $request->file('image')->store('images/movies', 'public');
    }

    if ($request->hasFile('image_background')) {
        $movie->image_background = $request->file('image_background')->store('images/backgrounds', 'public');
    }

    $movie->save();

    return redirect()->back()->with('success', 'Movie added successfully!');
}

public function destroy($id){
    $movie = Movie::find($id);
    try {
        $movie->delete();
        return redirect()->back()->with('success','Movie deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
        
    }
}

public function show($id)
{
    $movie = Movie::with('category')->findOrFail($id);
    return view('admin.detail-movie', compact('movie'));
}

public function editMovie($id){
    $movie = Movie::with('category')->find($id);

    $categories = Category::all();
    return view('admin.editMovie', compact(['movie','categories']));

}
public function updateMovie(Request $request, $id)
{
    // Validasi input dari form
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'title' => 'required|string|max:255',
        'year' => 'required|integer',
        'director' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image_background' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Cari data movie berdasarkan ID
    $movie = Movie::findOrFail($id);

    // Update data movie
    $movie->category_id = $request->category_id;
    $movie->title = $request->title;
    $movie->year = $request->year;
    $movie->director = $request->director;
    $movie->description = $request->description;

    // Cek jika ada gambar yang diupload
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($movie->image) {
            Storage::delete('public/images/movies/' . $movie->image); // Sesuaikan path gambar
        }
        // Simpan gambar baru dan ambil path-nya
        $movie->image = $request->file('image')->store('images/movies', 'public');
    }

    // Cek jika ada background image yang diupload
    if ($request->hasFile('image_background')) {
        // Hapus background image lama jika ada
        if ($movie->image_background) {
            Storage::delete('public/images/backgrounds/' . $movie->image_background); // Sesuaikan path gambar background
        }
        // Simpan background image baru dan ambil path-nya
        $movie->image_background = $request->file('image_background')->store('images/backgrounds', 'public');
    }

    $movie->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('movies.editMovie', $movie->id)->with('success', 'Movie updated successfully.');
}

}
