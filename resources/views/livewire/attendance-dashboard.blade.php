<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-condensed table-bordered">
            <thead>
            <tr>
                <th>Serial</th>
                <th>Usher</th>
                <th>Name</th>
                <th>Group</th>
                <th>Angpao</th>
            </tr>
            </thead>
            <tbody>
            @foreach($attendances as $attendance)
                <tr>
                    <td>
                        {{ $attendance->serial_number }}
                        <small class="text-muted">
                            Check-in: {{ $attendance->updated_at->format('H:i:s') }}
                        </small>
                    </td>
                    <td>
                        {{ $attendance->sequence_group }}
                    </td>
                    <td>
                        {{ $attendance->invitation->name }}
                    </td>
                    <td>
                        {{ optional($attendance->invitation->group)->group_name }}
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
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
