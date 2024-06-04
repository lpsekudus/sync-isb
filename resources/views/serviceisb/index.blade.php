@extends('layouts.app')

@section('content_header')
    <h1>Service ISB</h1>
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Services ISB') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('serviceisb.create') }}" class="btn btn-primary mb-3">Tambah Service Baru</a>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Service</th>
                                        <th>Kategori</th>
                                        <th>URL Json</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $service->id }}</td>
                                            <td>{{ $service->nama_service }}</td>
                                            <td>{{ $service->kategori }}</td>
                                            <td>{{ $service->url_json }}</td>
                                            <td>
                                                <a href="{{ route('serviceisb.edit', $service->id) }}"
                                                    class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                                </a>
                                                <form action="{{ route('serviceisb.destroy', $service->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-xs btn-default text-danger mx-1 shadow"
                                                        title="Delete">
                                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
