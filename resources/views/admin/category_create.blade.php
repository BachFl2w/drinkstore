@extends('layouts.app_admin')

@section('page-title')
    <li><a href="{{ route('admin.index') }}">{{ __('message.title.dashboad') }}</a></li>
    <li><a href="{{ route('admin.category.index') }}">{{ __('message.category') }}</a></li>
    <li class="active">{{ __('message.create') }}</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            {!! Form::open(['route' => 'admin.category.store', 'method' => 'post']) !!}
            <div class="card-header">{{ __('message.category_action.create') }}</div>

            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('name', __('message.name'), ['class' => 'form-control-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
                </div>
            </div>
            <div class="card-footer">
                {!! Form::submit(__('message.create'), ['class' => 'btn btn-info']) !!}
                <a href="{{ route('admin.category.index') }}" class="btn btn-dagner">{{ __('message.cancel') }}</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
