<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Storage;
use Kreait\Firebase\Contract\Auth;
use Google\Cloud\Storage\StorageClient;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Codedge\Fpdf\Fpdf\Fpdf;

class FileController extends Controller
{

    public function __construct(Storage $storage, Auth $auth)
    {
        $this->storage = $storage;
        $this->auth = $auth;
    }

    function strtoupper_tr($data) {
        $k=array('ı','i','ş','ö','ğ','ç','ü');
        $b=array('I','İ','Ş','Ö','Ğ','Ç','Ü');
        $data=str_replace($k,$b,$data);
        $data = strtoupper($data);
        return $data;
    }

    public function genPdfYatay(Request $req)
    {
        $pdf = new \setasign\Fpdi\Tfpdf\Fpdi();
        $pdf->addPage();
        $pdf->setSourceFile("pdf/yataygecis.pdf");
        $index = $pdf->importPage(1);
        $pdf->useTemplate($index);
        $pdf->AddFont('TNRoman', 'B', 'TTimesb.ttf', true);
        $pdf->setFont('TNRoman', 'B', 10);

        // Başvuru Türü için X işareti
        $tick = "X";
        $basvuruTur = $req->get('basvuruTur');
        if ($basvuruTur == "Kurum İçi Yatay Geçiş Başvurusu") $pdf->SetXY(97.5, 34.5);
        else if ($basvuruTur == "Kurumlararası Yatay Geçiş Başvurusu") $pdf->SetXY(169.5, 34.5);
        else if ($basvuruTur == "Mer. Yer. Puanı ile Yatay Geçiş Başvurusu") $pdf->SetXY(97.5, 42);
        else if ($basvuruTur == "Yurt Dışı Yatay Geçiş Başvurusu") $pdf->SetXY(169.5, 42);
        $pdf->Write(0, $tick);

        $nameSurname = session()->get('userData')['nameSurname'];
        $pdf->SetXY(52, 59);
        $pdf->Write(0, $nameSurname);
        $tcNo = session()->get('userData')['tcNo'];
        $pdf->SetXY(52, 65);
        $pdf->Write(0, $tcNo);
        $date = session()->get('userData')['birthDate'];
        $date = explode("/", $date);
        $pdf->SetXY(128, 65);
        $pdf->Write(0, $date[0]);
        $pdf->SetXY(137, 65);
        $pdf->Write(0, $date[1]);
        $pdf->SetXY(144, 65);
        $pdf->Write(0, $date[2]);
        $email = session()->get('userData')['email'];
        $pdf->SetXY(52, 72);
        $pdf->Write(0, $email);
        $tel = session()->get('userData')['tel'];
        $pdf->SetXY(52, 78);
        $pdf->Write(0, $tel);
        $address = session()->get('userData')['address'];
        $pdf->SetXY(52, 85);
        $pdf->Write(0, $address);

        // Öğrenime İlişkin Belgeler kısmı
        $currentUni = session()->get('userData')['email'];
        $pdf->SetXY(116, 102);
        $pdf->Write(0, $currentUni);
        $currentFac = "Teknoloji";
        $pdf->SetXY(116, 108.5);
        $pdf->Write(0, $currentFac);
        $currentDep = "Bilişim Sistemleri Müh.";
        $pdf->SetXY(116, 115.5);
        $pdf->Write(0, $currentDep);
        $ogretim = $req->get('ogretim');
        $ogretim == "1. Öğretim" ? $pdf->SetXY(77, 121.5) : $pdf->SetXY(114, 121.5);
        $pdf->Write(0, $tick);
        $grade = "3. Sınıf";
        $pdf->SetXY(152, 122.5);
        $pdf->Write(0, $grade);
        $disiplin = $req->get('disiplin');
        $pdf->SetXY(116, 130);
        $pdf->Write(0, $disiplin);
        $ort = $req->input('ort');
        $pdf->SetXY(116, 136);
        $pdf->Write(0, $ort);
        $sNumber = $req->input('sNumber');
        $pdf->SetXY(128, 143);
        $pdf->Write(0, $sNumber);
        $yerlestirmeYil = $req->input('yerlestirmeYil');
        $pdf->SetXY(153, 149);
        $pdf->Write(0, $yerlestirmeYil);
        $puanTur = $req->input('puanTur');
        $pdf->SetXY(153, 156);
        $pdf->Write(0, $puanTur);
        $yabanciPuan = $req->input('yabanciPuan');
        $pdf->SetXY(41, 165.5);
        $pdf->Write(0, $yabanciPuan);

        // Adayın başvurduğu bölüme ilişkin kısım
        $bFac = $req->get('bFac');
        $pdf->SetXY(78, 181.5);
        $pdf->Write(0, $bFac);
        $bDep = $req->get('bDep');
        $pdf->SetXY(78, 188);
        $pdf->Write(0, $bDep);
        $bOgr = $req->get('bOgr');
        $bOgr == "1. Öğretim" ? $pdf->SetXY(77, 194.5) : $pdf->SetXY(111, 194.5);
        $pdf->Write(0, $tick);
        $bPuan = $req->input('bPuan');
        $pdf->SetXY(41, 204.5);
        $pdf->Write(0, $bPuan);


        $pdf->Output();
        exit;
    }

