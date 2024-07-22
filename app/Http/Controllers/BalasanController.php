<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Balasan;
use App\Models\Mahasiswa;
use App\Models\Tiket;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class BalasanController extends Controller
{
    // public function checkticket1(Request $request){
    //     $email = $request->input('email');
    //     $id_tiket = $request->input('id_tiket');

    //     $user = auth()->guard('mahasiswa')->user()->email;

    //         $balasans = Balasan::where('id_tiket', $id_tiket)->where('email_pengirim',  $email)->get();
    //         if ($balasans) {
    //             if ($balasans->isEmpty()) {
    //                 return view('helpDesk.modules.tickets.nobalasan');
    //             } else {
    //                 return view('helpDesk.modules.tickets.reply', compact('balasans'));
    //             }
    //         }else{
    //             return redirect()->route('check-ticket')->with('error', 'Tiket tidak ditemukan atau ID tiket salah');
    //     }
    // }
    public function checkticket(Request $request)
    {
        // Mendapatkan mahasiswa yang sedang login
        $user = auth()->guard('mahasiswa')->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Menggunakan email dari pengguna yang sedang login
        $email = $user->email;
        $id_tiket = $request->input('id_tiket');

        // Validasi input
        $request->validate([
            'id_tiket' => 'required|integer'
        ]);

        // Cek tiket berdasarkan ID tiket dan email mahasiswa yang login
        $ticket = Tiket::where('id', $id_tiket)
                        ->whereHas('mahasiswa', function($query) use ($email) {
                            $query->where('email', $email);
                        })
                        ->first();

        if ($ticket) {
            // Ambil balasan berdasarkan ID tiket
            $balasans = Balasan::where('id_tiket', $id_tiket)->where('email_pengirim', '!=',$email)->get();

            if ($balasans->isEmpty()) {
                return view('helpDesk.modules.tickets.nobalasan');
            } else {
                return view('helpDesk.modules.tickets.reply', compact('balasans', 'ticket'));
            }
        } else {
            return redirect()->route('check-ticket')->with('error', 'Tiket tidak ditemukan atau ID tiket salah untuk email ini.');
        }
    }

    public function checkticket2(Request $request, Tiket $tiket)
    {
        $email = $request->input('email');
        $id_tiket = $request->input('id_tiket');

        $user = auth()->guard('mahasiswa')->user();

        if (!$user) {
            return redirect()->route('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $request->validate([
            'email' => 'required|email|exists:mahasiswas,email',
            'id_tiket' => 'required|integer'  // Pastikan ada tabel 'tikets'
        ]);

        $ticket = Tiket::where('id', $id_tiket)->first();

        if ($ticket) {
            $balasans = Balasan::where('id_tiket', $id_tiket)->where('email_pengirim', '!=', $email)->orderBy('tanggal', 'desc')->get();

            if ($balasans->isEmpty()) {
                return view('helpDesk.modules.tickets.nobalasan');
            } else {
                return view('helpDesk.modules.tickets.reply', compact('balasans', 'ticket'));
            }
        } else {
            return redirect()->route('check-ticket')->with('error', 'Tiket tidak ditemukan atau ID tiket salah atau email tidak cocok');
        }
    }


    public function showCheckticketForm(){
        return view('helpDesk.modules.tickets.cekticket');
    }

    public function balasAdmin(Request $request){
        $request->validate([
            'balasan' => 'required',
            'cek' => 'required',
        ]);

        $user = auth()->guard('mahasiswa')->user();
        $tiket = Tiket::where('id_mahasiswa', $user->id)->where('id_divisi', )->first();

        $balasan = new Balasan();
        $balasan->email_pengirim = $user->email;
        $balasan->balasan = $request->balasan;
        $balasan->id_tiket = $request->cek;

        $balasan->save();

        return redirect('/cek')->with('success', 'Balasan berhasil dikirim');

    }

    public function balasMahasiswa(Request $request){
        $request->validate([
            'balasan' => 'required',
            'penerima' => 'required',
            'tujuan' => 'required',
        ]);

        $user = auth()->guard('admin')->user();

        $balasan = new Balasan();
        $balasan->email_pengirim = $user->email;
        $balasan->balasan = $request->balasan;
        $balasan->id_tiket = $request->tujuan;

        $balasan->save();

        return redirect()->back()->with('success', 'Balasan berhasil dikirim');
    }

    public function showResponses(Request $request)
    {
        // $request->validate([
        //     'tujuan' => 'required',
        // ]);
        $id_tiket = 1;
        $adminEmails = Admin::pluck('email');
        $user = auth()->guard('admin')->user();
        $mahasiswa = auth()->guard('mahasiswa')->user();
        $balasan = Balasan::where('id_tiket', $id_tiket)
                          ->whereNotIn('email_pengirim', $adminEmails)
                          ->get();
        return view('helpDesk.modules.tickets.iframe', compact('balasan'));
    }

}
