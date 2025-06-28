<?php

namespace App\Http\Controllers;

use App\Models\Correction;
use App\Models\Redactions;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $corrections = Correction::with('redaction')->get();
        return view('home', compact('corrections'));
    }

    public function detail_correction($slug)
    {
        $correction = Correction::with('details')->where('id', $slug)->first();
        $payload = json_decode($correction->details[0]->json_details, true);
        if (!$correction) {
            abort(404, 'Correção não encontrada');
        }
        return view('correction', compact('correction','payload'));
    }

    public function new_redaction()
    {
        return view('write_essay');
    }


}
