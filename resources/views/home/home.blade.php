@extends('layouts.master')
@section('title', 'Home')
@section('content')
<link rel="stylesheet" href="../css/home.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <section class="wrap-header">
        <nav class="navbar navbar-expand-lg ">
            <div class="container p-1 pt-4">
              <a class="navbar-brand" href="#">
                <img src="../images/logo.png" alt="">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="link-nav aktif" aria-current="page" href="#">Home</a>
                  <a class="link-nav" aria-current="page" href="#movies">Movies</a>
                  <a class="link-nav" aria-current="page" href="#">About me</a>
                  <a class="link-nav" aria-current="page" href="#">Services</a>
                  @if (auth()->user() && auth()->user()->id === 1)
                  <a class="link-nav dashboard" href="{{ route('dashboard') }}">Dashboard</a>
              @else
                  <a class="link-nav logout" aria-current="page" href="{{ route('logout') }}">Logout</a>
              @endif
              

                </div>
              </div>
            </div>
          </nav>
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-6 mt-5">
      <h1 class="welcome">Welcome to Netflix</h1>
      <p class="welcome-text mb-5">
        Explore a world of endless entertainment with the best movies, series, and originals. 
        Watch anywhere, anytime, just for you!
    </p>
    <div class="btn-container-header">
        <a href="#movies" class="btn-header btn-explore-header me-3">Explore Now</a>
        <a href="#signup" class="btn-header btn-signup-header">Get Started</a>
    </div>
    </div>
    <div class="col-lg-6"></div>
  </div>
</div>

    </section>
    <section class="list-movie pb-5 pt-4" id="movies">
      <div class="search container">
        <div class="input-group">
            <span class="input-group-text">
                <i class="fa fa-search"></i>
            </span>
            <input type="text" id="movie-search" class="form-control" placeholder="Search movies...">
        </div>
    </div>
    
    <div class="container">
      <div class="categories">
          <a href="#" data-category-id="" class="category-link active">All Movies</a>
          @foreach ($categories as $category)
              <a href="#" data-category-id="{{ $category->id }}" class="category-link">{{ $category->name }}</a>
          @endforeach
      </div>
  
      <div class="row g-4" id="movie-container">
          @foreach ($movies as $movie)
              <div class="col-lg-2">
                <a href="{{ route('home.detailMovie' , $movie->id) }}" class="link-movie">

                  <div class="movie-card">
                    <img src="{{ asset('storage/' . $movie->image) }}" alt="{{ $movie->title }}" class="movie-image">
                    <h5 class="movie-title mt-4">{{ $movie->title }}</h5>
                    <p class="year">{{ $movie->year }}</p>
                  </div>
                </a>
              </div>
          @endforeach
      </div>
  </div>
  
    
    
    </section>
    <section class="about-me">

    </section>

    <section class="footer">
      <div class="footer-container">
        <!-- Logo Column -->
        <div class="footer-col logo-col">
          <img src="../images/logo.png" alt="Movie Site Logo" class="footer-logo">
          <p class="tagline">Your Ultimate Movie Destination</p>
          <div class="social-links">
            <a href="#" class="social-link">Facebook</a>
            <a href="#" class="social-link">Twitter</a>
            <a href="#" class="social-link">Instagram</a>
          </div>
        </div>
        
        <!-- Quick Links Column -->
        <div class="footer-col">
          <h3>Quick Links</h3>
          <ul>
            <li><a href="#">Now Playing</a></li>
            <li><a href="#">Coming Soon</a></li>
            <li><a href="#">Top Rated</a></li>
            <li><a href="#">Buy Tickets</a></li>
          </ul>
        </div>
        
        <!-- Contact Column -->
        <div class="footer-col">
          <h3>Contact Us</h3>
          <ul >
            <li>Email: info@moviesite.com</li>
            <li>Phone: (123) 456-7890</li>
            <li>Address: Movie Street 123</li>
          </ul>
        </div>
      </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Klik kategori
            $('.category-link').click(function (e) {
                e.preventDefault(); // Mencegah refresh halaman
                const categoryId = $(this).data('category-id'); // Ambil ID kategori
    
                // Update styling aktif
                $('.category-link').removeClass('active');
                $(this).addClass('active');
    
                // AJAX request
                $.ajax({
                    url: "{{ route('home.filter') }}",
                    type: "GET",
                    data: { category_id: categoryId },
                    success: function (response) {
                        // Kosongkan container film
                        $('#movie-container').empty();
    
                        // Periksa apakah ada film
                        if (response.length === 0) {
                            $('#movie-container').append('<p style="color:white;"">No movies found for this category.</p>');
                        } else {
                            // Tambahkan setiap film ke container
                            response.forEach(movie => {
                                $('#movie-container').append(`
                                    <div class="col-lg-2">
                                        <div class="movie-card">
                                            <img src="/storage/${movie.image}" alt="${movie.title}" class="movie-image">
                                            <h5 class="movie-title mt-4">${movie.title}</h5>
                                            <p class="year">${movie.year}</p>
                                        </div>
                                    </div>
                                `);
                            });
                        }
                    },
                    error: function () {
                        alert('Error fetching movies. Please try again.');
                    }
                });
            });
        });

        $(document).ready(function () {
    // Variabel untuk menyimpan kategori yang dipilih
    let selectedCategoryId = null;

    // Klik kategori untuk filter
    $('.category-link').click(function (e) {
        e.preventDefault(); // Mencegah refresh halaman
        const categoryId = $(this).data('category-id'); // Ambil ID kategori
        
        // Update kategori yang dipilih
        selectedCategoryId = categoryId;

        // Update styling kategori aktif
        $('.category-link').removeClass('active');
        $(this).addClass('active');
        
        // Panggil pencarian dengan kategori yang terpilih
        searchMovies();
    });

    // Tangkap event input pada search box
    $('#movie-search').on('input', function () {
        // Panggil pencarian setiap kali ada perubahan input
        searchMovies();
    });

    // Fungsi untuk mengirim request AJAX
    function searchMovies() {
        const query = $('#movie-search').val(); // Ambil nilai dari input search
        
        // AJAX request untuk filter berdasarkan kategori dan query pencarian
        $.ajax({
            url: "{{ route('home.search') }}",
            type: "GET",
            data: { 
                query: query,
                category_id: selectedCategoryId // Kirim kategori yang dipilih
            },
            success: function (response) {
                // Kosongkan container film
                $('#movie-container').empty();

                // Periksa apakah ada film
                if (response.length === 0) {
                    $('#movie-container').append('<p style="color:white;">No movies found.</p>');
                } else {
                    // Tambahkan setiap film ke container
                    response.forEach(movie => {
                        const detailRoute = "{{ route('home.detailMovie', ':id') }}".replace(':id', movie.id); // Buat rute detail

                        $('#movie-container').append(`
                            <div class="col-lg-2">
                                <div class="movie-card">
                                    <a href="${detailRoute}">
                                        <img src="/storage/${movie.image}" alt="${movie.title}" class="movie-image">
                                        <h5 class="movie-title mt-4">${movie.title}</h5>
                                        <p class="year">${movie.year}</p>
                                    </a>
                                </div>
                            </div>
                        `);
                    });
                }
            },
            error: function () {
                alert('Error fetching movies. Please try again.');
            }
        });
    }
});


        </script>

    
@endsection

