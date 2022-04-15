
<!doctype html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ŞİFREMİ UNUTTUM</title>
    <link rel="stylesheet" href="{{asset('css/sifre.css')}}">

  </head>
  <body>

    <form class="box" action="{{ url('forgot') }}" method="POST">
        @csrf
    <h2>Şifre Yenileme</h2>
    <input type="text" name="email" placeholder="E-mail">
    <button class="btn" type="submit">Parola Sıfırla</button>
  </form>
  </body>
</html>
