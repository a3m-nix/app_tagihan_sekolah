@extends('layouts.app_adminlte')

@section('content')
    <!-- Main content -->
    <section class="content">
            <div class="card">
                <div class="card-header">Data User</div>
                <div class="card-body">
                    <a href="{{ route($routePrefix.'.create') }}" class="btn btn-primary">Tambah Data</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>EMAIL</th>
                                <th>AKSES</th>
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
                                    <td>{{ $item->akses }}</td>
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
        </section>
        <!-- /.content -->
@endsection
