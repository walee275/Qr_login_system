<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller

{

    public function index(){



    }
    public function check_qr(Request $request){

        $qr_code = $request->QrCode;
        $user = User::where('qr_code', $qr_code)->first();
        if (Auth::login($user)) {
            // session(['qrscanned' => 'Mehdi Yousuf']);

            return json_encode(['success' => true, 'user' => $user]);
        } elseif(Auth::user()){

            return json_encode(['success' => true, 'user' => Auth::user()]);

        }else {
            return json_encode(['error' => true]);

        }
        // return json_encode($user);

    }

}
