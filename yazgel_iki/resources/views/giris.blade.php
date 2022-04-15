<!doctype html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GİRİŞ</title>
    <link rel="stylesheet" href="{{ asset('css/giris.css') }}">

  </head>
  <body>

    <form class="main" action="{{ url('login') }}" method="POST" enctype="multipart/form-data">
    @csrf
      <h2>Öğrenci Bilgi Sistemi</h2>
      <input name="studentNum" type="text" placeholder="Öğrenci no" autocomplete="false">
      <input name="pass" type="password" placeholder="Parola">
      <button class="extra-btn" type="submit">Giriş Yap</button>
      <button class="extra-btn" type="button" onclick="window.location='{{ url('register') }}'">Kayıt Ol</button>
      <button class="extra-btn" type="button" onclick="window.location='{{ url('forgot') }}'">Şifremi Unuttum</button>
    </form>

  </body>
</html>
