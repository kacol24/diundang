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

        .break {
            padding-top: {{ $break == 'break_with_margin' ? '1cm' : '0' }};
            page-break-before: always;
            width: 100%;
            display: flex;
        }
    </style>
</head>
<body style="font-size: 0">
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
<table style="font-size: 8pt">
    @foreach($invitations->chunk($paperSizes[$paper][$break]['x']) as $row => $invitationRow)
        <tr style="page-break-inside: avoid">
            @foreach($invitationRow as $invitation)
                <td style="width: 64mm;height: 32mm; outline: 1px solid black; vertical-align: middle; text-align: center; page-break-inside: avoid">
                    {{ $invitation->name }}
                </td>
            @endforeach
        </tr>
    @endforeach
</table>
</body>
</html>
