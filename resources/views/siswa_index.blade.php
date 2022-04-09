@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Data Siswa</div>
                <div class="card-body">
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Data</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>NISN</th>
                                <th>KELAMIN</th>
                                <th>TAHUN MASUK</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nisn }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->tahun_masuk }}</td>
                                    <td>
                                       {!! Form::open(['route' => ['siswa.destroy', $item->id], 'method' => 'DELETE','onsubmit' => 'return confirm("Anda Yakin ?")']) !!}
                                        <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ route('siswa.show', $item->id) }}" class="btn btn-info ml-1 mr-1">Detail</a>
                                        
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
