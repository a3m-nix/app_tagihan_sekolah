@extends('layouts.app_adminlte')

@section('content')
    <!-- Main content -->
    <section class="content">
            <div class="card">
                <div class="card-header">TAMPIL DATA {{ strtoupper($model->nama) }}</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>: {{ $model->id }}</td>
                            </tr>
                            <tr>
                                <td>NAMA</td>
                                <td>: {{ $model->nama }}</td>
                            </tr>
                            <tr>
                                <td>NISN</td>
                                <td>: {{ $model->nisn }}</td>
                            </tr>
                            <tr>
                                <td>PROGRAM STUDI</td>
                                <td>: {{ $model->program_studi }}</td>
                            </tr>
                            <tr>
                                <td>ANGKATAN</td>
                                <td>: {{ $model->angkatan }}</td>
                            </tr>
                            <tr>
                                <td>TGL INPUT</td>
                                <td>: {{ $model->created_at }}</td>
                            </tr>
                            <tr>
                                <td>USER INPUT</td>
                                <td>: {{ $model->user->name }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
</section>
@endsection
