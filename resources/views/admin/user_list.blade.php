@extends('layouts.app2')

@section('page-title')
    <li><a href="{{ route('admin.user.index') }}">{{ __('message.title.dashboard') }}</a></li>
    <li class="active">{{ __('message.list') }}</li>
@endsection

@section('content')

<div class="animated fadeIn">

    <div class="rows">
        <div class="col-md-12">
            @if (session('success'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if (session('fail'))
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                    {{ session('fail') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <strong class="card-title">{{ __('message.user') }}</strong>
                    <div class="float-right">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-outline-info" title="show">{{ __('message.create') }}</a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">{{ __('message.name') }}</th>
                                <th scope="col">{{ __('message.email') }}</th>
                                <th scope="col">{{ __('message.address') }}</th>
                                <th scope="col">{{ __('message.phone') }}</th>
                                <th scope="col">{{ __('message.avatar') }}</th>
                                <th scope="col">{{ __('message.role') }}</th>
                                <th scope="col">{{ __('message.active') }}</th>
                                <th scope="col">{{ __('message.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $u)
                                <tr>
                                    <th scope="row">{{ $u->id }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->address }}</td>
                                    <td>{{ $u->phone }}</td>
                                    <td>
                                        @if ($u->image)
                                            <img src="{{ asset(config('asset.image_path.avatar') . $u->image) }}" height="100px">
                                        @else
                                            <img src="{{ asset(config('asset.image_path.default') . 'default.jpeg') }}" height="100px">
                                        @endif
                                    </td>
                                    <td>{{ $u->role->name }}</td>
                                    <td>
                                        {!! Form::open(['route' => ['admin.user.active', $u->id], 'method' => 'post']) !!}
                                            <label class="switch switch-3d switch-primary mr-3" for="active_user{{ $u->id }}">
                                                <input type="checkbox" class="switch-input" @if ($u->active == 1)
                                                    {{ 'checked' }}
                                                @endif
                                            ><span class="switch-label"></span> <span class="switch-handle"></span>
                                            </label>
                                            {!! Form::submit('', ['id' => 'active_user' . $u->id, 'class' => 'd-none']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.user.edit', $u->id) }}" class="btn btn-outline-primary" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.user.destroy', $u->id) }}" onclick="return confirm('{{ __('message.delete') }}  ?');" class="btn btn-outline-danger" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table').DataTable();
        }
    </script>
@endsection
