<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view() {
        // return view('auth.login');
        return view('qrcode');

    }

    public function login(Request $request) {

        $user = User::find($request->id)->first();

            if (Auth::login($user)) {
                // session(['qrscanned' => 'Mehdi Yousuf']);

                return json_encode(['success' => true]);
            } elseif(Auth::user()){
                session(['qrscanned' => 'Mehdi Yousuf']);

                return json_encode(['success' => true]);

            }else {
                return json_encode(['error' => true]);

            }


    }

    public function saveQrScanned(Request $request) {
        return response()->json(['success' => true]);
    }



}
