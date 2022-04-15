<!DOCTYPE html>
<title>Anasayfa</title>

<head>
	<title>KOÜ ADMİN PANELİ</title>

	<link rel="stylesheet" href="{{ asset('css/admin.css') }}" media="all" />

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700"
		rel="stylesheet">

</head>


</head>

<?php

use Kreait\Firebase\Contract\Firestore;
$firestore = app('firebase.firestore');
$applications = $firestore->database()->collection('Applications')->documents();

?>

<script>

</script>

<body>

	<div class="top-logo" data-spy="affix" data-offset-top="250">
		<div class="container1">
			<div class="row">
				<div class="main-menu">
					<div class="wed-logo">
						<a href="{{ url('admin') }}"><img src="koulogo.PNG" alt="" />
						</a>
					</div>
					<ul>
						<li><a href="{{ url('login') }}">ÇIKIŞ</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
	</div>



	<div id="apDiv5">

		<div>
			<div class="scroll-table-body">
				<table id="students">
					<tr>
						<th>Öğrenci Fotoğrafı</th>
						<th>Öğrenci Numarası</th>
						<th>Başvuru Türü</th>
						<th>Durumu</th>
						<th>Belgeler</th>
						<th>ONAYLA </th>
						<th>REDDET</th>
					</tr>
                    @foreach ($applications as $app)
                    <tr>
                        <?php
                        $studentData = $firestore->database()->collection('Students')->where('studentNum', '=', $app->data()['studentNum'])->documents();
                        foreach ($studentData as $data) {
                            $studentData = $data;
                        }
                        ?>
						<td>
                            <img style="height: 100px;" src="{{ $studentData->data()['photoUrl'] }}">
                        </td>
						<td>{{ $studentData->data()['studentNum'] }}</td>
						<td>{{ $app->data()['category'] }}</td>
						<td>{{ $app->data()['status'] }}</td>
						<td>
                            <ul>
                                @foreach ($app->data()['documents'] as $doc)
                                    <li>
                                        <a target="_blank" href="{{ $doc['path'] }}">{{ $doc['documentName'] }}</a>
                                    </li>
                                @endforeach
                            </ul>

                        </td>
                        <?php
                            // function onayla()
                            // {
                            //     $doc = $firestore->database()->collection('Applications')->document($app->id());
                            //     $doc->update([
                            //         ['path' => 'status', 'value' => 'Onaylandı']
                            //     ]);
                            //     url('admin');
                            // }
                            // function reddet(){
                            //     $doc = $firestore->database()->collection('Applications')->document($app->id());
                            //     $doc->update([
                            //         ['path' => 'status', 'value' => 'Reddedildi']
                            //     ]);
                            //     url('admin');
                            // }

                            ?>
                            <form action="{{ url('onayla') }}" action="POST" enctype="multipart/form-data">
                                @csrf
						<td>
                            <input type="text" name="data" value="{{ $app->id() }}" hidden>
							<button type="submit" class="btn-onay">Onayla</button>
						</td></form>
                        <form action="{{ url('reddet') }}" action="POST" enctype="multipart/form-data">
                        @csrf
						<td>
                            <input type="text" name="data" value="{{ $app->id() }}" hidden>
                            <button type="submit" class="btn-red">Reddet</button></td></form>
					</tr>
                    @endforeach
				</table>
			</div>
		</div>
	</div>
	<div id="apDiv1">
		<div class="sayfa"></div>



		<div id="apDiv15">
			<div id="apDiv16">&nbsp;&nbsp;&nbsp;Copyright © Kocaeli Üniversitesi 2022. Tüm hakları saklıdır </div>

			<div id="apDiv17">
				<div textalign="right" &nbsp;&nbsp;&copy;KOÜ BİLİŞİM SİSTEMLERİ MÜHENDİSLİĞİ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
				</div>
			</div>
		</div>

</body>

</html>
