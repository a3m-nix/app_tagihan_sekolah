@extends('layouts.app_adminlte')

@section('content')
    <!-- Main content -->
    <section class="content">
            <div class="card">
                <div class="card-header">Tambah Siswa</div>
                <div class="card-body">
                    {!! Form::model($model, ['route' => $route, 'method' => $method]) !!}
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            {!! Form::text('nama', null, ['class' => 'form-control','autofocus' => true]) !!}
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            {!! Form::text('nisn', null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('nisn') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="program_studi">Program Studi</label>
                            {!! Form::select('program_studi', [
                                'TKJ'   => 'Teknik Komputer dan Jaringan',
                                'Multimedia' => 'Multimedia',
                            ], null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('program_studi') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="angkatan">Tahun Masuk</label>
            {!! Form::selectRange('angkatan', 2021, date('Y'), null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('angkatan') }}</span>
                        </div>
                        {!! Form::submit($namaTombol, ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </section>
        <!-- /.content -->
      
@endsection
