@component('mail::message')

Salut,

Am primit un mesaj de pe site despre:<br>

**{{ $subject }}**

Datele furnizate sunt:<br>

Nume: **{{ $first_name }} {{ $last_name ?? '' }}**<br>
Email: **{{ $email }}**<br>
Mesaj:<br>

**{{ $message }}**
<br><br>
@endcomponent