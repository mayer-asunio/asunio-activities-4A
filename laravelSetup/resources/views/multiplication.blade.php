<!DOCTYPE html>
<html>
<head>
    <title>Multiplication Table</title>
</head>
<body>
    <h2>Multiplication Table</h2>

    <form method="POST">
        @csrf
        <input type="number" name="row" placeholder="Row" required>
        <input type="number" name="col" placeholder="Column" required>
        <button type="submit">Generate</button>
    </form>

    @isset($row)
        <table border="1" cellpadding="10">
            @for($i = 1; $i <= $row; $i++)
                <tr>
                    @for($j = 1; $j <= $col; $j++)
                        <td>{{ $i * $j }}</td>
                    @endfor
                </tr>
            @endfor
        </table>
    @endisset
</body>
</html>