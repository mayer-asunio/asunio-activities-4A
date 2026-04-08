<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h2>Registration Form</h2>

    <form method="POST">
        @csrf
        <input type="text" name="firstname" placeholder="First Name" required><br><br>
        <input type="text" name="middlename" placeholder="Middle Name" required><br><br>
        <input type="text" name="lastname" placeholder="Last Name" required><br><br>
        <input type="text" name="address" placeholder="Address" required><br><br>
        <input type="date" name="birthdate" required><br><br>
        <button type="submit">Register</button>
    </form>

    @isset($firstname)
        <h3>
            Your name is {{ $firstname }} {{ $middlename }} {{ $lastname }}
            from {{ $address }} born on {{ $birthdate }}
        </h3>
    @endisset
</body>
</html>