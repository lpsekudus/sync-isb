@extends('layouts.app')

@section('title', 'Edit Service ISB')

@section('content_header')
    <h1>Edit Service ISB</h1>
@stop

@section('content')
    <div class="card card-primary">
        <form method="POST" action="{{ route('serviceisb.update', $serviceisb->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_service">Nama Service</label>
                    <input type="text" class="form-control" id="nama_service" name="nama_service"
                        value="{{ $serviceisb->nama_service }}" required readonly>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori"
                        value="{{ $serviceisb->kategori }}" required readonly>
                </div>
                <div class="form-group">
                    <label for="url_json">URL Json</label>
                    <input type="text" class="form-control" id="url_json" name="url_json"
                        value="{{ $serviceisb->url_json }}" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@stop
