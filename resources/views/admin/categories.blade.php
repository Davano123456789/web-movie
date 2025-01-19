@extends('layouts.navbar-dashboard')
@extends('layouts.master-dashboard')
@section('page', 'Categories')
@section('title-page', 'Categories')
@section('content-dashboard')
<link rel="stylesheet" href="../css/movie.css">
<div class="row">
  <div class="search-movies-dashboard">
    <form action="{{ route('categories') }}" method="GET" class="search-form">
      <div class="input-container">
        <i class="fas fa-search"></i>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search movies..." />
      </div>
    </form>
  </div>
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Categories List</h6>
          <div style="text-align: right">
            <a href="{{ route('categories.add') }}" class="btn btn-sm btn-success">
                <i class="fas fa-plus me-1"></i> Add Category
            </a>
            
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name Category</th>
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
                @foreach ($categories as $category)         
                <tr style="border-bottom: white;">
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $category->name }}</p>
                    </td>
 
                    <td class="align-middle text-center">
                      <a href="{{ route('movies.editMovie', $category->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit Category">
                        Edit
                    </a>
                    
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Are you sure you want to delete this movie?')">
                                Delete
                            </button>
                        </form>
                        <a href="{{ route('category.detail', $category->id) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="View Details">
                            Detail
                        </a>
                        
                    </td>
                </tr>
                @endforeach
           

              </tbody>
            </table>
            <div class="d-flex justify-content-between align-items-center mt-4 ms-4">
              <!-- Pagination -->
              <nav aria-label="Page navigation example">
                  {{ $categories->links('pagination::bootstrap-5') }}
              </nav>
          </div>
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