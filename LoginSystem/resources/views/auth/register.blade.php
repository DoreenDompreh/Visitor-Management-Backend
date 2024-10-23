<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <!-- Include any CSS files here for styling -->
</head>
<body>
    <h1>Register</h1>
    <!-- Display any success or error messages -->
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Registration Form -->
    <form action="{{ route('register') }}" method="POST">
        @csrf <!-- CSRF protection token -->
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
        <br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
