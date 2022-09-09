<div class="container-fluid">
    <div class="table-responsive" wire:poll.5000ms>
        <table class="table table-sm table-bordered m-0 table-striped">
            <thead>
            <tr>
                <th>Serial</th>
                <th>Usher</th>
                <th>Angpao</th>
                <th>Guest</th>
                <th>Group / Table</th>
            </tr>
            </thead>
            <tbody>
            @foreach($attendances as $attendance)
                <tr>
                    <td>
                        {{ $attendance->serial_number }}
                        <small class="text-muted d-block">
                            <span class="text-nowrap">Check-in:</span> {{ $attendance->updated_at->format('H:i:s') }}
                        </small>
                    </td>
                    <td>
                        {{ $usherMap[$attendance->sequence_group] ?? $attendance->sequence_group }}
                    </td>
                    <td>
                        <strong>{{ $attendance->gift_count }}</strong>
                        @if($attendance->extra_gifts)
                            ({{ $attendance->has_gift }} + {{ $attendance->extra_gifts }})
                        @endif
                        @if($attendance->notes)
                            <table class="table table-condensed table-bordered m-0">
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
                    <td class="text-nowrap">
                        {{ $attendance->invitation->name }}<br>
                        [{{ $attendance->invitation->guest_code }}]
                    </td>
                    <td class="text-nowrap">
                        <small>
                            Group: {{ optional($attendance->invitation->group)->group_name }}<br>
                            Table: {{ optional($attendance->invitation->seating)->name }}
                        </small>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
