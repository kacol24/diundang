<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style>
        @page {
            margin: {{ $break == 'break_with_margin' ? '1cm' : '0' }} 0 {{ $break == 'break_with_margin' ? '1cm' : '0' }} 0;
            size: {{ $paperSizes[$paper]['paper'] }};
        }

        body {
            margin: {{ $break == 'break_with_margin' ? '1cm' : '0' }};
            display: table;
            table-layout: fixed;
        }

        img {
            margin: 0;
        }

        * {
            font-size: 0;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        .break {
            padding-top: {{ $break == 'break_with_margin' ? '1cm' : '0' }};
            page-break-before: always;
            width: 100%;
            display: flex;
        }

        .label {
            outline: .2px solid black;
            width: 3.5cm;
            max-width: 3.5cm;
            display: inline-block;
        }
    </style>
</head>
<body>
@foreach($invitations->chunk($paperSizes[$paper][$break]['x']) as $row => $invitationRow)
    <div style="page-break-inside: avoid">
        @foreach($invitationRow as $invitation)
            <div class="label">
                <img src="{{ asset('storage/printable/' . $invitation->filename) }}"
                     style="height:auto; width: 100%; max-width: 100%">
            </div>
        @endforeach
    </div>
@endforeach
</body>
</html>
