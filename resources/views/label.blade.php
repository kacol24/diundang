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
        }

        img {
            margin: 0;
        }

        * {
            box-sizing: border-box;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        div {
            display: none;
        }

        .break {
            padding-top: {{ $break == 'break_with_margin' ? '1cm' : '0' }};
            page-break-before: always;
            width: 100%;
            display: block;
            clear: both;
        }

        .label {
            width: 64mm;
            height: 32mm;
            min-width: 64mm;
            min-height: 32mm;
            max-width: 64mm;
            max-height: 32mm;
            border: .1px solid #ccc;
            text-align: center;
            page-break-inside: avoid;
            display: flex;
            float: left;
            align-items: center;
            justify-content: center;
            font-size: 15pt;
            padding: 0.5cm;
            position: relative;
        }
    </style>
</head>
<body style="font-size: 0; display: block;">
{{--<div--}}
{{--    style="outline: 1px solid black; width: 64mm; height: 32mm; display: inline-flex; align-items: center; justify-content: center; padding: 0.5cm; text-align: center">--}}
{{--    <h1 style="margin: 0; font-size: 8pt">--}}
{{--        Soo Jong Kiau, Ko Nanang, Ko Ati, Ko Afo, Asong--}}
{{--    </h1>--}}
{{--</div>--}}
{{--<div--}}
{{--    style="outline: 1px solid black; width: 75mm; height: 24mm; display: inline-flex; align-items: center; justify-content: center; padding: 0.5cm; text-align: center">--}}
{{--    <h1 style="margin: 0; font-size: 8pt">--}}
{{--        Soo Jong Kiau, Ko Nanang, Ko Ati, Ko Afo, Asong--}}
{{--    </h1>--}}
{{--</div>--}}
@foreach($invitations as $invitation)
    <div class="label">
        <div style="display: block;">
            @if($invitation->formatted_title)
                <small style="display: block;font-size: 9pt;">
                    {{ $invitation->formatted_title }}
                </small>
            @endif
            {{ $invitation->name }}
        </div>
    </div>
    @if($paperSizes[$paper][$break]['count'] == $loop->iteration)
        <div class="break"></div>
    @endif
@endforeach
</body>
</html>
