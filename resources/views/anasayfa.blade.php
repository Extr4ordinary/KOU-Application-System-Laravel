
<!DOCTYPE html>
<html lang="en">

<head>
    <title>KOCAELİ ÜNİVERSİTESİ</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ALL CSS FILES -->

    <link href="{{ asset('css/kouanasayfa.css') }}" rel="stylesheet" />


</head>

<body>
    <!--HEADER SECTION-->


    <!-- LOGO AND MENU SECTION -->
    <div class="top-logo" data-spy="affix" data-offset-top="250">
        <div class="container1">
            <div class="row">


                    <div class="main-menu">
                        <div class="wed-logo">
                            <a href="{{ url('anasayfa') }}"><img src="{{ asset('koulogo.png') }}" alt="" />
                            </a>
                        </div>
                        <ul>
                            <li><a href="{{ url('anasayfa') }}">Anasayfa</a>
                            </li>


                            <li><a href="{{ url('profil') }}">ÖĞRENCİ PROFİLİ</a>
                            </li>

                            <li><a href="{{ url('login') }}">ÇIKIŞ</a>
                            </li>

                        </ul>
                    </div>
            </div>
        </div>
    </div>
    <!--END HEADER SECTION-->


<!--Başvuru SECTION-->
<section class="product">
    <h2 class="product-category">BAŞVURULAR</h2>
    <button class="pre-btn"><img src="{{ asset('arrow.png') }}" alt=""></button>
    <button class="nxt-btn"><img src="{{ asset('arrow.png') }}" alt=""></button>
    <div class="product-container">
        <div class="product-card">
            <div class="product-image">

                <a href="{{ url('yazokulu') }}" class="myButton1">YAZ OKULU</a>

            </div>

        </div>
        <div class="product-card">
            <div class="product-image">
                <a href="{{ url('yataygecis') }}" class="myButton2">YATAY GEÇİŞ</a>
            </div>

        </div>
        <div class="product-card">
            <div class="product-image">
                <a href="{{ url('dgs') }}" class="myButton3">DGS</a>
            </div>

        </div>
        <div class="product-card">
            <div class="product-image">
                <a href="{{ url('cap') }}" class="myButton4">ÇAP</a>
            </div>

        </div>
        <div class="product-card">
            <div class="product-image">
                <a href="{{ url('intibak') }}" class="myButton5">İNTİBAK</a>
            </div>



        </div>
    </div>

  </section>
   <script>
     const productContainers = [...document.querySelectorAll('.product-container')];
  const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
  const preBtn = [...document.querySelectorAll('.pre-btn')];

  productContainers.forEach((item, i) => {
      let containerDimensions = item.getBoundingClientRect();
      let containerWidth = containerDimensions.width;

      nxtBtn[i].addEventListener('click', () => {
          item.scrollLeft += containerWidth;
      })

      preBtn[i].addEventListener('click', () => {
          item.scrollLeft -= containerWidth;
      })
  })
   </script>

<!--End Başvuru SECTION-->


<div class="basvuru_bilgileri">
    <ul>
        <h2 class="product-category">BAŞVURULARIM</h2>
        <?php
           use Kreait\Firebase\Contract\Firestore;
           $firestore = app('firebase.firestore');
           $data = session()->get('userData');
           $appData = $firestore->database()->collection('Applications')->where('studentNum', '=', $data['studentNum']);
           $appData = $appData->documents();
        ?>
            @foreach ($appData as $app)
                <li>
                    <div class="bilgi_item">

                        <div class="bilgi_left">

                            <div class="ogrencibilgi">
                                <div class="ogrenciname">
                                    {{ $data['nameSurname'] }}
                                </div>
                                <div class="ogrencino">
                                    {{ $data['studentNum'] }}
                                </div>
                                <div class="basvurutipi">
                                    {{ $app->data()['category'] }}
                                </div>
                            </div>
                        </div>
                        <div class="bilgi_right">
                            <div class="btn btn_following">Başvuru {{ $app->data()['status'] }} </div>
                        </div>
                    </div>
                </li>
            @endforeach

    </ul>
</div>
</div>




<!-- FOOTER -->
<section class="wed-hom-footer">
    <div class="container">

        <div class="row wed-foot-link">



            </div>
            <div class="footer2">
                <h4>İLETİŞİM</h4>
                <p>Adres: Kocaeli Üniversitesi
                    Umuttepe Yerleşkesi
                    41001, İzmit/KOCAELİ</p>
                <p>Tel: <a href="#!">+90 (262) 303 10 00 <br>
                      +90 (262) 303 10 33
                </a></p>
                <p>Email: <a href="#!">kocaeliuniversitesi@hs01.kep.tr</a></p>
            </div>
            <div class="footer3">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3019.256256209971!2d29.919526615408323!3d40.82233467932012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cb5badf629fe45%3A0xc81fa849234e8755!2sKocaeli%20%C3%9Cniversitesi!5e0!3m2!1str!2str!4v1638960440026!5m2!1str!2str" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <br><br>
                <h4>© 2021 Kocaelİ Ünİversİtesİ. Bütün hakları saklıdır</h4>
            </div>
        </div>

    </div>
</section>
