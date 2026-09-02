<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        $response = Http::withoutVerifying()->withToken(env('TMDB_TOKEN'))->get('https://api.themoviedb.org/3/movie/popular');

        $movies = $response->json('results');

        return view('index', compact('movies'));
    }
    
    public function show($id)
    {
        $response = Http::withoutVerifying()
        ->withToken(env('TMDB_TOKEN'))
        ->get("https://api.themoviedb.org/3/movie/{$id}");

        if ($response->failed()) {
            abort(404, 'Film tidak ditemukan');
        }

        $movie = $response->json();

        return view('detail', compact('movie'));

    }
}
