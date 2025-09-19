@extends('layouts.master')

@section('content')
<section>
    <div class="row my-4">
        <div class="d-flex justify-content-start">
            <a href="{{ route('home') }}" class="btn btn-dark d-flex align-items-center gap-2 rounded-pill"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                </svg>  Regresar 
            </a>
        </div>
    </div>
    <div class="row my-4">
        <h1 class="fs-4 fw-light"> 
            Estás viendo una lista de los municipios que se encuentran en el estado de <span class="fw-bold"> {{ $state }} </span>
        </h1>
    </div>
    <div class="row my-4">
        @foreach($towns as $key => $town)
        <div class="col-md-4 my-2">
            <div class="card shadow rounded-md p-2">
                <img src="{{ asset('assets/img/town.png') }}" class="card-img-top border p-1 rounded" alt="{{ $town ?? 'town' . ++$key }}">
                <div class="card-body">
                    <span class="badge rounded-pill text-bg-primary"> Municipio </span>
                    <p class="fw-bold fs-3 mt-3"> {{ $town }} </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection