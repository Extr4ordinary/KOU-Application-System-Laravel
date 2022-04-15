<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>
    ÇAP BAŞVURUSU
  </title>
  <link rel="stylesheet" href="{{ asset('css/cap.css') }}">

</head>

<body>
  <div class="container">
    <header>ÇAP BAŞVURUSU</header>

    <form action="{{ url('pdfCap') }}" target="_blank" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="deneme" id="Form1">
      <h3>BAŞVURU BİLGİLERİ </h3>

      <div class="dropdown3">ÖĞRETİM TÜRÜ
        <select name="ogretim">
          <option>1. Öğretim</option>
          <option>2. Öğretim</option>
        </select>
      </div>

      <div class="row">
        <input name="fac" type="text2bosluk2" placeholder="ÇAP YAPILACAK FAKÜLTE">
      </div>

      <div class="row">
        <input name="dep" type="text2bosluk2" placeholder="ÇAP YAPILACAK BÖLÜM">
      </div>

      <div class="btn-box">
        <button type="submit" class="btn-pdf">
            PDF OLUŞTUR
          </button>
        <button type="button" id="İleri1">
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

    <form action="{{ url('cap') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="deneme" id="Form2">
      <h3>TRANSKRİPT </h3>

      <input name="transkript" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>

      <div class="btn-box">
        <button type="button" id="Geri1">
          Geri
        </button>
        <button type="button" id="İleri2">
          İleri
        </button>
      </div>
    </div>


    <div class="deneme" id="Form3">
      <h3>İKİNCİ ANADAL VE ÖĞRENCİ PUANI </h3>

      <input name="ikinciAnadal" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>
      <br> <br> <br>

      <h3>BAŞVURU BELGESİ </h3>

      <input name="basvuruBelgesi" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button name="appLetter" type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>
      <br> <br>

      <div class="btn-box">
        <button type="button" id="Geri2">
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
    </dvi>

    <script>

      var Form1 = document.getElementById("Form1");
      var Form2 = document.getElementById("Form2");
      var Form3 = document.getElementById("Form3");


      var Next1 = document.getElementById("İleri1");
      var Next2 = document.getElementById("İleri2");

      var Back1 = document.getElementById("Geri1");
      var Back2 = document.getElementById("Geri2");


      var progress = document.getElementById("progress")

      Next1.onclick = function () {
        Form1.style.left = "-500px";
        Form2.style.left = "40px";
        progress.style.width = "300px";
      }

      Next2.onclick = function () {
        Form2.style.left = "-500px";
        Form3.style.left = "40px";
        progress.style.width = "450px";
      }



      Back1.onclick = function () {
        Form1.style.left = "40px";
        Form2.style.left = "500px";
        progress.style.width = "150px";
      }

      Back2.onclick = function () {
        Form2.style.left = "40px";
        Form3.style.left = "500px";
        progress.style.width = "300px";
      }



    </script>

</body>

</html>
