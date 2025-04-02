<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    @if($errors->has('error'))
        <p>{{$errors->first('error')}}</p>
    @endif

    <form id="loginForm" method="post" action="{{route('admin.login')}}">
        @csrf
        <h1>Admin Login</h1>
        <input type="email" id="email" name="email" placeholder="Email" required>
        <span id="emailError" class="alert"></span>

        <input type="password" id="password" name="password" placeholder="Password" required minlength="6">
        <span id="passwordError" class="alert"></span>

        <button type="submit">Login</button>
        <a href="{{route('admin.signup')}}">Sign Up</a>
    </form>

    <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let emailError = document.getElementById('emailError');
        let passwordError = document.getElementById('passwordError');

        emailError.textContent = "";
        passwordError.textContent = "";

        if (!email.includes('@')) {
            emailError.textContent = "Enter a valid email";
            event.preventDefault();
        }
        if (password.length < 6) {
            passwordError.textContent = "Password must be at least 6 characters";
            event.preventDefault();
        }
    });
    </script>

</body>

</html>
