@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center border border-2 mt-3 rounded-4 p-4">
            <ul class="list-unstyled col-4">
                {{-- Pulsanti Indietro --}}
                <li><a href="{{ route('admin.project.index') }}" class="btn btn-sm btn-danger">Indietro</a></li>

                {{-- Nome progetto --}}
                <li>
                    <h2 class="my-4">
                        {{ $project->nome }}
                    </h2>
                </li>

                {{-- Tipologia --}}
                <li class="mb-4 text-secondary">
                    <h3>Tipologia: {{ $project->type?->nome ?: 'Nessuna Tipologia' }}</h3>
                </li>

                {{-- Tecnologie --}}
                @if($project->technologies->isNotEmpty())
                    <li class="fs-4 my-3">
                        Tecnologie:
                        @foreach ($project->technologies as $technology)
                            <span class="fs-4">{{ $technology->nome }}</span>
                        @endforeach
                    </li>
                @endif


                {{-- Descrizione --}}
                <li>{{ $project->descrizione }}</li>

                {{-- Data di creazione --}}
                <li class="my-3">Data di Creazione: {{ $project->data_di_creazione }}</li>

                {{-- Completato --}}
                @if ($project->completato == 1)
                    <li class="d-flex align-items-center gap-2">
                        Completato: <div class="circle done"></div>
                    </li>
                @else
                    <li class="d-flex align-items-center gap-2">
                        Completato: <div class="circle work"></div>
                    </li>
                @endif

                {{-- Riscosso --}}
                @if ($project->riscosso == 1)
                    <li class="d-flex align-items-center gap-2">
                        Riscosso: <div class="circle done"></div>
                    </li>
                @else
                    <li class="d-flex align-items-center gap-2">
                        Riscosso: <div class="circle work"></div>
                    </li>
                @endif
            </ul>
            {{-- Immagine --}}
            @if (isset($project->immagine))
                <div class="col-8"><img class="img-fluid" src="{{ asset('storage/' . $project->immagine) }}" alt="">
                </div>
            @endif
        </div>

    @endsection
