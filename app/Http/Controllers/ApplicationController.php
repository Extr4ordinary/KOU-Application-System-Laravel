<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Storage;
use Kreait\Firebase\Contract\Firestore;

class ApplicationController extends Controller
{
    public function __construct(Firestore $db, Storage $storage)
    {
        $this->storage = $storage;
        $this->db = $db;
    }

    public function uploadFile($uploadedFile, $path)
    {
        $this->storage->getStorageClient();
        $bucket = $this->storage->getBucket();
        $uploadedFile->move('temp/', $uploadedFile->getClientOriginalName());
        $file = fopen('temp/'.$uploadedFile->getClientOriginalName(), 'r');
        $uploadOpt = array_filter([
            'name' => "app-".$path."/".$uploadedFile->getClientOriginalName(),
            'predefinedAcl' => 'publicRead'
        ]);
        $obj = $bucket->upload($file, $uploadOpt);
        return "https://{$bucket->name()}.storage.googleapis.com/{$obj->name()}";
    }

    public function yazOkulu(Request $req)
    {
        $conn = $this->db->database()->collection('Applications')->newDocument();

        $appPath = explode("/",$conn->name())[6];

        $res = $conn->set([
            "studentNum" => session()->get('userData')['studentNum'],
            "status" => "Beklemede",
            "category" => "Yaz Okulu",
            "documents" => [
                [
                    "documentName" => "Taban Puanları",
                    "path" => $this->uploadFile($req->file('taban'), $appPath)
                ],
                [
                    "documentName" => "Karşı Kurum Ders Bilgileri",
                    "path" => $this->uploadFile($req->file('ders_icerik'), $appPath)
                ],
                [
                    "documentName" => "Transkript",
                    "path" => $this->uploadFile($req->file('transkript'), $appPath)
                ],
                [
                    "documentName" => "Başvuru Belgesi",
                    "path" => $this->uploadFile($req->file('basvuru_belge'), $appPath)
                ]
            ],
        ]);

        return view('anasayfa')->with('msg', 'success');
    }

    public function intibak(Request $req)
    {
        $conn = $this->db->database()->collection('Applications')->newDocument();

        $appPath = explode("/",$conn->name())[6];

        $res = $conn->set([
            "studentNum" => session()->get('userData')['studentNum'],
            "status" => "Beklemede",
            "category" => "İntibak",
            "documents" => [
                [
                    "documentName" => "Uyum-İntibak Formu",
                    "path" => $this->uploadFile($req->file('uyumform'), $appPath)
                ],
                [
                    "documentName" => "Transkript",
                    "path" => $this->uploadFile($req->file('transkript'), $appPath)
                ],
                [
                    "documentName" => "İkinci Anadal ve Öğrenci Puanı",
                    "path" => $this->uploadFile($req->file('ikinciAnadal'), $appPath)
                ]
            ],
        ]);

        return view('anasayfa')->with('msg', 'success');
    }

    public function dgs(Request $req)
    {
        $conn = $this->db->database()->collection('Applications')->newDocument();

        $appPath = explode("/",$conn->name())[6];

        $res = $conn->set([
            "studentNum" => session()->get('userData')['studentNum'],
            "status" => "Beklemede",
            "category" => "DGS",
            "documents" => [
                [
                    "documentName" => "Transkript",
                    "path" => $this->uploadFile($req->file('transkript'), $appPath)
                ],
                [
                    "documentName" => "Ders İçerikleri",
                    "path" => $this->uploadFile($req->file('ders_icerik'), $appPath)
                ],
                [
                    "documentName" => "Yabancı Dil Yeterlilik",
                    "path" => $this->uploadFile($req->file('yabancidil'), $appPath)
                ],
                [
                    "documentName" => "Sağlık Raporu Belgesi",
                    "path" => $this->uploadFile($req->file('saglikraporu'), $appPath)
                ]
            ],
        ]);

        return view('anasayfa')->with('msg', 'success');
    }

    public function cap(Request $req)
    {
        $conn = $this->db->database()->collection('Applications')->newDocument();

        $appPath = explode("/",$conn->name())[6];

        $res = $conn->set([
            "studentNum" => session()->get('userData')['studentNum'],
            "status" => "Beklemede",
            "category" => "ÇAP",
            "documents" => [
                [
                    "documentName" => "Transkript",
                    "path" => $this->uploadFile($req->file('transkript'), $appPath)
                ],
                [
                    "documentName" => "İkinci Anadal ve Öğrenci Puanı",
                    "path" => $this->uploadFile($req->file('ikinciAnadal'), $appPath)
                ],
                [
                    "documentName" => "Başvuru Belgesi",
                    "path" => $this->uploadFile($req->file('basvuruBelgesi'), $appPath)
                ]
            ],
        ]);

        return view('anasayfa')->with('msg', 'success');
    }

    public function yataygecis(Request $req)
    {
        $conn = $this->db->database()->collection('Applications')->newDocument();

        $appPath = explode("/",$conn->name())[6];

        $res = $conn->set([
            "studentNum" => session()->get('userData')['studentNum'],
            "status" => "Beklemede",
            "category" => "Yatay Geçiş",
            "documents" => [
                [
                    "documentName" => "Öğrenci Belgesi",
                    "path" => $this->uploadFile($req->file('ogrenciBelgesi'), $appPath)
                ],
                [
                    "documentName" => "ÖSYM Sınav Sonuç Belgesi",
                    "path" => $this->uploadFile($req->file('sinavSonucBelgesi'), $appPath)
                ],
                [
                    "documentName" => "ÖSYM Yerleştirme Belgesi",
                    "path" => $this->uploadFile($req->file('yerlestirmeBelgesi'), $appPath)
                ],
                [
                    "documentName" => "Transkript",
                    "path" => $this->uploadFile($req->file('transkript'), $appPath)
                ],
                [
                    "documentName" => "Disiplin Cezası Yoktur Belgesi",
                    "path" => $this->uploadFile($req->file('disiplinBelgesi'), $appPath)
                ],
                [
                    "documentName" => "Ders İçerikleri",
                    "path" => $this->uploadFile($req->file('dersIcerikleri'), $appPath)
                ],
                [
                    "documentName" => "Yabancı Dil Yeterlilik Belgesi",
                    "path" => $this->uploadFile($req->file('yabanciDil'), $appPath)
                ],
                [
                    "documentName" => "%10 Belgesi",
                    "path" => $this->uploadFile($req->file('onBelgesi'), $appPath)
                ],
                [
                    "documentName" => "Yurtdışı Sonuç Belgesi",
                    "path" => $this->uploadFile($req->file('yurtdisiBelgesi'), $appPath)
                ],
                [
                    "documentName" => "Başvuru Belgesi",
                    "path" => $this->uploadFile($req->file('basvuruBelgesi'), $appPath)
                ]
            ],
        ]);

        return view('anasayfa')->with('msg', 'success');
    }

    public function onayla(Request $req)
    {
        $data = $req->input('data');
        $conn = $this->db->database()->collection('Applications')->document($data);
        $conn->update([
            ['path' => 'status', 'value' => 'Onaylandı']
        ]);
        return view('admin')->with('message', 'success');
    }

    public function reddet(Request $req)
    {
        $data = $req->input('data');
        $conn = $this->db->database()->collection('Applications')->document($data);
        $conn->update([
            ['path' => 'status', 'value' => 'Reddedildi']
        ]);
        return view('admin')->with('message', 'success');
    }
}
