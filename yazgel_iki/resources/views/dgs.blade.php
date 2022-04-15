<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>
    DGS BAŞVURUSU
  </title>
  <link rel="stylesheet" href="{{ asset('css/dgs.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />


</head>

<script>
  function selectFile(btn) {
    var fileBtn = btn.parentElement.children[1];
    var customText = btn.parentElement.children[3];
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


<body>
  <div class="container">
    <header>DGS BAŞVURUSU</header>

    <form action="{{ url('/dgs') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="deneme" id="Form1">
      <h3>E-DEVLET KAYIT İŞLEMLERİ </h3>

      <div class="btn-box1">
        <button type="button" onclick="window.open('https://www.turkiye.gov.tr/yok-universite-ekayit', '_blank');" class="btn-pdf">
          <i class="fas fa-angle-right fa-lg"></i> E-DEVLET ÜNİVERSİTE KAYIT
        </button>
      </div>

      <div class="btn-box">
        <button type="button" id="İleri1">
          İleri
        </button>
      </div>

    </div>


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
      <h3>DERS İÇERİKLERİ </h3>

      <input name="ders_icerik" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>

      <div class="btn-box">
        <button type="button" id="Geri2">
          Geri
        </button>
        <button type="button" id="İleri3">
          İleri
        </button>
      </div>
    </div>


    <div class="deneme" id="Form4">
      <h3>YABANCI DİL YETERLİLİK BELGESİ</h3>

      <input name="yabancidil" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>

      <div class="btn-box">
        <button type="button" id="Geri3">
          Geri
        </button>
        <button type="button" id="İleri4">
          İleri
        </button>
      </div>
    </div>


    <div class="deneme" id="Form5">
      <h3>SAĞLIK RAPORU BELGESİ </h3>

      <input name="saglikraporu" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>
      <br> <br> <br>

      <div class="btn-box">
        <button type="button" id="Geri4">
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
    </dvi>

    <script>

      var Form1 = document.getElementById("Form1");
      var Form2 = document.getElementById("Form2");
      var Form3 = document.getElementById("Form3");
      var Form4 = document.getElementById("Form4");
      var Form5 = document.getElementById("Form5");


      var Next1 = document.getElementById("İleri1");
      var Next2 = document.getElementById("İleri2");
      var Next3 = document.getElementById("İleri3");
      var Next4 = document.getElementById("İleri4");

      var Back1 = document.getElementById("Geri1");
      var Back2 = document.getElementById("Geri2");
      var Back3 = document.getElementById("Geri3");
      var Back4 = document.getElementById("Geri4");


      var progress = document.getElementById("progress")

      Next1.onclick = function () {
        Form1.style.left = "-500px";
        Form2.style.left = "40px";
        progress.style.width = "170px";
      }

      Next2.onclick = function () {
        Form2.style.left = "-500px";
        Form3.style.left = "40px";
        progress.style.width = "260px";
      }

      Next3.onclick = function () {
        Form3.style.left = "-500px";
        Form4.style.left = "40px";
        progress.style.width = "350px";
      }

      Next4.onclick = function () {
        Form4.style.left = "-500px";
        Form5.style.left = "40px";
        progress.style.width = "450px";
      }



      Back1.onclick = function () {
        Form1.style.left = "40px";
        Form2.style.left = "500px";
        progress.style.width = "80px";
      }

      Back2.onclick = function () {
        Form2.style.left = "40px";
        Form3.style.left = "500px";
        progress.style.width = "170px";
      }

      Back3.onclick = function () {
        Form3.style.left = "40px";
        Form4.style.left = "500px";
        progress.style.width = "260px";
      }

      Back4.onclick = function () {
        Form4.style.left = "40px";
        Form5.style.left = "500px";
        progress.style.width = "350px";
      }



    </script>

</body>

</html>
