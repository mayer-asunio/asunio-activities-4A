<!DOCTYPE html>
<html>
<head>
    <title>Odd or Even</title>
</head>
<body>
    <h2>Odd or Even</h2>

    <form method="POST">
        @csrf
        <input type="number" name="number" placeholder="Enter number" required>
        <button type="submit">Check</button>
    </form>

    @isset($result)
        <h3>{{ $number }} is {{ $result }}</h3>
    @endisset
</body>
</html>