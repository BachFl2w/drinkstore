@extends('layouts.app_admin')

@section('page-title')
    <li><a href="{{ route('admin.index') }}">{{ __('message.title.dashboard') }}</a></li>
    <li class="active">{{ __('message.category') }}</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{ __('message.category') }}</strong>
                <div class="float-right">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-outline-info"
                       title="show">{{ __('message.create') }}</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="admin_category_list">
                    <thead>
                    <tr>
                        <th>{{ __('message.id') }}</th>
                        <th>{{ __('message.category') }}</th>
                        <th>{{ __('message.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}"
                                   class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('admin.category.destroy', ['id' => $category->id]) }}"
                                   class="btn btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
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
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#admin_category_list').DataTable();
        });
    </script>
@endsection
