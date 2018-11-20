@extends('layouts.app2')

@section('page-title')
    <li><a href="{{ route('admin.user.index') }}">{{ __('message.title.dashboard') }}</a></li>
    <li><a href="{{ route('admin.user.index') }}">{{ __('message.user') }}</a></li>
    <li class="active">{{ __('message.create') }}</li>
@endsection

@section('content')

<div class="container-fluid">
    @if (session('success'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    @if (count($errors) > 0)
        @foreach ($errors->all() as $e)
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                {{ $e }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endforeach
    @endif

    <div class="card">

        <div class="card-header">{{ __('message.create') }}</div>

        <div class="card-body">
            {!! Form::open(['route' => 'admin.user.store', 'method' => 'post', 'class' => 'form', 'files' => true]) !!}
                <div class="form-group">
                    {!! Form::label('name', __('message.name'), ['class' => 'pr-1 form-control-label']) !!}
                    {!! Form::text('name', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', __('message.email'), ['class' => 'pr-1 form-control-label']) !!}
                    {!! Form::text('email', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', __('message.password.password'), ['class' => 'pr-1 form-control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('re_password', __('message.password.re_password'), ['class' => 'pr-1 form-control-label']) !!}
                    {!! Form::password('re_password', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('address', __('message.addess'), ['class' => 'pr-1 form-control-label']) !!}
                    {!! Form::text('address', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phone', __('message.phone'), ['class' => 'pr-1 form-control-label']) !!}
                    {!! Form::number('phone', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('avatar', __('message.avatar'), ['class' => 'pr-1 form-control-label']) !!}
                    {!! Form::file('avatar', ['id' => 'avatar']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('role', __('message.permission'), ['class' => 'pr-1 form-control-label']) !!}
                    <select name="role" id="role" class="form-control">
                        @foreach ($roles as $r)
                            <option value="{{$r->id}}">{{ $r->name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group float-right">
                    {!! Form::submit(__('message.create'), ['class' => 'btn btn-outline-success']) !!}
                    {!! Form::reset(__('message.reset'), ['class' => 'btn btn-warning']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
