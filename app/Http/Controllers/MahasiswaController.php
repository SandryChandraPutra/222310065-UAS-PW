<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    // public function logn(Request $request){
    //     $request->validate([
    //         "email_mahasiswa" => "required|email:dns",
    //         "password" => "required",
    //     ]);

    //     if(Auth::attempt(['email_mahasiswa'=>$request->email_mahasiswa, 'password'=>$request->password], $request->filled(''))){
    //         // $request->session()->regenerate();

    //         return redirect()->intended('/main');
    //     }

    //     return back()->with('loginError', 'The provided credentials do not match our records.');
    // }

    // public function logn(Request $request)
    // {
    //     $credentials = $request->validate([
    //         "email_mahasiswa" => "required|email",
    //         "password" => "required",
    //     ]);

    //     if (Auth::guard('mahasiswa')->attempt(['email_mahasiswa' => $credentials['email_mahasiswa'], 'password' => $credentials['password']])) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('/main');
    //     }

    //     return back()->with('loginError', 'The provided credentials do not match our records.');
    // }

    // public function logout(Request $request){
    //     Auth::logout();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }

    public function registerMahasiswa(Request $request)
    {
        $request->validate([
            'email' => 'required|max:100',
            'password' => 'required|max:100',
            'nama_lengkap' => 'required|max:100',
            'npm' => 'required|max:15',
        ], [
            'email.required' => '*email tidak boleh kosong',
            'password.required' => '*password tidak boleh kosong',
            'nama_lengkap.required' => '*nama Lengkap tidak boleh kosong',
            'npm.required' => '*NPM tidak boleh kosong',
        ]);

        $mahasiswa = Mahasiswa::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'npm' => $request->npm,
        ]);

        Auth::guard('mahasiswa')->login($mahasiswa);

        return redirect('/main');
    }

    public function index()
    {
        $user = Auth::guard('mahasiswa')->user();  // Menggunakan guard mahasiswa
        $nama = $user->nama_lengkap;  // Pastikan kolom ini ada di tabel mahasiswas
        $email = $user->email;
        $npm = $user->npm;

        return view('helpDesk.modules.tickets.mainFrames', compact('nama', 'email', 'npm'));
    }

    // public function index()
    // {
    //     if (Auth::guard('mahasiswa')->check()) {
    //         $user = Auth::guard('mahasiswa')->user();
    //         dd($user);  // Debugging line to check if user is authenticated and their data
    //     }

    //     return view('helpDesk.modules.tickets.mainFrames');
    // }

    public function cekakun(){
        $user = Auth::guard('mahasiswa')->user();
        if($user){
            return redirect()->back()->with('checking', 'Nama: {{user()->nama_lengkap}}');
        }else{
            return redirect()->back()->with('error', 'Anda belum login');
        }
    }

    public function history(){
        $user = Auth::guard('mahasiswa')->user();
        if ($user) {
            $tickets = Tiket::where('id_mahasiswa', $user->id)->with('divisi', 'mahasiswa')->paginate(10);
            return view('helpDesk.modules.tickets.history', compact('tickets'));
        } else {
            return redirect()->route('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }
    }
}
