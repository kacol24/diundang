<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style>
        @page {
            margin: 12mm 0;
            size: 200mm 163mm;
        }

        body {
            margin: 12mm 0;
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
@foreach($invitations->chunk(12) as $invitationRow)
    <table style="font-size: 8pt; page-break-before: always">
        @foreach($invitationRow->chunk(3) as $invitationColumn)
            <tr style="page-break-inside: avoid">
                @foreach($invitationColumn as $invitation)
                    <td style="width: 64mm;height: 32mm; vertical-align: middle; text-align: center; page-break-inside: avoid; margin: 1mm">
                        {{ $invitation->name }}
                    </td>
                @endforeach
            </tr>
        @endforeach
    </table>
@endforeach
</body>
</html>
