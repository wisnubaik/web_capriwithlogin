<?php

namespace App\Http\Controllers;

use App\Models\notes_table;
use App\Models\personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    //
    public function biodata(Request $login) {
        $z = new notes_table();
        $z->hari = $login->hari;
        $z->tanggal = $login->tanggal;
        $z->waktu = $login->waktu;
        $z->save();
        
        return view("beranda");
    }
}
