<!doctype html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kayıt ol</title>
    <link rel="stylesheet" href="{{ asset('css/kayit.css') }}">

  </head>
  <body>

    <form class="box" action="{{ url('register') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div> <h2>Kayıt ol</h2> </div>
      <input type="text" name="name" placeholder="Ad">
      <input type="text" name="surname" placeholder="Soyad">
      <input type="text" name="studentNum" placeholder="Öğrenci no">
      <input type="password" name="pass" placeholder="Parola">
      <input id="Tckn" maxlenght="11" name="tcNo" oninput="javascript:if(this.value.length >11){this.value=this.value.slice(0,11);}" pattern="^[1-9]{1}[0-9]{9}[0,2,4,6,8]{1}$" type="password" name="" placeholder="TC kimlik no">
      <input type="datetime" name="birthDate" placeholder="Doğum tarihi">
      <input type="email"name="email" placeholder="E-mail">
      <input type="text" name="tel" placeholder="GSM">
      <input type="text" name="address" placeholder="Ev/İş Adresi">
      <input type="text" name="grade" placeholder="Sınıf">
      <input type="text" name="university" placeholder="Üniversite">
      <input type="text" name="fac" placeholder="Fakülte">
      <input type="text" name="dep" placeholder="Bölüm">
      <input type="file" name="studentImage" placeholder="">
      <input type="submit" value="Kayıt Ol">
      <a class="link" href="giris.html" target="_blank"></a>
    </form>
</body>
</html>
