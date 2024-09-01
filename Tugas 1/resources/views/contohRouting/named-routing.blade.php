@extends('layout.base')

@section('title', 'Named Routing')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">Contoh Kode Basic Routing</h5><br>
    </div>
    <div class="card-body">
        <div class="form-group">
            <pre>
            Route::get('pertemuan1/fibbonaci', function(){
                return view ('pertemuan1.fibbonaci')
            })->name('fibonacci');


            Contoh akses :  "route('fibonacci')" 
            </pre>
        </div>
        <a href="{{ route('fibonacci') }}" class="btn btn-primary">Run</a>

    </div>
</div>

@endsection