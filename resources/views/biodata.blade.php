<!DOCTYPE html>
<html>
<head>
    <title>Biodata</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
        }
        .container {
            width: 900px;
            margin: 20px auto;
            background: #fff;
            border: 1px solid #ccc;
        }
        .header {
            margin-top: 40px;
            display: flex;
            background: #1051b3;
            color: white;
            padding: 0;
            align-items: stretch;
        }
        .photo {
            width: 200px;
        }
        .photo img {
            margin-left: 15px;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .header-info {
            margin-left: 20px;
            padding: 20px;
            flex: 1;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            font-size: 14px;
            margin-top: 10px;
        }
        .content {
            padding: 20px;
        }
        h2 {
            color: #0b5ed7;
            margin-bottom: 5px;
        }
        hr {
            border: 1px solid #999;
            margin: 10px 0 15px 0;
        }
        .row {
            display: flex;
            margin-bottom: 20px;
        }
        .year {
            width: 120px;
            font-weight: bold;
            font-size: 14px;
        }
        .details {
            flex: 1;
            font-size: 14px;
        }
        .details strong {
            display: block;
        }
        .details em {
            font-style: italic;
        }
        .details ul {
            margin-top: 5px;
            margin-left: 18px;
        }
        .skills-list {
            margin-left: 120px;
        }
        .skills-list li {
            margin-bottom: 5px;
        }

    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <div class="photo">
            <img src="{{ asset($photo) }}" alt="Profile Photo">
        </div>

        <div class="header-info">
            <h1>{{ $name }}</h1>
            <p>{{ $profession }}</p>

            <div class="info-grid">
                <div>
                    <p><strong>Phone:</strong> {{ $phone }}</p>
                    <p><strong>Email:</strong> {{ $email }}</p>
                    <p><strong>LinkedIn:</strong> {{ $linkedin }}</p>
                    <p><strong>GitHub:</strong> {{ $github }}</p>
                </div>
                <div>
                    <p><strong>Address:</strong> {{ $address }}</p>
                    <p><strong>Date of Birth:</strong> {{ $dob }}</p>
                    <p>
                        <strong>Age:</strong> {{ $age }}
                        @if($age == 21)
                            (Dalawampu’t isa)
                        @elseif($age >= 22 && $age <= 23)
                            (Duapulo ket dua / Duapulo ket tallo)
                        @elseif($age > 24)
                            (Dalawampu ya lima)
                        @endif
                    </p>
                    <p><strong>Gender:</strong> {{ $gender }}</p>
                    <p><strong>Nationality:</strong> {{ $nationality }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <p>{{ $summary }}</p>
        <h2>Education</h2>
        <hr>
        @foreach($education as $edu)
            <div class="row">
                <div class="year">{{ $edu['year'] }}</div>
                <div class="details">
                    <strong>{{ $edu['title'] }}</strong>
                    <em>{{ $edu['school'] }}</em><br>
                    {{ $edu['details'] }}
                </div>
            </div>
        @endforeach
        <h2>Experience</h2>
        <hr>
        @foreach($experience as $exp)
            <div class="row">
                <div class="year">{{ $exp['year'] }}</div>
                <div class="details">
                    <strong>{{ $exp['position'] }}</strong>
                    <em>{{ $exp['company'] }}</em>
                    <ul>
                        @foreach($exp['tasks'] as $task)
                            <li>{{ $task }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
        <h2>Skills</h2>
        <hr>
        <ul class="skills-list">
            @foreach($skills as $skill)
                <li>{{ $skill }}</li>
            @endforeach
        </ul>

    </div>
</div>

</body>
</html>
