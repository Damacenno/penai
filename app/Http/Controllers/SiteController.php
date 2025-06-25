<?php

namespace App\Http\Controllers;

use App\Models\Correction;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $corrections = Correction::all();
        echo json_decode($corrections);
        die();
        return view('corrections', compact('corrections'));
    }

    public function detail_correction($slug)
    {
        $correction = Correction::where('id', $slug)->first();
        if (!$correction) {
            abort(404, 'Correção não encontrada');
        }
        return view('correction', compact('correction'));
    }

}
