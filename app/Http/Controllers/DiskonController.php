<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Diskon;
use Illuminate\View\View;
use Illuminate\Http\Request;
use illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

class DiskonController extends Controller
{

    public function index(): view
    {
        $diskons = Diskon::with(['toko'])->get();
        return view('diskon.diskon', compact('diskons'));
    }


    public function create()
    {
        $tokos = Toko::all();
        return view('diskon.tambah', compact('tokos'));
    }

    public function edit($id) :View {
        $diskon = diskon::findOrFail($id);
        $tokos = Toko::all();
        return view('diskon/ubah', compact('diskon', 'tokos'));
    }

    public function update(Request $request, $id) :RedirectResponse
    {
        $request->validate([
            'nama_diskon' => 'required|string|max:255',
            'jumlah_barang' => 'required',
            'presentase' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'toko_id' => 'required|exists:tokos,id',
        ]);

        $diskons = Diskon::findOrFail($id);
        $diskons->update([
            'nama_diskon' => $request->nama_diskon,
            'jumlah_barang' => $request->jumlah_barang,
            'presentase' => $request->presentase,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'toko_id' => $request->toko_id
        ]);

        return redirect()->route('diskon.index')->with(['success' => 'berhasil']);

    }

    public function delete($id){

        $diskon = Diskon::findOrFail($id);
        $diskon->delete();
        return redirect()->route('diskon.index')->with(['success' => 'berhasil']);
    }

    public function store(Request $request) : RedirectResponse
    {
        // Validasi input
        $request->validate([
            'nama_diskon' => 'required|string|max:255',
            'jumlah_barang' => 'required',
            'presentase' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'toko_id' => 'required|exists:tokos,id',
        ]);

        Diskon::create([
            'nama_diskon' => $request->nama_diskon,
            'jumlah_barang' => $request->jumlah_barang,
            'presentase' => $request->presentase,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'toko_id' => $request->toko_id
        ]);

        return redirect()->route('diskon.index')->with(['success' => 'berhasil']);
    }

    public function diskon(){
        $diskon = Diskon::find(1);
        return $diskon;
    }
    public function get_all(){
        $diskon = Diskon::with('toko')->get();
        return $diskon;
    }


    //api

    public function indexApi() :JsonResponse
    {
        $diskons = Diskon::with(['toko'])->get();
        return response()->json(['data'=>$diskons]);
    }

    public function getSingleData($id) :JsonResponse {
        $diskon = diskon::findOrFail($id);
        $tokos = Toko::all();
        $data = [
            'diskon' => $diskon,
            'tokos' => $tokos,
        ];
        return response()->json(['data'=>$data]);
    }

    public function updateApi(Request $request, $id) :JsonResponse
    {
        $request->validate([
            'nama_diskon' => 'required|string|max:255',
            'jumlah_barang' => 'required',
            'presentase' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'toko_id' => 'required|exists:tokos,id',
        ]);

        $diskons = Diskon::findOrFail($id);
        $diskons->update([
            'nama_diskon' => $request->nama_diskon,
            'jumlah_barang' => $request->jumlah_barang,
            'presentase' => $request->presentase,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'toko_id' => $request->toko_id
        ]);

        return response()->json(['success' => 'berhasil']);

    }



    public function deleteApi($id){

        $diskon = Diskon::findOrFail($id);
        $diskon->delete();
        return response()->json(['success' => 'berhasil']);
    }

    public function storeApi(Request $request) : JsonResponse
    {
        // Validasi input
        $request->validate([
            'nama_diskon' => 'required|string|max:255',
            'jumlah_barang' => 'required',
            'presentase' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'toko_id' => 'required|exists:tokos,id',
        ]);

        Diskon::create([
            'nama_diskon' => $request->nama_diskon,
            'jumlah_barang' => $request->jumlah_barang,
            'presentase' => $request->presentase,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'toko_id' => $request->toko_id
        ]);

        return response()->json(['success' => 'berhasil']);
    }

}
