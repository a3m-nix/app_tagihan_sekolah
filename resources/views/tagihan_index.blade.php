@extends('layouts.app_adminlte')

@section('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">Data Siswa</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <a href="{{ route($routePrefix . '.create') }}" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="col-md-4">
                        {!! Form::open(['route' => 'tagihan.index', 'method' => 'GET']) !!}
                        <div class="input-group mb-3">
                            {!! Form::selectMonth('bulan', request('bulan'), ['class' => 'form-control', 'placeholder' => 'Pilih bulan']) !!}

                            {!! Form::selectRange('tahun', date('Y'), 2021, request('tahun'), ['class' => 'form-control', 'placeholder' => 'Pilih Tahun']) !!}
                            <div class="input-group-append">
                                {!! Form::submit('Tampil Data', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <table class="table table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA SISWA</th>
                            <th>NISN SISWA</th>
                            <th>PERIODE TAGIHAN</th>
                            <th>NAMA TAGIHAN</th>
                            <th>JUMLAH TAGIHAN</th>
                            <th>STATUS</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->siswa->nama }}</td>
                                <td>{{ $item->siswa->nisn }}</td>
                                <td>{{ $item->tanggal_tagihan->translatedFormat('F Y') }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->getJumlahRupiah() }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    {!! Form::open(['route' => [$routePrefix . '.destroy', $item->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Anda Yakin ?")']) !!}
                                    <a href="{{ route($routePrefix . '.edit', $item->id) }}" class="btn btn-warning">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a href="{{ route($routePrefix . '.show', $item->id) }}"
                                        class="btn btn-info ml-1 mr-1"><i class="fa fa-eye"></i> Detail</a>
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
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
