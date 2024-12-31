<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{

    public function index(): view
    {
        $customers = Customer::get();
        return view('customer.customer', compact('customers'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('customer.tambah', compact('customers'));
    }

    public function edit($id) :View {
        $customers = Customer::findOrFail($id);
        return view('customer/ubah', compact('customers'));
    }

    public function update(Request $request, $id) :RedirectResponse
    {
        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        $customers = Customer::findOrFail($id);
        $customers->update([
            'nama_toko' => $request->nama_toko,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('customer.index')->with(['success' => 'berhasil']);
        
    }

    public function delete($id){
        
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.index')->with(['success' => 'berhasil']);
    }

    public function store(Request $request) : RedirectResponse
    {
        // Validasi input
        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        Customer::create([
            'nama_customer' => $request->nama_customer,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('customer.index')->with(['success' => 'berhasil']);
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
