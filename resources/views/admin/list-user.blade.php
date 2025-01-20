@extends('layouts.navbar-dashboard')
@extends('layouts.master-dashboard')
@section('page', 'ListUser')
@section('title-page', 'ListUser')
@section('content-dashboard')
<link rel="stylesheet" href="../css/movie.css">
<div class="row">
  <div class="search-movies-dashboard">
  </div>
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Users List</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name Category</th>
                </tr>
              </thead>
              <tbody >
                <div class="p-2">
                @foreach ($users as $user)         
                <tr style="border-bottom: white;">
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $loop->iteration}}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $user->username }}</p>
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