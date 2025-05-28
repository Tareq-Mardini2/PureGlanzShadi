<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pure Glanz</title>
    @vite('resources/css/Login.css')
    <link rel="icon" href="{{asset('images/logo233.png')}}" type="image/png">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" name="name" id="name" required placeholder="Enter your username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Enter your password">
            </div>

            @if($errors->has('login_error'))
                <div class="error">{{ $errors->first('login_error') }}</div>
            @endif

            <button type="submit">Sign In</button>
        </form>
    </div>
</body>
</html>
