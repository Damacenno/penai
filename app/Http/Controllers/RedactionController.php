<?php

namespace App\Http\Controllers;
use App\Models\Redactions;
use Illuminate\Support\Facades\Auth;
use App\Models\Correction;
use App\Models\CorrectionDetails;

use Illuminate\Http\Request;

class RedactionController extends Controller
{
    public function send_redaction(Request $request)
    {
        $user = Auth::user();



        $data = [
            'choices' => [
                [
                    'message' => [
                        'role' => 'assistant',
                        'content' => '{"nota_geral": {"nota_geral": 740, "comentario_geral": "Lorem Ipsum Dolor Sit Amet"}, "competencias": {"competencia_01": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_02": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_03": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_04": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_05": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}}, "comentarios_especificos": {"comentario": "", "caractere_final": 1258, "caractere_inicial": 1200}}'
                    ]
                ]
            ]
        ];

        $conteudoJson = $data['choices'][0]['message']['content'] ?? null;
        $jsonDecodificado = json_decode($conteudoJson, true);


        if (!$jsonDecodificado) {
            echo 'ERRO decodificar';
            die();
        }

        $redaction = Redactions::create([
            'redaction' => $request->texto,
            'created_at' => now()
        ]);

        $correction = Correction::create([
            'id_user' => Auth::id() ?? 1, // ou um user fake se ainda não tiver login
            'id_redaction' => $redaction->id,
            'nota_geral'=> $jsonDecodificado['nota_geral']['nota_geral'],
            'created_at' => now(),
        ]);

        CorrectionDetails::create([
            'id_correction' => $correction->id,
            'json_details' => json_encode($jsonDecodificado),
        ]);

        return redirect("/correction/{$correction->id}");
    }


    private function separarEstruturaRedacao($texto)
    {
        $paragrafos = preg_split("/\n\s*\n/", trim($texto));

        $introducao = '';
        $desenvolvimento = [];
        $conclusao = '';

        $qtd = count($paragrafos);

        if ($qtd === 1) {
            $introducao = $paragrafos[0];
        } elseif ($qtd === 2) {
            $introducao = $paragrafos[0];
            $conclusao = $paragrafos[1];
        } elseif ($qtd === 3) {
            $introducao = $paragrafos[0];
            $desenvolvimento[] = $paragrafos[1];
            $conclusao = $paragrafos[2];
        } else {
            $introducao = $paragrafos[0];
            $conclusao = $paragrafos[$qtd - 1];
            for ($i = 1; $i < $qtd - 1; $i++) {
                $desenvolvimento[] = $paragrafos[$i];
            }
        }

        return [
            'introducao' => $introducao,
            'desenvolvimento' => $desenvolvimento,
            'conclusao' => $conclusao,
            'paragrafos' => $paragrafos, 
        ];
    }
}
