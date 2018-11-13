@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    {{ Form::open(['method' => 'POST', 'route' => 'register' ]) }}
                        @csrf

                        <div class="form-group row">
                            {{ Form::label('name', __('Name'), ['class' => 'col-sm-4 col-form-label text-md-right']) }}

                            <div class="col-md-6">
                                {{ Form::text('name', old('name'), ['required', 'autofocus', 'class' => 'form-control' . $errors->has('name') ? ' is-invalid' : '']) }}

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('email', __('E-Mail Address'), ['class' => 'col-sm-4 col-form-label text-md-right']) }}

                            <div class="col-md-6">
                                {{ Form::email('email', old('email'), ['required', 'autofocus', 'class' => 'form-control' . $errors->has('email') ? ' is-invalid' : '']) }}

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('password', __('Password'), ['class' => 'col-sm-4 col-form-label text-md-right']) }}

                            <div class="col-md-6">
                                {{ Form::password('password', old('password'), ['required', 'autofocus', 'class' => 'form-control' . $errors->has('password') ? ' is-invalid' : '']) }}

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('password-confirm', __('Confirm Password'), ['class' => 'col-sm-4 col-form-label text-md-right']) }}

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                {{ Form::password('password-confirm', '', ['required', 'class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit(__('Register'), ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
