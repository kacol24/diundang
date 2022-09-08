<div>
    <div class="row" wire:poll.5000ms>
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
                                        </td>
                                        <td>
                                            {{ optional($attendance->invitation)->name }}
                                            <small class="text-muted d-block">
                                                Check-in: {{ $attendance->updated_at->format('H:i:s') }}
                                            </small>
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
