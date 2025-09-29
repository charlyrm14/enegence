
@extends('layouts.master')

@section('content')
<section>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="p-3 m-3 bg-body rounded shadow">
                <h4 class="fs-6 border-bottom pb-2 mb-0 d-flex align-items-center gap-2"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe-americas" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484q-.121.12-.242.234c-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z"/>
                    </svg> Estados COPOMEX 
                </h4>
                <div class="table-responsive my-3">
                    <table id="myTable" class="display table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col"> ID </th>
                                <th scope="col"> Nombre </th>
                                <th scope="col"> Acciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($states as $key => $state)
                                <tr>
                                    <td> {{ ++$key }}</td>
                                    <td> {{$state->name }}</td>
                                    <td>
                                        <a 
                                            href="{{ route('towns.name', $state->name ) }}"
                                            class="btn btn-primary rounded-pill fs-6">
                                                Ver municipios por estado
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                                                    </svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td> No se encontraron resultados </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
    <script>
        let table = new DataTable('#myTable', {
        });
    </script>
@endpush