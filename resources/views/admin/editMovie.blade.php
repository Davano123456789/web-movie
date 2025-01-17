@extends('layouts.navbar-dashboard')
@extends('layouts.master-dashboard')

@section('page', 'Edit Movie')
@section('title-page', 'Edit Movie')
@section('content-dashboard')
<link rel="stylesheet" href="../css/movie.css">
<style>
    .alert-success {
    background-color: #e9f7ef;
    border: 1px solid #28a745;
    color: #fafffb;
}

</style>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <p class="mb-0">Edit Movie</p>
                </div>
            </div>

            <!-- Pesan Sukses -->
            <div class="p-2">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <!-- Pesan Error -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Please fix the following issues:
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="card-body">
                <form action="{{ route('movies.updateMovie', $movie->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Category -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="category" class="form-control-label">Category</label>
                                <select id="category" name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $movie->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                
                        <!-- Title -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="title" class="form-control-label">Title</label>
                                <input id="title" name="title" class="form-control" type="text" value="{{ $movie->title }}" placeholder="Enter movie title">
                            </div>
                        </div>
                
                        <!-- Year -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="year" class="form-control-label">Year</label>
                                <input id="year" name="year" class="form-control" type="text" value="{{ $movie->year }}" placeholder="Enter movie year">
                            </div>
                        </div>
                
                        <!-- Director -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="director" class="form-control-label">Director</label>
                                <input id="director" name="director" class="form-control" type="text" value="{{ $movie->director }}" placeholder="Enter movie director">
                            </div>
                        </div>
                
                       <!-- Image -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="image" class="form-control-label">Image</label>
                            <input id="image" name="image" class="form-control" type="file" accept="image/*">
                        </div>
                        {{-- Jika ada gambar sebelumnya --}}
                        <ul>
                            <li>
                                Gambar Sebelumnya
                            </li>
             
                                @if(isset($movie) && $movie->image)
                                    <img src="{{ asset('storage/' . $movie->image) }}" alt="Previous Image" width="100px">
                                @endif
                        </ul>
                    </div>

                    <!-- Image Background -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="image_background" class="form-control-label">Image Background</label>
                            <input id="image_background" name="image_background" class="form-control" type="file" accept="image/*">
                        </div>
                        {{-- Jika ada gambar background sebelumnya --}}
                        <ul>
                            <li>Gambar Sebelumnya</li>
                        </ul>
                        @if(isset($movie) && $movie->image_background)
                            <img src="{{ asset('storage/' . $movie->image_background) }}" alt="Previous Background Image" width="150px">
                        @endif
                    </div>
                        <!-- Description -->
                        <div class="col-12">
                            <div class="form-group">
                                <label for="description" class="form-control-label">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter movie description">{{ $movie->description }}</textarea>
                            </div>
                        </div>
                
                        <!-- Submit Button -->
                        <div class="col-12">
                            <a href="{{ route('movies') }}" class="btn btn-danger">Back to Movies</a>
                            <button type="submit" class="btn btn-primary w-25">Update</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

<script>
    // Hilangkan alert setelah 5 detik
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => alert.remove());
    }, 5000); // 5000 ms = 5 detik
</script>

@endsection