    public function genPdfCap(Request $req)
    {
        $pdf = new \setasign\Fpdi\Tfpdf\Fpdi();
        $pdf->addPage();
        $pdf->setSourceFile("pdf/cap_basvuru.pdf");
        $index = $pdf->importPage(1);
        $pdf->useTemplate($index);
        $pdf->AddFont('TNRoman', 'B', 'TTimesb.ttf', true);
        $pdf->setFont('TNRoman', 'B', 10);
        $pdf->SetXY(80, 50);
        $fac = $req->input('fac');
        $pdf->Write(0, $fac);
        $pdf->SetXY(68, 54);
        $dep = $req->input('dep');
        $pdf->Write(0, $dep);
        $pdf->SetXY(25, 68);
        $pdf->Write(0, $fac);
        $pdf->SetXY(70, 68);
        $pdf->Write(0, $dep);
        $studentNum = session()->get('userData')['studentNum'];
        $pdf->SetXY(25, 72);
        $pdf->Write(0, $studentNum);
        $nameSurname = session()->get('userData')['nameSurname'];
        $pdf->SetXY(75, 72);
        $pdf->Write(0, $nameSurname);
        $pdf->SetXY(75, 86);
        $pdf->Write(0, $dep);

        $tick = "X";
        $ogretim = $req->get('ogretim');
        $ogretim == "1. Öğretim" ? $pdf->SetXY(36, 126) : $pdf->SetXY(65.5, 126);
        $pdf->Write(0, $tick);

        $address = session()->get('userData')['address'];
        $pdf->SetXY(40, 145);
        $pdf->Write(0, $address);

        $tel = session()->get('userData')['tel'];
        $pdf->SetXY(40, 154.5);
        $pdf->Write(0, $tel);

        $email = session()->get('userData')['email'];
        $pdf->SetXY(40, 159.5);
        $pdf->Write(0, $email);

        $pdf->Output();
        exit;
    }

