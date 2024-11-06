@extends('layouts.app')

@section('content')
<div class="ms-5">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <h6>Sezione dell'applicaizone per una visualizzazione generale di quello che è stato salvato nel database dei propri progetti</h6>
    <div class="row row-cols-5 justify-content-center">
        <div class="col">
            <a class="text-decoration-none text-black" href="{{ route("admin.project.index") }}">
                <div class="card text-center py-2">
                    <div>Numero di progetti</div>
                    <div class="card-body">
                        {{ $data["numeroProgetti"] }}
                    </div>
                </div> 
            </a>
        </div>
        <div class="col">
            <a class="text-decoration-none text-black" href="{{ route("admin.technologies.index") }}">
                <div class="card text-center py-2">
                    <div>Numero di tecnologie</div>
                    <div class="card-body">
                        {{ $data["numeroTecnologie"] }}
                    </div>
                </div> 
            </a>
        </div>
        <div class="col">
            <a class="text-decoration-none text-black" href="{{ route("admin.types.index") }}">
                <div class="card text-center py-2">
                    <div>Numero di tipologie</div>
                    <div class="card-body">
                        {{ $data["numeroTipologie"] }}
                    </div>
                </div> 
            </a>
        </div>
        <div class="col">
            <a class="text-decoration-none text-black" href="{{ route("admin.leads.index") }}">
                <div class="card text-center py-2">
                    <div>Numero di Contatti</div>
                    <div class="card-body">
                        {{ $data["numeroContatti"] }}
                    </div>
                </div> 
            </a>
        </div>
    </div>

</div>
@endsection
