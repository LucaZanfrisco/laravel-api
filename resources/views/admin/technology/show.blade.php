@extends('layouts.app')

@section('content')
    <div class="container border border-2 mt-3 rounded-4 p-4">
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-sm btn-danger">Back</a>
        <h2 class="p-4">{{ $technology->nome }}</h2>
        @if($technology->projects->isNotEmpty())
            <ul class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                @foreach ($technology->projects as $project)
                    <li class="card py-5 px-3">
                        @isset($project->immagine)
                            <img class="img-fluid m-4" src="{{ asset('storage/' . $project->immagine) }}"
                                alt="{{ $project->nome }}">
                        @endisset
                        <h3 class="fw-bold mb-4">{{ $project->nome }}</h3>
                        <div class="my-3">{{ $project->descrizione }}</div>
                        <div class="my-3">Data di creazione: {{ $project->data_di_creazione }}</div>
                        @if ($project->completato == 1)
                            <div> Completato:<span class="circle done"></span></div>
                        @else
                            <div> Completato:<span class="circle work"></span></div>
                        @endif
                        @if ($project->riscosso == 1)
                            <div> Riscosso: <span class="circle done"></span></div>
                        @else
                            <div> Riscosso: <span class="circle done"></span></div>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <div class="alert alert-danger text-center p-3">Nessun progettto associato</div>
        @endif
    </div>
@endsection
