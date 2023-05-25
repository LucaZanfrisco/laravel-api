@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-4">
            <h2 class="fs-4 text-secondary">
                Lista Tipologie
            </h2>
            <a href="{{ route('admin.types.create') }}" class="btn btn-dark">Aggiungi Tipologia</a>
        </div>

        @if (session('message'))
            <div class="toast-container position-fixed bottom-0 end-0 p-3" id="message">
                <div class="toast show align-items-center my-bg-success border-0" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="d-flex py-2">
                        <div class="toast-body fw-bold">
                            {{ session('message') }}
                        </div>
                        <button type="button" class="btn-close me-3 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->nome }}</td>
                        <td>{{ $type->slug }}</td>
                        <td>
                            <ul class="d-flex gap-1 list-unstyled m-0">
                                <li><a href="{{ route('admin.types.show', $type) }}"
                                        class="btn btn-sm btn-success">Dettaglio</a></li>
                                <li><a href="{{ route('admin.types.edit', $type) }}"
                                        class="btn btn-sm btn-warning">Modifica</a></li>
                                <li>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $type->id }}">
                                        Elimina
                                    </button>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <div class="modal fade" id="delete{{ $type->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">ELIMINA</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>Eliminare la tipologia n°{{$type->id}}: {{ $type->nome }} ?</div>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annulla</button>
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
