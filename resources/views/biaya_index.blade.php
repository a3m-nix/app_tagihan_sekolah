@extends('layouts.app_adminlte')

@section('content')
    <!-- Main content -->
    <section class="content">
            <div class="card">
                <div class="card-header">Data Siswa</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <a href="{{ route($routePrefix.'.create') }}" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="col-md-4">
                            {!! Form::open(['route' => 'siswa.import','files' => true]) !!}
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    {!! Form::file('file_siswa', ['class' => 'form-control','id' => 'inputGroupFile02']) !!}
                                  <label class="custom-file-label" for="inputGroupFile02">
                                      Pilih File</label>
                                </div>
                                <div class="input-group-append">
                                {!! Form::submit('Import Excel', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>JUMLAH</th>
                                <th>DIINPUT OLEH</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ number_format($item->jumlah, 0, ",", ".") }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                       {!! Form::open(['route' => [$routePrefix.'.destroy', $item->id], 'method' => 'DELETE','onsubmit' => 'return confirm("Anda Yakin ?")']) !!}
                                        <a href="{{ route($routePrefix.'.edit', $item->id) }}" class="btn btn-warning">
                                           <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="{{ route($routePrefix.'.show', $item->id) }}" class="btn btn-info ml-1 mr-1"><i class="fa fa-eye"></i> Detail</a>
                                        
            <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash"></i> Hapus 
            </button>

                                       {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $models->links() !!}
                </div>
            </div>
        </section>
        <!-- /.content -->
@endsection
