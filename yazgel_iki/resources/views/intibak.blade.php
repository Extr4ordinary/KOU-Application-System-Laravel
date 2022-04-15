<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>
    İNTİBAK BAŞVURUSU
  </title>
  <link rel="stylesheet" href="{{ asset('css/intibak.css') }}">

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
    <header>İNTİBAK BAŞVURUSU</header>

    <form action="{{ url('intibak') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="deneme" id="Form1">
      <h3>UYUM-İNTİBAK FORMU </h3>

      <input name="uyumform" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>

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
      <h3>İKİNCİ ANADAL VE ÖĞRENCİ PUANI </h3>

      <input name="ikinciAnadal" type="file" id="real-file" hidden="hidden" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
      <button type="button" class="selectBtn" id="custom-button" onclick="selectFile(this)">Belge Seçiniz</button>
      <span id="custom-text">Henüz bir dosya seçilmedi.</span>
      <br> <br> <br>

      <div class="btn-box">
        <button type="button" id="Geri2">
          Geri
        </button>
        <button type="submit" class="btn-onay">
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
