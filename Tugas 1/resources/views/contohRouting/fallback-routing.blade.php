@extends('layout.base')

@section('title', 'Fallback Routing')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">Contoh Kode Fallback Routing</h5><br>
    </div>
    <div class="card-body">
        <div class="form-group">
            <h7>Kasus Akses ke page profile</h7>
            <pre>

            Route::fallback(function () {
                return redirect('/');
            });

            </pre>
        </div>
    </div>
</div>

@endsection