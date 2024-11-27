<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\DB;
use App\Models\Diskon;

class DiskonController extends Controller
{
    public function diskon(){   
        $diskon = Diskon::find(1);
        return $diskon;
    }
    public function get_all(){
        $diskon = Diskon::with('toko')->get();
        return $diskon;
    }
}
