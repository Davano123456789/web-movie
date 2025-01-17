@extends('layouts.navbar-dashboard')
@extends('layouts.master-dashboard')
@section('page', 'Movies')
@section('title-page', 'Movies')
@section('content-dashboard')
<link rel="stylesheet" href="../css/movie.css">
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Movies List</h6>
          <div style="text-align: right">
            <a href="{{ route('movies.add') }}" class="btn btn-sm btn-success">
                <i class="fas fa-plus me-1"></i> Add Movie
            </a>
            
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">	Description</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Year</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Director</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>

                </tr>
              </thead>
              <tbody >
                <div class="p-2">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                @foreach ($movies as $movie)         
                <tr style="border-bottom: white;">
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $movie->title }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{ Str::words($movie->description, 5, '...') }}</p>
                    </td>
                    
                    <td class="align-middle text-center text-sm">
                        {{ $movie->year }}
                    </td>
                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $movie->director }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <a href="{{ route('movies.editMovie', $movie->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit Movie">
                        Edit
                    </a>
                    
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Are you sure you want to delete this movie?')">
                                Delete
                            </button>
                        </form>
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="View Details">
                            Detail
                        </a>
                        
                    </td>
                </tr>
                @endforeach
           

              </tbody>
            </table>
          </div>
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