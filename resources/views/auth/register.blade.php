@extends('layouts.master')
@section('title', 'Register')

@section('content')
<link rel="stylesheet" href="../css/login.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="login-container">
                <h2 class="text-white mb-4">Register</h2>
                {{-- @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input 
                            type="text" 
                            class="form-control @error('username') is-invalid @enderror" 
                            placeholder="Username" 
                            name="username" 
                            value="{{ old('username') }}" 
                            >
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input 
                            type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            placeholder="Password" 
                            name="password" 
                            >
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-login w-100">Register</button>
                    <div class="signup-text text-center mt-3">
                        Already have an account? <a href="{{ route('login') }}" class="signup-link">Sign in now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
