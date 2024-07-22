<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function create(){
        $divisis = Divisi::whereBetween('id', [1, 9])->get();
        return view('helpDesk.modules.tickets.buattiket', compact('divisis'));
    }

    public function store(Request $request){
        $request->validate([
            'id_divisi' => 'required|exists:divisis,id',
            'judul_tiket' => 'required|max:100',
            'priority' => 'required|max:10',
            'attachment' => 'nullable|file',
            'deskripsi' => 'required|string',
        ],[
            'id_divisi.required' => '*pilih divisi',
            'id_divisi.exists' => 'P\*pilih divisi yang ada',
            'judul_tiket.required' => '*judul tiket harus diisi',
            'judul_tiket.max' => '*judul tiket maksimal 100 karakter',
            'priority.required' => '*pilih prioritas',
            'attachment.file' => '*attachment harus berupa file',
            'deskripsi.required' => '*deskripsi harus diisi',
        ]);

        // $user = Auth::guard('mahasiswa')->user()->id_mahasiswa;
        $user = auth()->guard('mahasiswa')->user();

        $tiket = new Tiket();
        $tiket->id_mahasiswa = $user->id;
        $tiket->id_divisi = $request->id_divisi;
        $tiket->judul_tiket = $request->judul_tiket;
        $tiket->priority = $request->priority;
        $tiket->deskripsi = $request->deskripsi;
        $tiket->attachment = $request->attachment;

        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('attachments');
            $tiket->attachment = $filePath;
        }

        $tiket->save();

        return redirect('/main')->with('ticket_id', $tiket->id);
    }

    public function index(){
        $user = auth()->guard('admin')->user();

        if ($user) {
            // Ambil tiket berdasarkan divisi admin yang sedang login
            $tickets = Tiket::where('id_divisi', $user->id_divisi)->with('divisi', 'mahasiswa')->orderBy('tanggal', 'desc')->paginate(10);
            return view('helpDesk.modules.admin.admins', compact('tickets'));
        } else {
            return redirect()->route('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }
    }

    public function showiframe(){
        return view('helpDesk.modules.tickets.iframe');
    }
}
