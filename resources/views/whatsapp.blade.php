@php
    $brideAndGroom = collect([
        $groomName,
        $brideName
    ]);
    $parents = collect([
        ['Mr. Tjen Gunawan Chandra', 'Mrs. Susilowati'],
        ['Mr. Ge Cing Kai', 'Mrs. Liauw Hung San'],
    ]);
    if (isset($reverse) && $reverse) {
        $brideAndGroom = $brideAndGroom->reverse();
        $parents = $parents->reverse();
    }
@endphp
Dear {!! $guestName !!},

You are cordially invited to the Wedding of
@foreach($brideAndGroom as $name)
*{{ $name }}{!! $loop->first ? ' &' : '' !!}*
@endforeach

Together with their families,
@foreach($parents as $parent)
*{{ $parent[0] }} &*
*{{ $parent[1] }}*
@if($loop->first)
and
@endif
@endforeach

@if(isset($isAttending) && $isAttending)
You can directly *download* your _Digital Invitation_ using this link:
{{ $downloadLink }}

_For detailed information of the reception, please visit this link:_
{{ $linkToSite }}
@else
Please kindly help us prepare everything better by confirming your presence to our wedding reception using the following RSVP form:
{{ $linkToSite }}


_Please complete this RSVP before *{{ $dueDate }}*._
@endif


With love,
*Kevin & Fernanda*
