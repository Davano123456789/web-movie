@extends('layouts.navbar-dashboard')
@extends('layouts.master-dashboard')
@section('page', 'Add Category')
@section('title-page', 'Add Category')
@section('content-dashboard')
<link rel="stylesheet" href="../css/movie.css">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <p class="mb-0">Add Movie</p>
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
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="row">                
                        <!-- Title -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name" class="form-control-label">name</label>
                                <input id="name" name="name" class="form-control" type="text" placeholder="Enter movie name">
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-25">Save</button>
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