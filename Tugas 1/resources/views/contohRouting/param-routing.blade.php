@extends('layout.base')

@section('title', 'Route Parameters')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">Contoh Kode Route Parameters</h5><br>
    </div>
    <div class="card-body">
        <div class="form-group">
            <pre>
                    Route::get('/mahasiswa/{nrp}', function (string $id) {
                            return 'Ini adalah mahasiswa dengan NRP : '.$nrp;
                        });
                </pre>
        </div>
        <a href="{{ url('/mahasiswa/{nrp}') }}" class="btn btn-primary">Run</a>
    </div>
</div>

@endsection