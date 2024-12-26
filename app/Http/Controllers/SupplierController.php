<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\SupplierResource;

class SupplierController extends Controller
{

    

    public function index()
    {
        $suppliers = Supplier::get();
        return view('supplier.supplier', compact('suppliers'));

        //json
        // return SupplierResource::collection(Supplier::get());
    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('supplier.tambah', compact('suppliers'));
    }

    public function edit($id) :View {
        $suppliers = Supplier::findOrFail($id);
        return view('supplier/ubah', compact('suppliers'));
    }

    public function update(Request $request, $id) :RedirectResponse
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        $suppliers = Supplier::findOrFail($id);
        $suppliers->update([
            'nama_supplier' => $request->nama_supplier,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('supplier.index')->with(['success' => 'berhasil']);
        
    }

    public function delete($id){
        
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('supplier.index')->with(['success' => 'berhasil']);
    }

    public function store(Request $request) 
    {
        // Validasi input
        $validateData = $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        // json
        // $supplier = Supplier::create($validateData);
        // return new SupplierResource($supplier);

        return redirect()->route('supplier.index')->with(['success' => 'berhasil']);
    }
    // public function kasir()
    // {
    //     $kasirs = Toko::find(1)->kasirs;
    //     foreach ($kasirs as $kasir) {
    //         echo $kasir;
    //     }
    // }

// public function index(){
//     $kategoris = Toko::find(1)->kategoris;
     
//     foreach ($kategoris as $kategori) {
//         echo $kategori;
//     }
// }
   

}
