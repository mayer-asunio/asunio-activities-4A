<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Evaluation System</title>
</head>
<body>
    <h2>Student Evaluation System</h2>
    @if(isset($name) && isset($prelim) && isset($midterm) && isset($final))

        @php
        $average = ($prelim + $midterm + $final) / 3;
        @endphp

        <p><strong>Name:</strong> {{ $name }}</p>
        <p><strong>Prelim:</strong> {{ $prelim }}</p>
        <p><strong>Midterm:</strong> {{ $midterm }}</p>
        <p><strong>Final:</strong> {{ $final }}</p>
        <p><strong>Average:</strong> {{ number_format($average, 2) }}</p>
        <p><strong>Letter Grade:</strong>
            @if($average >= 90)
                A
            @elseif($average >= 80)
                B
            @elseif($average >= 70)
                C
            @elseif($average >= 60)
                D
            @else
                F
            @endif
        </p>

        <p><strong>Remarks:</strong>
            @if($average >= 75)
                Passed
            @else
                Failed
            @endif
        </p>

        <p><strong>Award:</strong>
            @if($average >= 98)
                With Highest Honors
            @elseif($average >= 95)
                With High Honors
            @elseif($average >= 90)
                With Honors
            @else
                No Award
            @endif
        </p>

    @endif
</body>
</html>