<!DOCTYPE html>
<html lang="en">

<head>
    <title>KOCAELİ ÜNİVERSİTESİ Öğrenci</title>
    <!-- META TAGS -->
    <meta charset="utf-8">


    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ALL CSS FILES -->

    <link href="{{ asset('css/profil.css') }}" rel="stylesheet" />

</head>

<body>
    <!--HEADER SECTION-->
    <?php $data = session()->get('userData'); ?>

    <!-- LOGO AND MENU SECTION -->
    <div class="top-logo" data-spy="affix" data-offset-top="250">
        <div class="container1">
            <div class="row">


                    <div class="main-menu">
                        <div class="wed-logo">
                            <a href="{{ url('anasayfa') }}"><img src="{{ asset('koulogo.PNG') }}" alt="" />
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

    <div class="wrapper">
        <div class="left">
            <img src="{{ $data['photoUrl'] }}"
            alt="user" width="100">
            <h4>{{ $data['nameSurname'] }}</h4>
             <p>{{ $data['dep'] }}</p>
             <p>{{$data['grade']}}. Sınıf</p>

        </div>
        <div class="right">
            <div class="info">
                <h3>ÖĞRENCİ PROFİLİ</h3>
                <div class="info_data">
                     <div class="data">
                        <h4>Bölüm</h4>
                        <p>{{ $data['dep'] }}</p>
                     </div>
                     <div class="data">
                       <h4>Okul Numarası</h4>
                        <p>{{ $data['studentNum'] }}</p>
                  </div>
                </div>
            </div>

          <div class="projects">
                <h3>İLETİŞİM BİLGİLERİ</h3>
                <div class="projects_data">
                     <div class="data">
                        <h4>E-MAİL</h4>
                        <p>{{ $data['email'] }}</p>
                     </div>
                     <div class="data">
                       <h4>Telefon Numarası</h4>
                        <p>{{ $data['tel'] }}</p>
                  </div>
                </div>
            </div>


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
