@extends('layouts.master')
@section('title', 'Detail Movie')
@section('content')
<link rel="stylesheet" href="../css/home.css">
    <section class="movie-detail">
        <div class="background-blur" style="background-image: url('{{  asset('storage/' . $movie->image_background)  }}')"></div>
        <a href="{{ route('home.index') }}" class="back">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div class="content container">
            <div class="poster">
                <img src=" {{ asset('storage/' . $movie->image) }}" alt="Alice Through the Looking Glass">
            </div>
            <div class="info">
                <h1 class="title">{{ $movie->title }}</h1>
                <div class="meta">
                    <span class="year">{{ $movie->year }}</span>
                    <div class="category">
                        <span class="category ">{{ $movie->category->name }}</span>
                       
                    </div>
                </div>
                <p class="description">
                    {{ $movie->description }}
                </p>
                <div class="buttons">
                    <button class="btn btn-trailer">Watch trailer</button>
                    <button class="btn btn-watch">Watch now</button>
                </div>
            </div>
        </div>
    </section>

@endsection