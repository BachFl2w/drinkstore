@extends('layouts.app_admin')

@section('page-title')
    <li><a href="{{ route('admin.user.index') }}">{{ __('message.title.dashboard') }}</a></li>
    <li><a href="{{ route('admin.category.index') }}">{{ __('message.category') }}</a></li>
    <li class="active">{{ __('message.update') }}</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            {!! Form::open(['route' => ['admin.category.update', $category->id], 'method' => 'post']) !!}
            <div class="card-header">{{ __('message.category_action.update') }}</div>

            <div class="card-body">
                @csrf
                <div class="form-group">
                    {!! Form::label('id', __('message.id'), ['class' => 'form-control-label', 'id' => 'id']) !!}
                    {!! Form::text('id', $category->id, ['class' => 'form-control', 'id' => 'id', 'readonly']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', __('message.name'), ['class' => 'form-control-label']) !!}
                    {!! Form::text('name', $category->name, ['class' => 'form-control', 'id' => 'id']) !!}
                </div>
            </div>
            <div class="card-footer">
                {!! Form::submit(__('message.update'), ['class' => 'btn btn-info']) !!}
                <a href="{{ route('admin.category.index') }}" class="btn btn-dagner">{{ __('message.cancel') }}</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
