@component('mail::message')
# Selamat Bergabung ke PERDOSKI!
<p>
<b>{{$user->full_name}}</b>, selamat atas bergabungnya Anda ke dalam keanggotaan PERDOSKI.<br>
Berikut detail akun yang bisa Anda gunakan untuk masuk ke sistem PERDOSKI:<br>
username: {{$email}}<br>
password: {{$password}}
</p>
<p>
	Segera login ke <a href="#">Perdoski.com</a> untuk mengganti password Anda dan menggunakan fasilitas-fasilitas dari sistem digital PERDOSKI.
</p>
Terimakasih,<br>
Pengurus Pusat PERDOSKI
@endcomponent
