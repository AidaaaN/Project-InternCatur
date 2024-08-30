<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'Login & Registration Form',
            'appTitle' => 'Persuratan'
        ];
        return view('login.index', $data);
    }
    public function check(Request $request)
    {
        // Validasi input dari request
        $postData = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        // Cek apakah autentikasi berhasil
        if (Auth::attempt([
            'email' => $postData['email'],
            'password' => $postData['password']
        ])) {
            // Jika login berhasil, regenerasi sesi untuk keamanan
            $request->session()->regenerate();

            // Periksa level pengguna
            if (Auth::user()->level === 'admin') {
                return response()->json([
                    'success' => true,
                    'redirect_url' => '/dashboard',
                    'message' => 'Login berhasil'
                ], 200);
            } else {
                // Jika pengguna bukan admin
                return response()->json([
                    'success' => false,
                    'message' => 'Anda tidak memiliki akses admin'
                ], 403); // 403 Forbidden lebih tepat daripada 401 Unauthorized di sini
            }
        } else {
            // Jika login gagal
            return response()->json([
                'success' => false,
                'message' => 'email atau password salah'
            ], 401);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->to('/login', 302);
    }
}