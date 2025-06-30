@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="bg-blue-100 min-h-screen p-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 min-h-[80vh]">
            <section
                class="lg:col-span-2 bg-white rounded-md shadow p-6 text-justify relative min-h-[500px] overflow-hidden pl-16">
                <h3 class="text-xl font-semibold mb-4 relative z-20">Minha redação</h3>
                <div class="absolute inset-0 z-0 rounded-2xl overflow-hidden">
                    <img src="{{ asset('images/papel-textura.jpg') }}" alt="Papel"
                        class="w-full h-full object-cover opacity-10 absolute inset-0 z-0">
                    <div class="absolute inset-0 bg-[repeating-linear-gradient(white_0_34px,#d1d5db_35px)] z-10"></div>
                    <div class="absolute top-0 bottom-0 left-12 w-[2px] bg-red-400 z-20"></div>
                </div>
                <div class="relative z-30 space-y-4 leading-[34px] text-gray-800 px-2">
                    <p>{{ $correction->redaction->redaction_intro }}</p>
                    <p>{{ $correction->redaction->redaction_desenvolv }}</p>
                    @if($correction->redaction->redaction_desenvolv_2 != "")
                        <p>{{ $correction->redaction->redaction_desenvolv_2 }}</p>
                    @endif
                    <p>{{ $correction->redaction->redaction_conclusion }}</p>
                </div>
            </section>
            <aside class="flex flex-col space-y-4" x-data="{ tab: 0 }">
                <div class="bg-white border border-gray-300 rounded-md p-6 shadow">
                    @php
                        $nota = $correction->nota_geral;
                        $percentual = min(100, ($nota / 1000) * 100); // Garante até 100%
                        $cor = 'bg-red-500';
                        if ($nota >= 700) {
                            $cor = 'bg-green-500';
                        } elseif ($nota >= 540) {
                            $cor = 'bg-yellow-400';
                        } elseif ($nota >= 300) {
                            $cor = 'bg-orange-400';
                        }
                    @endphp

                    <div class="bg-white border border-gray-300 rounded-md p-6 shadow">
                        <h4 class="text-lg font-semibold mb-4">Avaliação Geral</h4>

                        <div class="mb-4">
                            <p class="text-sm font-medium mb-1">Nota Geral: <span class="font-bold">{{ $nota }}/1000</span>
                            </p>
                            <div class="w-full h-5 bg-gray-200 rounded-full overflow-hidden shadow-inner">
                                <div class="h-full {{ $cor }} transition-all duration-500"
                                    style="width: {{ $percentual }}%"></div>
                            </div>
                        </div>

                        <p class="text-sm text-gray-700 leading-relaxed"><strong>Comentário Geral:</strong>
                            @php
                                // Pega o json_details do primeiro item de 'details'
                                $json = json_decode($correction->details[0]->json_details, true);
                                $comentarioGeral = $json['nota_geral']['comentario_geral'] ?? 'Comentário geral não encontrado.';
                            @endphp {{ $comentarioGeral }}</p>
                    </div>

                </div>

                @php $competencias = array_values($payload['competencias']); @endphp

                <div class="bg-white border border-gray-300 rounded-md shadow p-4" x-cloak>
                    <h4 class="text-lg font-semibold mb-4">Competências</h4>

                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach ($competencias as $index => $competencia)
                            <button class="px-3 py-1 text-sm rounded border transition"
                                :class="tab === {{ $index }} ? 'bg-cyan-200 font-semibold' : 'bg-gray-100 hover:bg-gray-200'"
                                @click="tab = {{ $index }}">
                                Competência {{ $loop->iteration }}
                            </button>
                        @endforeach
                    </div>

                    @foreach ($competencias as $index => $competencia)
                        <div x-show="tab === {{ $index }}" x-cloak x-transition>
                            <p><strong>Nota:</strong> {{ $competencia['nota'] }}</p>
                            <p><strong>Comentário:</strong> {{ $competencia['comentário'] }}</p>
                        </div>
                    @endforeach

                </div>

            </aside>

        </div>
    </div>

@endsection