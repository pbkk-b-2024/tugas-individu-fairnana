@extends('layout.base')

@section('title', 'Basic Routing')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">Contoh Kode Basic Routing</h5><br>
    </div>
    <div class="card-body">
        <div class="form-group">
            <pre>
                    Route::post('/basic', function() {
                        return "Hallo world";
                    });
                </pre>
        </div>
        <a href="{{ url('/basic') }}" class="btn btn-primary">Run</a>
    </div>
</div>

@endsection