@extends('layouts.navbar-dashboard')
@extends('layouts.master-dashboard')
@section('page', 'Movie Details')
@section('title-page', 'Movie Details')
@section('content-dashboard')
<link rel="stylesheet" href="../css/movie.css">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <p class="mb-0">Movie Details</p>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <!-- Category -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="category" class="form-control-label">Category</label>
                            <select id="category" name="category_id" class="form-control" disabled>
                                <option value="{{ $movie->category_id }}" selected>{{ $movie->category->name }}</option>
                            </select>
                        </div>
                    </div>

                    <!-- Title -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="title" class="form-control-label">Title</label>
                            <input id="title" name="title" class="form-control" type="text" value="{{ $movie->title }}" disabled>
                        </div>
                    </div>

                    <!-- Year -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="year" class="form-control-label">Year</label>
                            <input id="year" name="year" class="form-control" type="text" value="{{ $movie->year }}" disabled>
                        </div>
                    </div>

                    <!-- Director -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="director" class="form-control-label">Director</label>
                            <input id="director" name="director" class="form-control" type="text" value="{{ $movie->director }}" disabled>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="3" disabled>{{ $movie->description }}</textarea>
                        </div>
                    </div>
                    <!-- Image -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="image" class="form-control-label">Image</label>
                            <div>
                                <img src="{{ asset('storage/' . $movie->image) }}" alt="Movie Poster" class="img-fluid rounded" width="30%">
                            </div>
                        </div>
                    </div>

                    <!-- Image Background -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="image_background" class="form-control-label">Image Background</label>
                            <div>
                                <img src="{{ asset('storage/' . $movie->image_background) }}" alt="Movie Poster" class="img-fluid rounded" width="50%">
                            </div>
                        </div>
                    </div>


                    <!-- Back Button -->
                    <div class="col-12">
                        <a href="{{ route('movies') }}" class="btn btn-secondary w-25">Back to Movies</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
