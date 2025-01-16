<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="login-container">
                    <h2 class="text-white mb-4">Sign In</h2>
                                        <!-- Flash Message for Success -->
                                        @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                    @if($errors->has('loginError'))
                        <div class="alert alert-danger">
                            {{ $errors->first('loginError') }}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
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
                        <button type="submit" class="btn btn-login w-100">Sign In</button>
                        <div class="signup-text text-center mt-3">
                            Don't have an account? <a href="{{ route('register') }}" class="signup-link">Sign up now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
