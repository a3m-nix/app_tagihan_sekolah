@extends('layouts.app_adminlte')

@section('content')
    <!-- Main content -->
    <section class="content">
            <div class="card">
                <div class="card-header">TAMPIL DATA {{ strtoupper($model->name) }}</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <td width="12%">ID</td>
                                <td>: {{ $model->id }}</td>
                            </tr>
                            <tr>
                                <td>NAMA</td>
                                <td>: {{ $model->name }}</td>
                            </tr>
                            <tr>
                                <td>HAK AKSES</td>
                                <td>: {{ $model->akses }}</td>
                            </tr>
                            <tr>
                                <td>EMAIL</td>
                                <td>: {{ $model->email }}</td>
                            </tr>
                            <tr>
                                <td>TGL BUAT</td>
                                <td>: {{ $model->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <td>TGL UBAH</td>
                                <td>: {{ $model->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
    </section>
@endsection
