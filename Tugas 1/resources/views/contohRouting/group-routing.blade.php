@extends('layout.base')

@section('title', 'Routing Groups')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">Contoh Kode Routing Groups</h5><br>
    </div>
    <div class="card-body">
        <div class="form-group">
            <pre>
 Route::prefix('/pertemuan1')->group(function () {
     Route::match(['get', 'post'], '/genap-ganjil', [Pertemuan1Controller::class, 'genapGanjil'])->name('genap-ganjil');
     Route::get('/fibbonaci', [Pertemuan1Controller::class, 'fibonacci'])->name('fibonacci');
     Route::get('/prima', [Pertemuan1Controller::class, 'bilanganPrima'])->name('bilangan-prima');
     Route::get('/param', fn() => view('pertemuan1.param'))->name('param');
     Route::get('/param/{param1}', [Pertemuan1Controller::class, 'param1'])->name('param1');
     Route::get('/param/{param1}/{param2}', [Pertemuan1Controller::class, 'param2'])->name('param2');
    });


            </pre>
        </div>
        <button type="button" class="btn btn-primary" onclick="window.location.href='/pertemuan1/prima'">Run</button>
    </div>
</div>

@endsection