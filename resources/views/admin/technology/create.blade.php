@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="py-3">Nuova Tecnologia</h1>
        <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            {{-- Nome --}}
            <div class="mb-3">
                <label for="nome" class="form-label fs-5 fw-bold">Nome</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome"
                    value="{{ old('nome') }}">
            </div>
            @error('nome')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            {{-- Pulsanti --}}
            <a href="{{ route('admin.technologies.index') }}" class="btn btn-dark">Cancella</a>
            <button type="submit" class="btn btn-success">Salva</button>
        </form>
    </div>
@endsection
