@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
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
                            {!! Form::number('nisn', null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('nisn') }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Laki-Laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                              Perempuan
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="tahun_masuk">Tahun Masuk</label>
                            {!! Form::selectRange('tahun_masuk', 2021,date("Y"), null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('tahun_masuk') }}</span>
                        </div>

                        <br />
                        {!! Form::submit($namaTombol, ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
