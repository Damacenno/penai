<?php

namespace App\Http\Controllers;

use App\Models\Correction;
use App\Models\DailyThemes;
use App\Models\Redactions;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $daily_themes = DailyThemes::all();
        return view('home', compact('daily_themes'));
    }

    public function detail_correction($slug)
    {
        $correction = Correction::with(['details', 'redaction'])->where('id', $slug)->first();
        if (!$correction) {
            abort(404, 'Correção não encontrada');
        }
        $payload = json_decode($correction->details[0]->json_details, true);
        return view('correction', compact('correction', 'payload'));
    }

    public function corrections_history()
    {
        $corrections = Correction::with('redaction')->get();
        $daily_themes = DailyThemes::all();
        return view('corrections_history', compact(['corrections', 'daily_themes']));
    }


}
