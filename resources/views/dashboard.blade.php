<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Dashboard | loVINyouforeFER</title>
</head>
<body>
<main class="py-3">
    <div class="container-fluid">
        <div class="row">
            @foreach($bySequenceGroup as $usher => $group)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-header">
                            Usher: <h5>{{ $usher }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    Check-in:
                                    <h1 class="card-title m-0">
                                        {{ $group->count() }}
                                    </h1>
                                </div>
                                <div class="col-6">
                                    Total Angpao:
                                    <h1>{{ $group->sum('gift_count') }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white p-0">
                            <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                                <table class="table m-0 text-nowrap table-striped">
                                    <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Angpao</th>
                                        <th>Table</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($group as $attendance)
                                        <tr>
                                            <td>
                                                {{ $attendance->serial_number }}
                                                <small class="text-muted d-block">
                                                    ({{ $attendance->updated_at->format('H:i:s') }})
                                                </small>
                                            </td>
                                            <td>
                                                {{ optional($attendance->invitation)->name }}
                                            </td>
                                            <td>
                                                <strong>{{ $attendance->gift_count }}</strong>
                                                @if($attendance->extra_gifts)
                                                    ({{ $attendance->has_gift }} + {{ $attendance->extra_gifts }})
                                                @endif
                                                @if($attendance->notes)
                                                    <table class="table table-condensed table-bordered">
                                                        @foreach($attendance->notes as $note)
                                                            <tr>
                                                                <td>
                                                                    {{ $loop->iteration }}
                                                                </td>
                                                                <td>
                                                                    {{ $note }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                @endif
                                            </td>
                                            <td>
                                                {{ optional(optional($attendance->invitation)->seating)->name }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>
