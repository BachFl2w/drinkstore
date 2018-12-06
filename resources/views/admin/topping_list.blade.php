@extends('layouts.app_admin')

@section('page-title')
    <li><a href="{{ route('admin.index') }}">{{ __('message.title.dashboad') }}</a></li>
    <li><a>{{ __('message.topping') }}</a></li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{ __('message.topping') }}</strong>
                <div class="float-right">
                    <a href="{{ route('admin.topping.create') }}" class="btn btn-outline-info"
                       title="show">{{ __('message.create') }}</a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="admin_topping_list">
                    <thead>
                    <tr>
                        <th>{{ __('message.id') }}</th>
                        <th>{{ __('message.topping') }}</th>
                        <th>{{ __('message.price') }}</th>
                        <th>{{ __('message.quantity') }}</th>
                        <th>{{ __('message.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($toppings as $topping)
                        <tr>
                            <td>{{ $topping->id }}</td>
                            <td>{{ $topping->name }}</td>
                            <td>{{ $topping->price }}</td>
                            <td>{{ $topping->quantity }}</td>
                            <td>
                                <a href="{{ route('admin.topping.edit', ['id' => $topping->id]) }}"
                                   class="btn btn-outline-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.topping.destroy', ['id' => $topping->id]) }}"
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
            $('#admin_topping_list').DataTable();
        });
    </script>
@endsection
