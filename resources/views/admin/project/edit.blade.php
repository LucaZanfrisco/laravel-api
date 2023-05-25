@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.project.update', $project) }}" method="POST" enctype="multipart/form-data"
            class="mt-3">
            {{-- Token e Metodo --}}
            @csrf
            @method('PATCH')

            {{-- Nome --}}
            <div class="mb-3">
                <label for="nome" class="form-label fs-5 fw-bold">Nome</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome"
                    value="{{ old('nome', $project->nome) }}">
            </div>
            @error('nome')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- Tipologia --}}
            <div class="my-3">
                <label for="type_id" class="form-label fs-5 fw-bold">Tipologia</label>
                <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror">
                    <option value="">Selezionare una tipologia</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}>{{ $type->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('type_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- Tecnologie --}}
            @if($errors->any())
                <div class="my-3">
                    <div class="form-label fs-5 fw-bold">Technologie</div>
                    <div>
                        @foreach ($technologies as $technology)
                            <label class="form-check-label" for="{{ $technology->nome }}">{{ $technology->nome }}</label>
                            <input class="form-check-input me-3 mb-3 @error('technologies') is-invalid @enderror"
                                type="checkbox" name="technologies[]" id="{{ $technology->nome }}" value="{{ $technology->id }}" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                        @endforeach
                    </div>
                </div>
                @error('technologies')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            @else
                <div class="my-3">
                    <div class="form-label fs-5 fw-bold">Technologie</div>
                    <div>
                        @foreach ($technologies as $technology)
                            <label class="form-check-label" for="{{ $technology->nome }}">{{ $technology->nome }}</label>
                            <input class="form-check-input me-3 mb-3 @error('technologies') is-invalid @enderror"
                                type="checkbox" name="technologies[]" id="{{ $technology->nome }}" value="{{ $technology->id }}" {{ $project->technologies->contains($technology->id) ? 'checked' : ''}}>
                        @endforeach
                    </div>
                </div>
                @error('technologies')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            @endif

            {{-- Immagine --}}
            <div class="my-3">
                <label for="immagine" class="form-label fs-5 fw-bold">Selezione un file immagine da inserire</label>
                <input class="form-control @error('immagine') is-invalid @enderror" type="file" id="immagine"
                    name="immagine">
            </div>
            @error('immagine')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- Descrizione --}}
            <div class="my-3">
                <label for="descrizione" class="form-label fs-5 fw-bold">Descrizione</label>
                <textarea name="descrizione" id="descrizione" cols="30" rows="6"
                    class="form-control @error('description') is-invalid @enderror">{{ old('descrizione', $project->descrizione) }}</textarea>
            </div>
            @error('descrizione')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- Data di creazione --}}
            <div class="my-3">
                <label for="data_di_creazione" class="form-label fs-5 fw-bold">Data di creazione</label>
                <input type="date" class="form-control @error('data_di_creazione') is-invalid @enderror"
                    id="data_di_creazione" name="data_di_creazione"
                    value="{{ old('data_di_creazione', $project->data_di_creazione) }}">
            </div>
            @error('data_di_creazione')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- Completato --}}
            <div class="my-3">
                <label for="completato" class="form-label fs-5 fw-bold">Completato</label>
                <select name="completato" id="completato" class="form-select @error('completato') is-invalid @enderror">
                    <option value="1" {{ old('completato', $project->completato) == 1 ? 'selected' : '' }}>Completato
                    </option>
                    <option value="0" {{ old('completato', $project->completato) == 0 ? 'selected' : '' }}>Non
                        completato</option>
                </select>
            </div>
            @error('completato')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- Riscosso --}}
            <div class="my-3">
                <label for="riscosso" class="form-label fs-5 fw-bold">Riscosso</label>
                <select name="riscosso" id="riscosso" class="form-select @error('riscosso') is-invalid @enderror">
                    <option value="1" {{ old('riscosso', $project->riscosso) == 1 ? 'selected' : '' }}>Riscosso
                    </option>
                    <option value="0" {{ old('riscosso', $project->riscosso) == 0 ? 'selected' : '' }}>Non riscosso
                    </option>
                </select>
            </div>
            @error('riscosso')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- Pulsanti Cancella e Modifica --}}
            <a href="{{ route('admin.project.index') }}" class="btn btn-dark">Cancella</a>
            <button type="submit" class="btn btn-success">Modifica</button>
        </form>
    </div>
@endsection
