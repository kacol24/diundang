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
<div class="mx-auto position-relative" style="max-width: 500px">
    <img src="{{ asset('images/design.jpg') }}" class="img-fluid">
    <div class="position-absolute" style="left: 50%;transform: translateX(-50%);top: 46%;width: 40%;">
        <div class="card w-100 mx-auto rounded-3">
            <div class="card-body text-center w-100">
                {!! QrCode::size(500)->generate($invitation->guest_code) !!}
                <h5 class="card-title mt-2 mb-0">
                    {{ $invitation->name }}
                </h5>
                <p class="card-text m-0">
                    {{ $invitation->guests }} {{ Str::plural('guest', $invitation->guests) }}
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
