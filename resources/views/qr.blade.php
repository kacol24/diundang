@php
    $paperSizes = [
        'A3' => [
            'paper'             => '297mm 420mm',
            'break'             => 90,
            'break_with_margin' => 90
        ],
        'A4' => [
            'paper' => '210mm 297mm',
            'break' => 42
        ],
        'A3_LANDSCAPE' => [
            'paper'             => '420mm 297mm',
            'break'             => 98,
            'break_with_margin' => 78
        ],
        'A4_LANDSCAPE' => [
            'paper' => '297mm 210mm',
            'break' => 45
        ],
    ];
    $paper = 'A3';
@endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>You Are Invited - The Wedding Of John Doe & Jane Doe</title>
    <style>
        @page {
            margin: 1cm;
            size: {{ $paperSizes[$paper]['paper'] }};
        }

        body {
            margin: 1cm;
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
            padding-top: 1cm;
            page-break-before: always;
        }
    </style>
</head>
<body style="font-size: 0;">
@php($invitations = App\Models\Invitation::limit(98)->get())
@foreach($invitations as $invitation)
    <div style="width: 3.4cm; max-width: 3.4cm; height:auto; outline: 1px solid black; margin: 0;display: inline-flex">
        <img src="{{ asset('storage/printable/' . $invitation->filename) }}"
             style="max-width: 100%; height: auto; margin: 0; width: 100%;">
    </div>
    @if($loop->iteration % $paperSizes[$paper]['break_with_margin'] == 0)
        <div class="break"></div>
    @endif
@endforeach
</body>
</html>
