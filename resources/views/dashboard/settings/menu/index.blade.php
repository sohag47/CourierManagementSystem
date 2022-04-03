@extends('dashboard_layout')

@section('title')
Menu
@endsection

@section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Menu</a></li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-6">
                                <h4>Menus</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('menu.create')}}" class="btn btn-outline-primary ">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Add new Menu
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Menu</th>
                                    <th>Route</th>
                                    <th>Parent</th>
                                    <th>Icon</th>
                                    <th>Status</th>
                                    <th>Last Update</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $index=>$item)
                                <tr>
                                    <th>{{ $index + 1 }}</th>
                                    <td>{{ $item['title'] }}</td>
                                    <td>{{ $item['route_name'] }}</td>
                                    <td>
                                        @if ($item['parent_id'] == 0)
                                        Parent
                                        @else
                                        {{ $item['title'] }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($item['icon']))
                                        <i class="fa {{ $item['icon'] }}" aria-hidden="true"></i>
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item['status'] == 0)
                                        Draft
                                        @else
                                        Published
                                        @endif
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($item['updated_at'])->diffForhumans() }}

                                    </td>

                                    <td>
                                        <a href="{{ route('menu.edit', $item['id'])}}" class="btn btn-outline-info">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('menu.destroy', $item['id']) }}" method="post">
                                            @method('DELETE')
                                            @csrf

                                            <button class="btn btn-outline-danger">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>

                                        </form>

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
</div>
@endsection