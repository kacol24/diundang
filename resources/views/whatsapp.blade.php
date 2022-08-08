Dear {!! $guestName !!},

Tanpa mengurangi rasa hormat, kami mengundang Anda untuk hadir ke acara
Pernikahan *{{ $groomName }} & {{ $brideName }}*

Keluarga yang berbahagia,
*{{ __('Mr.') }} Tjen Gunawan Chandra & {{ __('Mrs.') }} Susilowati*
dan
*{{ __('Mr.') }} Ge Cing Kai & {{ __('Mrs.') }} Liauw Hung San*

@if(isset($isAttending) && $isAttending)
Anda dapat melihat detail acara dan download Digital Invitation pada link berikut:
*{{ $linkToSite }}*

_Harap simpan/download/screenshot QR Code dan bawa QR Code tersebut saat acara resepsi sebagai Digital Invitation._
@else
Untuk membantu kami mempersiapkan semuanya lebih baik,
mohon konfirmasi kehadiran Anda di acara pernikahan kami dengan mengisi formulir RSVP pada link berikut:
*{{ $linkToSite }}*


_Harap lengkapi RSVP ini sebelum *{{ $dueDate }}*._
@endif


With love,
*Kevin & Fernanda*
