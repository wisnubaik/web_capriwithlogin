<?php

namespace App\Http\Controllers;

use App\Models\reminders_table;
use Illuminate\Http\Request;

class ProfilController extends Controller
{

    public function pengingat(Request $data) {
        $a = new reminders_table();
        $a->hari = $data->hari;
        $a->tanggal = $data->tanggal;
        $a->waktu = $data->waktu;
        $a->save();
        
        return view("halaman_login");
    }
}