    public function genPdfYazOkulu(Request $req)
    {
        $pdf = new \setasign\Fpdi\Tfpdf\Fpdi();
        $pdf->addPage();
        $pdf->setSourceFile("pdf/yazokulu.pdf");
        $index = $pdf->importPage(1);
        $pdf->useTemplate($index);
        $pdf->AddFont('TNRoman', 'B', 'TTimesb.ttf', true);
        $pdf->setFont('TNRoman', 'B', 10);
        $pdf->SetXY(73, 41);
        $fac = $req->get('fac');
        $pdf->Write(0, $this->strtoupper_tr($fac));
        $pdf->SetXY(56, 46);
        $dep = $req->get('dep');
        $pdf->Write(0, $this->strtoupper_tr($dep));
        $pdf->SetXY(30, 51);
        $pdf->Write(0, $fac);
        $pdf->SetXY(73, 51);
        $pdf->Write(0, $dep);
        $studentNum = session()->get('userData')['studentNum'];
        $pdf->SetXY(118, 51);
        $pdf->Write(0, $studentNum);
        $nameSurname = session()->get('userData')['nameSurname'];
        $pdf->SetXY(155, 51);
        $pdf->Write(0, $nameSurname);
        $danisman = $req->input('danisman');
        $pdf->SetXY(98, 91);
        $pdf->Write(0, $danisman);
        $address = session()->get('userData')['address'];
        $pdf->SetXY(98, 96);
        $pdf->Write(0, $address);
        $tel = session()->get('userData')['tel'];
        $pdf->SetXY(98, 100);
        $pdf->Write(0, $tel);
        $email = session()->get('userData')['email'];
        $pdf->SetXY(98, 105);
        $pdf->Write(0, $email);
        $uni = $req->input('uni');
        $pdf->SetXY(98, 114);
        $pdf->Write(0, $uni);
        $dates = $req->input('dates');
        $pdf->SetXY(98, 119);
        $pdf->Write(0, $dates);

        $sDersBir = $req->input('sDersBir');
        $pdf->SetXY(78, 142);
        $pdf->Write(0, $sDersBir);
        $sTBir = $req->input('sTBir');
        $pdf->SetXY(150, 142);
        $pdf->Write(0, $sTBir);
        $sUBir = $req->input('sUBir');
        $pdf->SetXY(162, 142);
        $pdf->Write(0, $sUBir);
        $sLBir = $req->input('sLBir');
        $pdf->SetXY(172, 142);
        $pdf->Write(0, $sLBir);
        $sABir = $req->input('sABir');
        $pdf->SetXY(183, 142);
        $pdf->Write(0, $sABir);

        $sDersIki = $req->input('sDersIki');
        $pdf->SetXY(78, 152);
        $pdf->Write(0, $sDersIki);
        $sTIki = $req->input('sTIki');
        $pdf->SetXY(150, 152);
        $pdf->Write(0, $sTIki);
        $sUIki = $req->input('sUIki');
        $pdf->SetXY(162, 152);
        $pdf->Write(0, $sUIki);
        $sLIki = $req->input('sLIki');
        $pdf->SetXY(172, 152);
        $pdf->Write(0, $sLIki);
        $sAIki = $req->input('sAIki');
        $pdf->SetXY(183, 152);
        $pdf->Write(0, $sAIki);

        $sDersUc = $req->input('sDersUc');
        $pdf->SetXY(78, 162);
        $pdf->Write(0, $sDersUc);
        $sTUc = $req->input('sTUc');
        $pdf->SetXY(150, 162);
        $pdf->Write(0, $sTUc);
        $sUUc = $req->input('sUUc');
        $pdf->SetXY(162, 162);
        $pdf->Write(0, $sUUc);
        $sLUc = $req->input('sLUc');
        $pdf->SetXY(172, 162);
        $pdf->Write(0, $sLUc);
        $sAUc = $req->input('sAUc');
        $pdf->SetXY(183, 162);
        $pdf->Write(0, $sAUc);


        $aDersBir = $req->input('aDersBir');
        $pdf->SetXY(95, 190);
        $pdf->Write(0, $aDersBir);
        $aTBir = $req->input('aTBir');
        $pdf->SetXY(150, 190);
        $pdf->Write(0, $aTBir);
        $aUBir = $req->input('aUBir');
        $pdf->SetXY(162, 190);
        $pdf->Write(0, $aUBir);
        $aLBir = $req->input('aLBir');
        $pdf->SetXY(172, 190);
        $pdf->Write(0, $aLBir);
        $aABir = $req->input('aABir');
        $pdf->SetXY(183, 190);
        $pdf->Write(0, $aABir);

        $aDersIki = $req->input('aDersIki');
        $pdf->SetXY(95, 208);
        $pdf->Write(0, $aDersIki);
        $aTIki = $req->input('aTIki');
        $pdf->SetXY(150, 208);
        $pdf->Write(0, $aTIki);
        $aUIki = $req->input('aUIki');
        $pdf->SetXY(162, 208);
        $pdf->Write(0, $aUIki);
        $aLIki = $req->input('aLIki');
        $pdf->SetXY(172, 208);
        $pdf->Write(0, $aLIki);
        $aAIki = $req->input('aAIki');
        $pdf->SetXY(183, 208);
        $pdf->Write(0, $aAIki);

        $aDersUc = $req->input('aDersUc');
        $pdf->SetXY(95, 223);
        $pdf->Write(0, $aDersUc);
        $aTUc = $req->input('aTUc');
        $pdf->SetXY(150, 223);
        $pdf->Write(0, $aTUc);
        $aUUc = $req->input('aUUc');
        $pdf->SetXY(162, 223);
        $pdf->Write(0, $aUUc);
        $aLUc = $req->input('aLUc');
        $pdf->SetXY(172, 223);
        $pdf->Write(0, $aLUc);
        $aAUc = $req->input('aAUc');
        $pdf->SetXY(183, 223);
        $pdf->Write(0, $aAUc);

        $pdf->Output();
        exit;
    }
}
