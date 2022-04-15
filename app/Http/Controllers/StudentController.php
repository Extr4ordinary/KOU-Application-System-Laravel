<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Storage;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Contract\Firestore;
use Google\Cloud\Firestore\V1\FirestoreClient;
use Kreait\Firebase\Exception\FirebaseException;

class StudentController extends Controller
{
    public function __construct(Storage $storage, Auth $auth, Firestore $firestore)
    {
        $this->storage = $storage;
        $this->auth = $auth;
        $this->db = $firestore;
    }

    public function registerAuth(Request $req)
    {
        // Connection
        $conn = $this->db->database()->collection('Students')->document($req->input('studentNum'));

        // Upload Photo
        $photoUrl = $this->uploadPhoto($req->file('studentImage'), $req->input('studentNum'));

        // Send user data
        $res = $conn->set([
            "studentNum" => $req->input('studentNum'),
            "password" => $req->input('pass'),
            "nameSurname" => $req->input('name') . $req->input('surname'),
            "tcNo" => $req->input('tcNo'),
            "birthDate" => $req->get('birthDate'),
            "email" => $req->input('email'),
            "tel" => $req->input('tel'),
            "address" => $req->input('address'),
            "grade" => $req->input('grade'),
            "university" => $req->input('university'),
            "fac" => $req->input('fac'),
            "dep" => $req->input('dep'),
            "photoUrl" => $photoUrl
        ]);

        // Create account for authentication
        $this->createAccount($req->input('email'), $req->input('pass'));
        return view('giris');
    }

    public function uploadPhoto($photoRef, $path)
    {
        $this->storage->getStorageClient();
        $bucket = $this->storage->getBucket();
        $photoRef->move('temp/', $photoRef->getClientOriginalName());
        $file = fopen('temp/'.$photoRef->getClientOriginalName(), 'r');
        $uploadOpt = array_filter([
            'name' => $path."/".$photoRef->getClientOriginalName(),
            'predefinedAcl' => 'publicRead'
        ]);
        $obj = $bucket->upload($file, $uploadOpt);
        return "https://{$bucket->name()}.storage.googleapis.com/{$obj->name()}";
    }

    public function createAccount($email, $pass)
    {
        $user = [
            'email' => $email,
            'emailVerified' => false,
            'password' => $pass,
            'displayName' => '',
            'disabled' => false,
        ];
        $this->auth->createUser($user);
    }

    public function loginAuth(Request $req)
    {
        $conn = $this->db->database()->collection('Students')->where('studentNum', '=', $req->input('studentNum'));
        $docs = $conn->documents();
        foreach($docs as $doc) {
            if ($doc->exists()) {
                if($doc->data()['studentNum'] == 'admin' && $doc->data()['password'] == '112233')
                {
                    session()->put('userData', $doc->data());
                    return view('admin');
                } else {
                    $isLoggedIn = $this->checkUser($doc->data()['email'], $req->input('pass'), $doc);
                    if($isLoggedIn == true) {
                        session()->put('userData', $doc->data());
                        return view('anasayfa');
                    }
                }
            } else {
                dd('Giriş yapılamadı');
            }
        }
    }

    public function checkUser($email, $pass, $user)
    {
        try {
            $result = $this->auth->signInWithEmailAndPassword($email, $pass);
            return true;
        } catch (FirebaseException $e) {
            // $error = $e->getMessage();
            // if ($error == "INVALID_PASSWORD"){
            //     dd('Hatalı şifre');
            // }
            return false;
        }


    }

    public function passwordReset(Request $req)
    {
        $email = $req->input('email');
        try {
            $this->auth->sendPasswordResetLink($email);
            echo '<script>alert("Şifre sıfırlama linki gönderildi")</script>';
            return view('giris');
        } catch (\Throwable $th) {
            echo '<script>alert("E-Mail Bulunamadı")</script>';
            return view('giris');
        }
    }
}
