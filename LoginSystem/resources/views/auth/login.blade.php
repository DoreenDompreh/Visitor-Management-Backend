<!-- resources/views/auth/login.blade.php -->
<form method="POST" action="{{ route('login') }}">
    @csrf

    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ old('email') }}" required>
    @error('email')
        <div>{{ $message }}</div>
    @enderror

    <label for="password">Password:</label>
    <input type="password" name="password" required>
    @error('password')
        <div>{{ $message }}</div>
    @enderror

    <button type="submit">Login</button>
</form>
