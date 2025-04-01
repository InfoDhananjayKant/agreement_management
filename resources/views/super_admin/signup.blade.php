<link rel="stylesheet" href="{{ asset('css/signup.css') }}">

<form method="POST" action="{{ route('admin.signup') }}">
    @csrf
    <h1>Sign Up</h1>

    <input type="text" name="name" placeholder="Full Name" required>
    <span>@error('name') {{ $message }} @enderror</span>

    <input type="email" name="email" placeholder="Email" required>
    <span>@error('email') {{ $message }} @enderror</span>

    <input type="password" name="password" placeholder="Password" required minlength="6">
    <span>@error('password') {{ $message }} @enderror</span>

    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
    
    <button type="submit">Sign Up</button>
</form>
