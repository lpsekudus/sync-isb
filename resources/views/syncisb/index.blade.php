@extends('layouts.app')

@section('content_header')
    <h1>Sync ISB</h1>
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Sinkronisasi ISB') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $namaService }}</h3>
                        </div>
                        <div class="card-body">
                            <p>Jumlah Row: {{ $jumlahRow }}</p>
                            <p>Terakhir Sinkronisasi:
                                {{ $lastSync ? $lastSync->created_at->format('d M Y H:i:s') : 'Belum Pernah' }}</p>
                            <div class="btn-group">
                                <form action="{{ route('syncpenyediaterumumkan.sync') }}" method="POST" id="formPenyedia">
                                    @csrf <!-- CSRF token untuk keamanan -->
                                    <button type="submit" class="btn btn-primary text-center" id="syncButtonPenyedia"
                                        onclick="confirmSync(event, 'formPenyedia', 'syncButtonPenyedia')">Sinkronisasi
                                        Data</button>
                                </form>
                                <form action="{{ route('penyedia.export') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Export Excel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $namaServiceSwakelola }}</h3>
                        </div>
                        <div class="card-body">
                            <p>Jumlah Row: {{ $jumlahRowSwakelola }}</p>
                            <p>Terakhir Sinkronisasi:
                                {{ $lastSyncSwakelola ? $lastSyncSwakelola->created_at->format('d M Y H:i:s') : 'Belum Pernah' }}
                            </p>
                            <div class="btn-group">
                                <form action="{{ route('syncswakelolaterumumkan.sync') }}" method="POST"
                                    id="formSwakelola">
                                    @csrf <!-- CSRF token untuk keamanan -->
                                    <button type="submit" class="btn btn-primary text-center" id="syncButtonSwakelola"
                                        onclick="confirmSync(event, 'formSwakelola', 'syncButtonSwakelola')">Sinkronisasi
                                        Data</button>
                                </form>
                                <form action="{{ route('swakelola.export') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Export Excel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmSync(event, formId, buttonId) {
            event.preventDefault(); // Menghentikan form dari submit otomatis
            if (confirm('Apakah Anda yakin ingin melakukan sinkronisasi ulang data?')) {
                var form = document.getElementById(formId);
                var button = document.getElementById(buttonId);
                button.innerHTML =
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Silahkan tunggu...';
                form.submit(); // Submit form secara manual jika pengguna mengkonfirmasi
            }
        }
    </script>
    <style>
        .spinner-border {
            margin-right: 5px;
        }
    </style>
@stop
