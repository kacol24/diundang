<!doctype html>
<html lang="en" class="h-100">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>You Are Invited - The Wedding Of John Doe & Jane Doe</title>
    <style>
        svg {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body class="h-100 d-flex align-items-center">
<div class="container">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            {!! QrCode::size(500)->generate($invitation->guest_code) !!}
        </div>
        <div class="card-body text-center">
            {{ $invitation->guest_code }}
            <h5 class="card-title">
                {{ $invitation->name }}
            </h5>
            <p class="card-text">
                {{ $invitation->guests }} {{ Str::plural('guest', $invitation->guests) }}<br>
                {{ $invitation->seating->name }}<br>
            </p>
        </div>
    </div>
</div>
</body>
</html>
