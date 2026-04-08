<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login Form</h2>

    <form method="POST">
        @csrf
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Login</button>
    </form>

    @isset($message)
        <h3 style="color: {{ $status == 'success' ? 'green' : 'red' }}">
            {{ $message }}
        </h3>
    @endisset
</body>
</html>