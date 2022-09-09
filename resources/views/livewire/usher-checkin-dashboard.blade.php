<div class="container-fluid">
    <div class="row" wire:poll.5000ms>
        @foreach($bySequenceGroup as $usher => $group)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                Usher: <h5>
                                    {{ $usher }}
                                    @isset($usherMap[$usher])
                                        - {{ $usherMap[$usher] }}
                                    @endisset
                                </h5>
                            </div>
                            <div class="col-auto">
                                Check-in:
                                <h1 class="card-title m-0">
                                    {{ $group->count() }}
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-0">
                            <div class="col-4">
                                Total Angpao:
                                <h1>{{ $group->sum('gift_count') }}</h1>
                            </div>
                            <div class="col-4">
                                Angpao Tamu:
                                <h1>{{ $group->sum('has_gift') }}</h1>
                            </div>
                            <div class="col-4">
                                Titipan:
                                <h1>{{ $group->sum('extra_gifts') }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white p-0">
                        <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                            <table class="table m-0 table-sm">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Angpao</th>
                                    <th>Guest</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($group as $attendance)
                                    <tr>
                                        <td>
                                            {{ $attendance->serial_number }}
                                        </td>
                                        <td class="text-nowrap">
                                            <strong class="d-block">{{ $attendance->gift_count }}</strong>
                                            @if($attendance->extra_gifts)
                                                ({{ $attendance->has_gift }} + {{ $attendance->extra_gifts }})
                                            @endif
                                        </td>
                                        <td class="text-nowrap">
                                            {{ $attendance->invitation->name }}<br>
                                            [{{ $attendance->invitation->guest_code }}]
                                            <small class="text-muted d-block text-nowrap">
                                                Check-in: {{ $attendance->updated_at->format('H:i:s') }}<br>
                                                Group: {{ optional($attendance->invitation->group)->group_name }}<br>
                                                Table: {{ optional($attendance->invitation->seating)->name }}
                                            </small>
                                            @if($attendance->notes)
                                                <table class="table table-sm table-bordered m-0">
                                                    @foreach($attendance->notes as $note)
                                                        <tr>
                                                            <th style="width: 20px;">
                                                                {{ $loop->iteration }}
                                                            </th>
                                                            <td>
                                                                {{ $note }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            @endif
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
