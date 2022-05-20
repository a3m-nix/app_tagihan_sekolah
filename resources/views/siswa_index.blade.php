@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Data Siswa</div>
                <div class="card-body">
                    <a href="{{ route($routePrefix.'.create') }}" class="btn btn-primary">Tambah Data</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NISN</th>
                                <th>NAMA</th>
                                <th>ANGKATAN</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                       {!! Form::open(['route' => [$routePrefix.'.destroy', $item->id], 'method' => 'DELETE','onsubmit' => 'return confirm("Anda Yakin ?")']) !!}
                                        <a href="{{ route($routePrefix.'.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ route($routePrefix.'.show', $item->id) }}" class="btn btn-info ml-1 mr-1">Detail</a>
                                        
                                        {!! Form::submit('HAPUS', ['class' => 'btn btn-danger']) !!}
                                       {!! Form::close() !!}
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
@endsection
