@extends('layouts.app2')

@section('page-title')
    <li><a href="{{ route('admin.user.index') }}">{{ __('message.title.dashboard') }}</a></li>
    <li class="active">{{ __('message.list') }}</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{ __('message.feedback') }}
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="bootstrap-data-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">{{ __('message.name') }}</th>
                            <th scope="col">{{ __('message.email') }}</th>
                            <th scope="col">{{ __('message.product') }}</th>
                            <th scope="col">{{ __('message.content') }}</th>
                            <th scope="col">{{ __('message.status') }}</th>
                            <th scope="col">{{ __('message.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td scope="row">{{ $feedback->id }}</td>
                                <td>{{ $feedback->user->name }}</td>
                                <td>{{ $feedback->user->email }}</td>
                                <td>{{ $feedback->product->name }}</td>
                                <td>{{ $feedback->content }}</td>
                                <td>{{ $feedback->status }}</td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="#feedbackModel{{ $feedback->id }}" class="btn btn-outline-primary" title="Respone">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <div class="modal fade" id="feedbackModel{{ $feedback->id }}" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="feedback" aria-hidden="true">
                                        <div class="modal-dialog modal-lg model-big" >
                                            <div class="modal-content">
                                                {!! Form::open(['method' => 'post', 'route' => 'admin.feedback.send', 'id' => $feedback->id, 'files' => true]) !!}
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="titleModalProduct">{{ __('message.reply') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    {!! Form::label('email', __('message.email'), ['class' => 'pr-1 form-control-label']) !!}
                                                                    {!! Form::text('email', $feedback->user->email, ['class' => 'form-control', 'required']) !!}
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::label('content', __('message.content')) !!}
                                                                    {!! Form::textarea('content', '', ['class' => 'form-control ckeditor']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        {!! Form::submit(__('message.send'), ['class' => 'btn btn-primary']) !!}
                                                        {!! Form::button(__('message.cancel'), ['class' => 'btn btn-secondary', 'data-dismiss' => 'model']) !!}
                                                    </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table').DataTable();
        } );
    </script>
@endsection
