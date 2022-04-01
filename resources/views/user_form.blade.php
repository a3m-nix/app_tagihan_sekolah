@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tambah User</div>
                <div class="card-body">
                    {!! Form::model($model, ['route' => $route, 'method' => $method]) !!}
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            {!! Form::text('name', null, ['class' => 'form-control','autofocus' => true]) !!}
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="email">EMAIL</label>
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            {!! Form::password('password', ['class' => 'form-control']) !!}                            
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}                            
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        </div>
                        {!! Form::submit($namaTombol, ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
