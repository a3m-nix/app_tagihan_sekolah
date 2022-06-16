@extends('layouts.app_adminlte')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">Tambah Biaya</div>
            <div class="card-body">
                {!! Form::model($model, ['route' => $route, 'method' => $method]) !!}
                <div class="form-group">
                    <label for="nama">Nama </label>
                    {!! Form::text('nama', null, ['class' => 'form-control', 'autofocus' => true]) !!}
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Biaya</label>
                    {!! Form::text('jumlah', null, ['class' => 'form-control format-rupiah']) !!}
                    <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                </div>
                {!! Form::submit($namaTombol, ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
