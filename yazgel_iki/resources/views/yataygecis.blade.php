<html>

<head>
  <title>
    YATAY GEÇİŞ BAŞVURUSU
  </title>
  <link rel="stylesheet" href="{{ asset('css/yataygecis.css') }}">

</head>

<body>
  <div class="container">
    <header>YATAY GEÇİŞ BAŞVURUSU</header>

    <form action="{{ url('/pdfYatayGecis') }}" method="POST" target="_blank" enctype="multipart/form-data">
    @csrf
    <div class="deneme" id="Form1">
      <h3>BAŞVURU TÜRÜ </h3>


      <div class="dropdown3">
        <select name="basvuruTur">
          <option>Kurum İçi Yatay Geçiş Başvurusu</option>
          <option>Kurumlararası Yatay Geçiş Başvurusu</option>
          <option>Mer. Yer. Puanı ile Yatay Geçiş Başvurusu</option>
          <option>Yurt Dışı Yatay Geçiş Başvurusu</option>
        </select>
      </div>


      <div class="btn-box">
        <button type="button" id=İleri1>
          İleri
        </button>
      </div>
    </div>



    <div class="deneme" id="Form2">
      <h3>ÖĞRENİMİNE İLİŞKİN BİLGİLER-1</h3>

      <div class="dropdown3">ÖĞRETİM TÜRÜ
        <select name="ogretim">
          <option>I.Öğretim</option>
          <option>II.Öğretim</option>
        </select>
      </div>

      <div class="dropdown3">DİSİPLİN CEZASI ALIP ALMADIĞI
        <select name="disiplin">
          <option>EVET</option>
          <option>HAYIR</option>
        </select>
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
      <h3>ÖĞRENİMİNE İLİŞKİN BİLGİLER-2</h3>

      <div class="row">
        <input name="ort" type="text2bosluk2" placeholder="AKADEMİK BAŞARI NOT ORTALAMASI">
      </div>

      <div class="row">
        <input name="sNumber" type="text2bosluk2" placeholder="ÖĞRENCİ NUMARASI(KOÜ)">
      </div>

      <div class="row">
        <input name="yerlestirmeYil" type="text2bosluk2" placeholder="YÖK KURUMUNA YERLEŞTİRİLDİĞİ YIL">
      </div>

      <div class="row">
        <input name="puanTur" type="text2bosluk2" placeholder="YERLEŞTİRMEDEKİ PUANI TÜRÜ VE PUANI">
      </div>


      <div class="row">
        <input name="yabanciPuan" type="text2bosluk2" placeholder="Z.HAZIRLIK YABANCI DİL PUANI VE SINAV TÜRÜ">
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
      <h3>BAŞVURULAN PROGRAM BİLGİLERİ</h3>

      <div class="dropdown3">FAKÜLTE / YÜKSEKOKUL / MYO ADI
        <select name="bFac">
          <option>-</option>
          <option>Tıp Fakültesi</option>
          <option>Teknoloji Fakültesi</option>
          <option>Mühendislik Fakültesi</option>
        </select>
      </div>

      <div class="dropdown3">BÖLÜM / PROGRAM ADI
        <select name="bDep">
          <option>-</option>
          <option>Tıp Fakültesi</option>
          <option>Teknoloji Fakültesi</option>
          <option>Mühendislik Fakültesi</option>
        </select>
      </div>

      <div class="dropdown3">ÖĞRETİM TÜRÜ
        <select name="bOgr">
          <option>I.Öğretim</option>
          <option>II.Öğretim</option>
        </select>
      </div>

      <div class="row">
        <input name="bPuan" type="text2bosluk2" placeholder="YERLEŞTİRME YAPILDIĞI PUAN TÜRÜ VE PUANI">
      </div>


      <div class="btn-box">
        <button type="button" id="Geri3">
          Geri
        </button>
        <button type="submit" class="btn-pdf">
            PDF OLUŞTUR
        </button>
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

    <form action="{{ url('yataygecis') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="deneme" id="Form5">
      <h3>ÖĞRENCİ BELGESİ</h3>

      <input name="ogrenciBelgesi" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
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
      <h3>ÖSYM SINAV SONUÇ BELGESİ</h3>

      <input name="sinavSonucBelgesi" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>


      <div class="btn-box">
        <button type="button" id="Geri5">
          Geri
        </button>
        <button type="button" id=İleri6>
          İleri
        </button>
      </div>
    </div>


    <div class="deneme" id="Form7">
      <h3>ÖSYM YERLEŞTİRME BELGESİ</h3>

      <input name="yerlestirmeBelgesi" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>


      <div class="btn-box">
        <button type="button" id="Geri6">
          Geri
        </button>
        <button type="button" id=İleri7>
          İleri
        </button>
      </div>
    </div>


    <div class="deneme" id="Form8">
      <h3>TRANSKRİPT</h3>

      <input name="transkript" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>


      <div class="btn-box">
        <button type="button" id="Geri7">
          Geri
        </button>
        <button type="button" id=İleri8>
          İleri
        </button>
      </div>
    </div>


    <div class="deneme" id="Form9">
      <h3>DİSİPLİN CEZASI YOKTUR BELGESİ</h3>

      <input name="disiplinBelgesi" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>


      <div class="btn-box">
        <button type="button" id="Geri8">
          Geri
        </button>
        <button type="button" id=İleri9>
          İleri
        </button>
      </div>
    </div>


    <div class="deneme" id="Form10">
      <h3>DERS İÇERİKLERİ</h3>

      <input name="dersIcerikleri" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>


      <div class="btn-box">
        <button type="button" id="Geri9">
          Geri
        </button>
        <button type="button" id=İleri10>
          İleri
        </button>
      </div>
    </div>


    <div class="deneme" id="Form11">
      <h3>YABANCI DİL YETERLİLİK BELGESİ</h3>

      <input name="yabanciDil" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>


      <div class="btn-box">
        <button type="button" id="Geri10">
          Geri
        </button>
        <button type="button" id=İleri11>
          İleri
        </button>
      </div>
    </div>


    <div class="deneme" id="Form12">
      <h3>%10 BELGESİ</h3>

      <input name="onBelgesi" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>


      <div class="btn-box">
        <button type="button" id="Geri11">
          Geri
        </button>
        <button type="button" id=İleri12>
          İleri
        </button>
      </div>
    </div>


    <div class="deneme" id="Form13">
      <h3>YURTDIŞI SONUÇ BELGESİ</h3>

      <input name="yurtdisiBelgesi" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>
      <br> <br> <br>
      <h3>BAŞVURU BELGESİ </h3>

      <input name="basvuruBelgesi" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button name="appLetter" type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>
      <br> <br>

      <div class="btn-box">
        <button type="button" id="Geri12">
          Geri
        </button>
        <button type="Submit" class="btn-onay">
          BAŞVURUYU ONAYLA &#10004
        </button>
      </div>
    </div>
    </form>




    <dvi class="step-row">
      <div id="progress"></div>

      <div class="step-col"><small>Aşama 1</small></div>
      <div class="step-col"><small>Aşama 2</small></div>
      <div class="step-col"><small>Aşama 3</small></div>
      <div class="step-col"><small>Aşama 4</small></div>
      <div class="step-col"><small>Aşama 5</small></div>
      <div class="step-col"><small>Aşama 6</small></div>
      <div class="step-col"><small>Aşama 7</small></div>
      <div class="step-col"><small>Aşama 8</small></div>
      <div class="step-col"><small>Aşama 9</small></div>
      <div class="step-col"><small>Aşama 10</small></div>
      <div class="step-col"><small>Aşama 11</small></div>
      <div class="step-col"><small>Aşama 12</small></div>
      <div class="step-col"><small>Aşama 13</small></div>
    </dvi>

    <script>

      var Form1 = document.getElementById("Form1");
      var Form2 = document.getElementById("Form2");
      var Form3 = document.getElementById("Form3");
      var Form4 = document.getElementById("Form4");
      var Form5 = document.getElementById("Form5");
      var Form6 = document.getElementById("Form6");
      var Form7 = document.getElementById("Form7");
      var Form8 = document.getElementById("Form8");
      var Form9 = document.getElementById("Form9");
      var Form10 = document.getElementById("Form10");
      var Form11 = document.getElementById("Form11");
      var Form12 = document.getElementById("Form12");
      var Form13 = document.getElementById("Form13");


      var Next1 = document.getElementById("İleri1");
      var Next2 = document.getElementById("İleri2");
      var Next3 = document.getElementById("İleri3");
      var Next4 = document.getElementById("İleri4");
      var Next5 = document.getElementById("İleri5");
      var Next6 = document.getElementById("İleri6");
      var Next6 = document.getElementById("İleri6");
      var Next7 = document.getElementById("İleri7");
      var Next8 = document.getElementById("İleri8");
      var Next9 = document.getElementById("İleri9");
      var Next10 = document.getElementById("İleri10");
      var Next11 = document.getElementById("İleri11");
      var Next12 = document.getElementById("İleri12");


      var Back1 = document.getElementById("Geri1");
      var Back2 = document.getElementById("Geri2");
      var Back3 = document.getElementById("Geri3");
      var Back4 = document.getElementById("Geri4");
      var Back5 = document.getElementById("Geri5");
      var Back6 = document.getElementById("Geri6");
      var Back7 = document.getElementById("Geri7");
      var Back8 = document.getElementById("Geri8");
      var Back9 = document.getElementById("Geri9");
      var Back10 = document.getElementById("Geri10");
      var Back11 = document.getElementById("Geri11");
      var Back12 = document.getElementById("Geri12");

      var progress = document.getElementById("progress")

      Next1.onclick = function () {
        Form1.style.left = "-650px";
        Form2.style.left = "90px";
        progress.style.width = "80px";
      }

      Next2.onclick = function () {
        Form2.style.left = "-650px";
        Form3.style.left = "90px";
        progress.style.width = "127.27px";
      }

      Next3.onclick = function () {
        Form3.style.left = "-650px";
        Form4.style.left = "90px";
        progress.style.width = "174.54px";
      }

      Next4.onclick = function () {
        Form4.style.left = "-650px";
        Form5.style.left = "90px";
        progress.style.width = "221.81px";
      }

      Next5.onclick = function () {
        Form5.style.left = "-650px";
        Form6.style.left = "90px";
        progress.style.width = "266px";
      }

      Next6.onclick = function () {
        Form6.style.left = "-650px";
        Form7.style.left = "90px";
        progress.style.width = "315px";
      }

      Next7.onclick = function () {
        Form7.style.left = "-650px";
        Form8.style.left = "90px";
        progress.style.width = "361px";
      }

      Next8.onclick = function () {
        Form8.style.left = "-650px";
        Form9.style.left = "90px";
        progress.style.width = "408px";
      }

      Next9.onclick = function () {
        Form9.style.left = "-650px";
        Form10.style.left = "90px";
        progress.style.width = "454px";
      }

      Next10.onclick = function () {
        Form10.style.left = "-650px";
        Form11.style.left = "90px";
        progress.style.width = "499px";
      }

      Next11.onclick = function () {
        Form11.style.left = "-650px";
        Form12.style.left = "90px";
        progress.style.width = "545px";
      }

      Next12.onclick = function () {
        Form12.style.left = "-650px";
        Form13.style.left = "90px";
        progress.style.width = "600px";
      }







      Back1.onclick = function () {
        Form1.style.left = "90px";
        Form2.style.left = "650px";
        progress.style.width = "40px";
      }

      Back2.onclick = function () {
        Form2.style.left = "90px";
        Form3.style.left = "650px";
        progress.style.width = "80px";
      }

      Back3.onclick = function () {
        Form3.style.left = "90px";
        Form4.style.left = "650px";
        progress.style.width = "127.27px";
      }

      Back4.onclick = function () {
        Form4.style.left = "90px";
        Form5.style.left = "650px";
        progress.style.width = "174.54px";
      }

      Back5.onclick = function () {
        Form5.style.left = "90px";
        Form6.style.left = "650px";
        progress.style.width = "221.81px";
      }

      Back6.onclick = function () {
        Form6.style.left = "90px";
        Form7.style.left = "650px";
        progress.style.width = "266px";
      }

      Back7.onclick = function () {
        Form7.style.left = "90px";
        Form8.style.left = "650px";
        progress.style.width = "315px";
      }

      Back8.onclick = function () {
        Form8.style.left = "90px";
        Form9.style.left = "650px";
        progress.style.width = "361px";
      }

      Back9.onclick = function () {
        Form9.style.left = "90px";
        Form10.style.left = "650px";
        progress.style.width = "408px";
      }

      Back10.onclick = function () {
        Form10.style.left = "90px";
        Form11.style.left = "650px";
        progress.style.width = "454px";
      }

      Back11.onclick = function () {
        Form11.style.left = "90px";
        Form12.style.left = "650px";
        progress.style.width = "499";
      }

      Back12.onclick = function () {
        Form12.style.left = "90px";
        Form13.style.left = "650px";
        progress.style.width = "545px";
      }


    </script>

</body>

</html>
