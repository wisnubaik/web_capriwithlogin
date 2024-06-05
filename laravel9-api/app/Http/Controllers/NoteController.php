<?php

namespace App\Http\Controllers;

use App\Models\notes_table;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function note(Request $data) {
        $b = new notes_table();
        $b->judul = $data->judul;
        $b->isi = $data->isi;
        
        return view("menu");
    }
}
