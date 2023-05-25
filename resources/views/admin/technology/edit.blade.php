@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="py-4">Modifica: {{ $technology->nome }}</h1>
        <form action="{{ route('admin.technologies.update', $technology) }}" method="POST" enctype="multipart/form-data"
            class="mt-3">
            {{-- Token e Metodo --}}
            @csrf
            @method('PATCH')
            
            {{-- Nome --}}
            <div class="mb-3">
                <label for="nome" class="form-label fs-5 fw-bold">Nome</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome"
                    value="{{ old('nome', $technology->nome) }}">
            </div>
            @error('nome')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            

            {{-- Pulsanti Cancella e Modifica --}}
            <a href="{{ route('admin.technologies.index') }}" class="btn btn-dark">Cancella</a>
            <button type="submit" class="btn btn-success">Modifica</button>
        </form>
    </div>
@endsection
