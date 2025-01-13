<?php

namespace App\Http\Controllers;
use App\Models\Toko;
use App\Models\Pajak;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Resources\PajakResource;
use Illuminate\Http\RedirectResponse;

class PajakController extends Controller
{

    public function index()
    {
        $pajaks = Pajak::with(['toko'])->get();
        return view('pajak.pajak', compact('pajaks'));

        // json
        // return PajakResource::collection(Pajak::get());
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'presentase' => 'required',
            'toko_id' => 'required|exists:tokos,id',
        ]);

        Pajak::create([
            'presentase' => $request->presentase,
            'toko_id' => $request->toko_id
        ]);

        // json
        // $pajak = Pajak::create($validateData);
        // return new PajakResource($pajak);

        return redirect()->route('pajak.index')->with(['success' => 'berhasil']);
    }


    public function create()
    {
        $tokos = Toko::all();
        return view('pajak.tambah', compact('tokos'));
    }

    public function edit($id) :View {
        $pajak = Pajak::findOrFail($id);
        $tokos = Toko::all();
        return view('pajak/ubah', compact('pajak', 'tokos'));
    }

    public function update(Request $request, $id) :RedirectResponse
    {
        $request->validate([
            'presentase' => 'required',
            'toko_id' => 'required|exists:tokos,id',
        ]);

        $pajaks = Pajak::findOrFail($id);
        $pajaks->update([
            'presentase' => $request->presentase,
            'toko_id' => $request->toko_id
        ]);

        return redirect()->route('pajak.index')->with(['success' => 'berhasil']);
        
    }

    public function delete($id){
        
        $pajak = Pajak::findOrFail($id);
        $pajak->delete();
        return redirect()->route('pajak.index')->with(['success' => 'berhasil']);
    }

        #API
        public function indexAPI()
        {
            Pajak::with(['toko'])->get();
            return PajakResource::collection(Pajak::get());
        }

        public function getSingleData($id)
        {
            $pajak = Pajak::with(['toko'])->findOrFail($id);
        
            $data = [
                'pajak' => new PajakResource($pajak)
            ];
        
            return $data; 
        }
    
        
        public function storeAPI(Request $request) 
        {
            
            $validatedData = $request->validate([
                'presentase' => 'required',
                'toko_id' => 'required|exists:tokos,id',
            ]);
            $pajak = Pajak::create($validatedData);
            return new PajakResource($pajak);
        }
    
        public function updateAPI(Request $request, $id)
        {
            $validatedData = $request->validate([
                'presentase' => 'required',
                'toko_id' => 'required|exists:tokos,id',
            ]);
        
            $pajak = Pajak::findOrFail($id);
            $pajak->update($validatedData);
            return new PajakResource($pajak);
        }
    
        
        public function deleteAPI($id){
            $pajak = Pajak::findOrFail($id);
            $pajak->delete();
            return (['success' => 'berhasil']);
        }
}
