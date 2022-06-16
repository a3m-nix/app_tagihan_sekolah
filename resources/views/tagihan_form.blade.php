@extends('layouts.app_adminlte')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">BUAT TAGIHAN BARU</div>
            <div class="card-body">
                {!! Form::model($model, ['route' => $route, 'method' => $method, 'files' => true]) !!}
                <div class="form-group">
                    <label for="tanggal_tagihan">Tanggal Tagihan</label>
                    {!! Form::date('tanggal_tagihan', null, ['class' => 'form-control']) !!}
                    <span class="text-danger">{{ $errors->first('tanggal_tagihan') }}</span>
                </div>
                <div class="form-group">
                    <label for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo</label>
                    {!! Form::date('tanggal_jatuh_tempo', null, ['class' => 'form-control']) !!}
                    <span class="text-danger">{{ $errors->first('tanggal_jatuh_tempo') }}</span>
                </div>
                <div class="form-group">
                    <label for="biaya_id">Biaya Tagihan</label>
                    {!! Form::select('biaya_id', $biayaList, null, ['class' => 'form-control']) !!}
                    <span class="text-danger">{{ $errors->first('biaya_id') }}</span>
                </div>
                <div class="form-group">
                    <label for="angkatan">Tahun Masuk / Angkatan</label>
                    {!! Form::selectRange('angkatan', 2021, date('Y'), null, ['class' => 'form-control', 'placeholder' => 'Semua Angkatan']) !!}
                    <span class="text-danger">{{ $errors->first('angkatan') }}</span>
                </div>
                {!! Form::submit($namaTombol, ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
