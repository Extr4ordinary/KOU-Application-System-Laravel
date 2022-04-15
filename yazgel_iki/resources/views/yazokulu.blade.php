<html>

<head>
  <title>
    YAZ OKULU BAŞVURUSU
  </title>
  <link rel="stylesheet" href="{{ asset('css/yazokulu.css') }}">

</head>

<body>
  <div class="container">
    <header>YAZ OKULU BAŞVURUSU</header>

    <div class="step-row">
        <div id="progress"></div>

        <div class="step-col"><small>Aşama 1</small></div>
        <div class="step-col"><small>Aşama 2</small></div>
        <div class="step-col"><small>Aşama 3</small></div>
        <div class="step-col"><small>Aşama 4</small></div>
        <div class="step-col"><small>Aşama 5</small></div>
        <div class="step-col"><small>Aşama 6</small></div>
        <div class="step-col"><small>Aşama 7</small></div>
    </div>
    <form action="{{ url('pdfYazOkulu') }}" target="_blank" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="deneme" id="Form1">
      <h3>ÖĞRENİMİNE İLİŞKİN BİLGİLER </h3>
      <input name="danisman" type="text" placeholder="ÖĞRENCİ DANIŞMANI ADI - SOYADI" required>
      <div class="btn-box">
        <button type="button" id="İleri1">
          İleri
        </button>
      </div>
    </div>

    <div class="deneme" id="Form2">
      <h3>SORUMLU OLUNAN DERSLER </h3>
      <div class="row">
        <input type="text2bosluk1" placeholder="DERS ADI VE KODU" name="sDersBir">
      </div>
      <div class="row1">


        <input type="text2bosluk2" id="fname" placeholder="T" name="sTBir">

      </div>
      <div class="row2">


        <input type="text2bosluk3" id="lname" placeholder="U" name="sUBir">

      </div>

      <div class="row3">


        <input type="text2bosluk4" id="lname" placeholder="L" name="sLBir">

      </div>

      <div class="row4">


        <input type="text2bosluk5" id="lname" placeholder="A" name="sABir">

      </div>

      <br>

      <div class="row5">
        <input type="text2bosluk1" placeholder="DERS ADI VE KODU" name="sDersIki">
      </div>
      <div class="row6">


        <input type="text2bosluk2" id="fname" placeholder="T" name="sTIki">

      </div>
      <div class="row7">


        <input type="text2bosluk3" id="lname" placeholder="U" name="sUIki">

      </div>

      <div class="row8">


        <input type="text2bosluk4" id="lname" placeholder="L" name="sLIki">

      </div>

      <div class="row9">


        <input type="text2bosluk5" id="lname" placeholder="A" name="sAIki">

      </div>

      <br>

      <div class="row10">
        <input type="text2bosluk1" placeholder="DERS ADI VE KODU" name="sDersUc">
      </div>
      <div class="row11">


        <input type="text2bosluk2" id="fname" placeholder="T" name="sTUc">

      </div>
      <div class="row12">


        <input type="text2bosluk3" id="lname" placeholder="U" name="sUUc">

      </div>

      <div class="row13">


        <input type="text2bosluk4" id="lname" placeholder="L" name="sLUc">

      </div>

      <div class="row14">


        <input type="text2bosluk5" id="lname" placeholder="A" name="sAUc">

      </div>


      <div class="container">



        <div class="btn-box1">
          <button type="button" id="Geri1">
            Geri
          </button>
          <button type="button" id=İleri2>
            İleri
          </button>

        </div>

      </div>
    </div>

    <div class="deneme" id="Form3">
      <h3>YAZ ÖĞRETİMİ BİLGİLERİ </h3>
      <div class="dropdown3">FAKÜLTE / YÜKSEKOKUL / MYO ADI
        <select name="fac">
          <option>-</option>
          <option>Tıp Fakültesi</option>
          <option>Teknoloji Fakültesi</option>
          <option>Mühendislik Fakültesi</option>
        </select>
      </div>
      <div class="dropdown3">BÖLÜM / PROGRAM ADI
        <select name="dep">
          <option>-</option>
          <option>Biyomedikal Mühendisliği</option>
          <option>Bilişim Sistemleri Mühendisliği</option>
          <option>Otomativ Mühendisliği</option>
          <option>Bilgisayar Mühendisliği</option>
        </select>
      </div>

      <div class="asama3row">
        <input type="text3bosluk" placeholder="YAZ OKULU İÇİN BAŞVURULAN ÜNİ." name="uni">
      </div>
      <div class="asama3row1">
        <input type="text3bosluk1" placeholder="YAZ OKULU BAŞLAMA - BİTİŞ TARİHLERİ" name="dates">
      </div>
      <div class="btn-box">
        <button type="button" id="Geri2">
          Geri
        </button>
        <button type="button" id=İleri3>
          İleri
        </button>
      </div>
    </div>

    <div class="deneme" id="Form4">
      <h3>ALINACAK DERSLER </h3>
      <div class="row">
        <input type="text2bosluk1" placeholder="DERS ADI VE KODU" name="aDersBir">
      </div>
      <div class="row1">
        <input type="text2bosluk2" id="fname" placeholder="T" name="aTBir">
      </div>
      <div class="row2">
        <input type="text2bosluk3" id="lname" placeholder="U" name="aUBir">
      </div>

      <div class="row3">
        <input type="text2bosluk4" id="lname" placeholder="L" name="aLBir">
      </div>

      <div class="row4">
        <input type="text2bosluk5" id="lname" placeholder="A" name="aABir">
      </div>

      <br>

      <div class="row5">
        <input type="text2bosluk1" placeholder="DERS ADI VE KODU" name="aDersIki">
      </div>
      <div class="row6">
        <input type="text2bosluk2" id="fname" placeholder="T" name="aTIki">
      </div>
      <div class="row7">
        <input type="text2bosluk3" id="lname" placeholder="U" name="aUIki">
      </div>

      <div class="row8">
        <input type="text2bosluk4" id="lname" placeholder="L" name="aLIki">
      </div>

      <div class="row9">
        <input type="text2bosluk5" id="lname" placeholder="A" name="aAIki">
      </div>

      <br>

      <div class="row10">
        <input type="text2bosluk1" placeholder="DERS ADI VE KODU" name="aDersUc">
      </div>
      <div class="row11">
        <input type="text2bosluk2" id="fname" placeholder="T" name="aTUc">
      </div>
      <div class="row12">
        <input type="text2bosluk3" id="lname" placeholder="U" name="aUUc">
      </div>

      <div class="row13">
        <input type="text2bosluk4" id="lname" placeholder="L" name="aLUc">
      </div>

      <div class="row14">
        <input type="text2bosluk5" id="lname" placeholder="A" name="aAUc">
      </div>
      <div class="btn-box">
        <button type="button" id="Geri3">
          Geri
        </button>
        <button type="submit" class="btn-pdf">PDF Oluştur</button>
        <button type="button" id=İleri4>
          İleri
        </button>
      </div>
    </div>
    </form>

    <script>
      function selectFile(btn) {
        if (btn.name == "appLetter") {
            var fileBtn = btn.parentElement.children[8];
            var customText = btn.parentElement.children[10];
        } else {
            var fileBtn = btn.parentElement.children[1];
            var customText = btn.parentElement.children[3];
        }
        // var realFileBtn = document.getElementById("real-file");
        // var customTxt = document.getElementById("custom-text2");

        fileBtn.click();
        fileBtn.addEventListener("change", function () {
          if (fileBtn.value) {
            customText.innerHTML = fileBtn.value.match(
              /[\/\\]([\w\d\s\.\-\(\)]+)$/
            )[1];
          } else {
            customText.innerHTML = "Henüz bir dosya seçilmedi.";
          }
        });
      }
    </script>

    <form action="{{ url('yazokulu') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="deneme" id="Form5">
      <h3>TABAN PUANLARI </h3>
      <input name="taban" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>

      <div class="btn-box">
        <button type="button" id="Geri4">
          Geri
        </button>
        <button type="button" id=İleri5>
          İleri
        </button>
      </div>
    </div>

    <div class="deneme" id="Form6">
      <h3>KARŞI KURUM DERS BİLGİLERİ </h3>
      <input name="ders_icerik" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>

      <div class="btn-box">
        <button type="button" id="Geri5">
          Geri
        </button>
        <button type="button" id="İleri6">
          İleri
        </button>
      </div>
    </div>

    <script>
        function selectAppLetter(btn) {
            var fileBtn = btn.parentElement.children;
            console.log(fileBtn);
        }
    </script>

    <div class="deneme" id="Form7">
      <h3>TRANSKRİPT </h3>
      <input name="transkript" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>
      <br> <br> <br>
      <h3>BAŞVURU BELGESİ </h3>

      <input name="basvuru_belge" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button name="appLetter" type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>
      <br> <br>

      <div class="btn-box">
        <button type="button" id="Geri6">
          Geri
        </button>
        <button type="submit" class="btn-onay">
          BAŞVURUYU ONAYLA &#10004
        </button>
      </div>
    </div>
    </form>





