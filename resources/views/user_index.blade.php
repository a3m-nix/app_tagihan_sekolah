@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Data User</div>
                <div class="card-body">
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah Data</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>EMAIL</th>
                                <th>TGL BUAT</th>
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
                                       {!! Form::open(['route' => ['user.destroy', $item->id], 'method' => 'DELETE','onsubmit' => 'return confirm("Anda Yakin ?")']) !!}
                                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                        
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
