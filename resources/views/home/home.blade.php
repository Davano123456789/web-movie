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
                  <a class="link-nav" aria-current="page" href="#">Movies</a>
                  <a class="link-nav" aria-current="page" href="#">About me</a>
                  <a class="link-nav" aria-current="page" href="#">Services</a>

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
    <section class="list-movie pb-5">
      <div class="container">
        <div class="categories">
          <a href="#" class="active">All Movie</a>
          <a href="#">Adventure</a>
          <a href="#">Animation</a>
          <a href="#">Biography</a>
          <a href="#">Crime</a>
          <a href="#">Comedy</a>
          <a href="#">Documentary</a>
          <a href="#">Drama</a>
          <a href="#">Family</a>
          <a href="#">Fantasy</a>
          <a href="#">History</a>
          <a href="#">Horror</a>
        </div>
        <div class="row g-4">
          <!-- Movie 1 -->
          <div class="col-lg-2 ">
            <div class="movie-card">
              <img src="../images/poster1.jpg" alt="Movie 1" class="movie-image">
              <h5 class="movie-title mt-4">Movie Title 1</h5>
              <p class="year">2015</p>
            </div>
          </div>
          
          <!-- Movie 2 -->
          <div class="col-lg-2 ">
            <div class="movie-card">
              <img src="../images/poster2.jpg" alt="Movie 2" class="movie-image">
              <h5 class="movie-title mt-4">Movie Title 2</h5>
              <p class="year">2015</p>
            </div>
          </div>
          
          <!-- Movie 3 -->
          <div class="col-lg-2 ">
            <div class="movie-card">
              <img src="../images/poster2.jpg" alt="Movie 3" class="movie-image">
              <h5 class="movie-title mt-4">Movie Title 3</h5>
              <p class="year">2015</p>
            </div>
          </div>
          
          <!-- Movie 4 -->
          <div class="col-lg-2 ">
            <div class="movie-card">
              <img src="../images/poster3.jpg" alt="Movie 4" class="movie-image">
              <h5 class="movie-title mt-4">Movie Title 4</h5>
              <p class="year">2015</p>
            </div>
          </div>
          
          <!-- Movie 5 -->
          <div class="col-lg-2 ">
            <div class="movie-card">
              <img src="../images/poster2.jpg" alt="Movie 5" class="movie-image">
              <h5 class="movie-title mt-4">Movie Title 5</h5>
              <p class="year">2015</p>
            </div>
          </div>
          
          <!-- Movie 6 -->
          <div class="col-lg-2 ">
            <div class="movie-card">
              <img src="../images/poster2.jpg" alt="Movie 6" class="movie-image">
              <h5 class="movie-title mt-4">Movie Title 6</h5>
              <p class="year">2015</p>
            </div>
          </div>
          <div class="col-lg-2  ">
            <div class="movie-card">
              <img src="../images/poster2.jpg" alt="Movie 6" class="movie-image">
              <h5 class="movie-title mt-4">Movie Title 6</h5>
              <p class="year">2015</p>
            </div>
          </div>
          <div class="col-lg-2  ">
            <div class="movie-card">
              <img src="../images/poster2.jpg" alt="Movie 6" class="movie-image">
              <h5 class="movie-title mt-4">Movie Title 6</h5>
              <p class="year">2015</p>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="movie-card">
              <img src="../images/poster2.jpg" alt="Movie 6" class="movie-image">
              <h5 class="movie-title mt-4">Movie Title 6</h5>
              <p class="year">2015</p>
            </div>
          </div>
          <div class="col-lg-2  ">
            <div class="movie-card">
              <img src="../images/poster2.jpg" alt="Movie 6" class="movie-image">
              <h5 class="movie-title mt-4">Movie Title 6</h5>
              <p class="year">2015</p>
            </div>
          </div>
        </div>
      </div>
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
          <ul>
            <li>Email: info@moviesite.com</li>
            <li>Phone: (123) 456-7890</li>
            <li>Address: Movie Street 123</li>
          </ul>
        </div>
      </div>
    </section>
  
@endsection