</div>

    <script>

      var Form1 = document.getElementById("Form1");
      var Form2 = document.getElementById("Form2");
      var Form3 = document.getElementById("Form3");
      var Form4 = document.getElementById("Form4");
      var Form5 = document.getElementById("Form5");
      var Form6 = document.getElementById("Form6");
      var Form7 = document.getElementById("Form7");

      var Next1 = document.getElementById("İleri1");
      var Next2 = document.getElementById("İleri2");
      var Next3 = document.getElementById("İleri3");
      var Next4 = document.getElementById("İleri4");
      var Next5 = document.getElementById("İleri5");
      var Next6 = document.getElementById("İleri6");

      var Back1 = document.getElementById("Geri1");
      var Back2 = document.getElementById("Geri2");
      var Back3 = document.getElementById("Geri3");
      var Back4 = document.getElementById("Geri4");
      var Back5 = document.getElementById("Geri5");
      var Back6 = document.getElementById("Geri6");
      var Back7 = document.getElementById("Geri7");

      var progress = document.getElementById("progress")

      Next1.onclick = function () {
        Form1.style.left = "-500px";
        Form2.style.left = "40px";
        progress.style.width = "115px";
      }

      Next2.onclick = function () {
        Form2.style.left = "-500px";
        Form3.style.left = "40px";
        progress.style.width = "180px";
      }

      Next3.onclick = function () {
        Form3.style.left = "-500px";
        Form4.style.left = "40px";
        progress.style.width = "240px";
      }

      Next4.onclick = function () {
        Form4.style.left = "-500px";
        Form5.style.left = "40px";
        progress.style.width = "305px";
      }

      Next5.onclick = function () {
        Form5.style.left = "-500px";
        Form6.style.left = "40px";
        progress.style.width = "370px";
      }

      Next6.onclick = function () {
        Form6.style.left = "-500px";
        Form7.style.left = "40px";
        progress.style.width = "450px";
      }



      Back1.onclick = function () {
        Form1.style.left = "40px";
        Form2.style.left = "500px";
        progress.style.width = "50px";
      }

      Back2.onclick = function () {
        Form2.style.left = "40px";
        Form3.style.left = "500px";
        progress.style.width = "110px";
      }

      Back3.onclick = function () {
        Form3.style.left = "40px";
        Form4.style.left = "500px";
        progress.style.width = "180px";
      }

      Back4.onclick = function () {
        Form4.style.left = "40px";
        Form5.style.left = "500px";
        progress.style.width = "240px";
      }

      Back5.onclick = function () {
        Form5.style.left = "40px";
        Form6.style.left = "500px";
        progress.style.width = "305px";
      }

      Back6.onclick = function () {
        Form6.style.left = "40px";
        Form7.style.left = "500px";
        progress.style.width = "370px";
      }


    </script>

</body>

</html>
