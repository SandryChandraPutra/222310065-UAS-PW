<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Balasan;
use App\Models\Divisi;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function create(){
        $divisis = Divisi::whereBetween('id', [1, 9])->get();
        return view('helpDesk.layouts.auth.adminRegis', compact('divisis'));
    }

    public function show(){
        return view('helpDesk.layouts.auth.loginAdmin');
    }

    public function registerAdmin(Request $request){
        $request->validate([
            'email' => 'required|max:100',
            'password' => 'required|max:100',
            'nama_admin' => 'required|max:100',
            'id_divisi' => 'required|exists:divisis,id',
        ], [
            'email.required' => '*email tidak boleh kosong',
            'password.required' => '*password tidak boleh kosong',
            'nama_admin.required' => '*nama Admin tidak boleh kosong',
            'id_divisi.required' => '*divisi tidak boleh kosong',
        ]);

        $admin = Admin::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama_admin' => $request->nama_admin,
            'id_divisi' => $request->id_divisi,
        ]);

        Auth::guard('admin')->login($admin);

        return redirect('/admins');
    }

    public function destroy(Tiket $tiket){
        $tiket->delete($tiket->id);
        return redirect('/admins')->with('success', 'Data berhasil dihapus!');
    }

    // public function getDataById(Tiket $tiket, Balasan $balasan){
    //     return view("helpDesk.modules.admin.detail", [
    //     "data" => $tiket], ["balasan"=>$balasan]);
    // }
    public function getDataByID($id)
    {
        // Ambil data tiket berdasarkan ID
        $ticket = Tiket::findOrFail($id);

        // Ambil semua balasan yang berhubungan dengan tiket ini
        $adminEmails = Admin::pluck('email');
        $balasans = Balasan::where('id_tiket', $id)->whereNotIn('email_pengirim', $adminEmails)->get();

        // Kirim data tiket dan balasan ke view
        return view('helpDesk.modules.admin.detail', compact('ticket', 'balasans'));
    }

    public function edit(Tiket $tiket)
    {
        return view('helpDesk.modules.tickets.edit', ["tiket" => $tiket]);
    }

    public function update(Request $request, Tiket $tiket){
        $validateData = $request->validate([
            "status" => "required|max:50",
            "priority" => "required|max:12",
        ]);

        $tiket->where("id", $tiket->id)->update($validateData) ;

        return redirect('/admins')->with('success', 'Data sukses diupdate!');
    }
}
