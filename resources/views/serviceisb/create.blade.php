@extends('layouts.app')

@section('content_header')
    <h1>Tambah Service ISB</h1>
@stop

@section('content')
    <div class="card card-primary">
        <form method="POST" action="{{ route('serviceisb.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_service">Nama Service</label>
                    <input type="text" class="form-control" id="nama_service" name="nama_service" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" required>
                </div>
                <div class="form-group">
                    <label for="url_json">URL Json</label>
                    <input type="text" class="form-control" id="url_json" name="url_json" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@stop
