<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>You Are Invited - The Wedding Of John Doe & Jane Doe</title>
    <style>
        @page {
            margin: 0;
            size: 8cm 11.2cm;
        }

        body {
            margin: 0;
        }

        img {
            margin: 0;
        }

        * {
            box-sizing: border-box;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
    </style>
</head>
<body>
<div style="page-break-after: always">
    <div style="text-align: center;padding: 15px;">
        <div>
            Your table:<br>
            <strong>
                {{ $invitation->seating->name }}
            </strong>
        </div>
        <img src="{{ public_path('images/'. rand(1, 5) .'.jpg') }}" style="max-width: 100%;height:auto;margin-top: 30px;">
        <div style="position: fixed;bottom: 15px;left: 0;width: 100%;">
            <div style="width: 100px;margin: auto;">
                Invitation<br>
                Next Page
            </div>
        </div>
    </div>
</div>
<div style="position: relative;">
    <img src="{{ public_path('images/design.jpg') }}" style="max-width: 100%;height:auto;">
    <div style="position: absolute; left: 2.13cm;bottom: 1.6cm;">
        <div style="background-color:#fff;width: 3cm;padding: 15px;text-align: center;border-radius: 8px;">
            <img src="{{ $qr }}" style="height:auto;max-width: 100%">
            <strong style="font-size: 12px;">{{ $invitation->name }}</strong><br>
            <small style="font-size: 10px;">
                {{ $invitation->guests }} {{ Str::plural('guest', $invitation->guests) }}
            </small>
        </div>
    </div>
</div>
</body>
</html>
