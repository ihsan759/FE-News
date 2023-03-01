<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $response = HttpClient::fetch(
            "POST",
            "login",
            $request->all()
        );
        if ($response['status'] == true) {

            session(['token' => $response['data']['auth']['token']]);
            return redirect()->route('home')->with(['message' =>  $response['message']]);
        } else {
            return redirect()->back()->with(['message' => $response['message']]);
        }
    }

    public function index()
    {
        $title = "Halaman Login";
        return view('auth.login', compact('title'));
    }

    public function logout()
    {
        $response = HttpClient::fetch(
            "GET",
            "logout"
        );

        return redirect()->route('/')->with(['success' => 'Anda berhasil logout']);
    }

    public function update(Request $request)
    {
        $response = HttpClient::fetch(
            "POST",
            "update",
            $request->all()
        );

        if ($response['status'] == true) {
            return redirect()->back()->with(['message' => $response['message']]);
        } else {
            return redirect()->back()->with(['alert' => $response['message']['password'][0]]);
        }
    }
}
