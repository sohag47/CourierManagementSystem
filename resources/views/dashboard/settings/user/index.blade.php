@extends('dashboard_layout')

@section('title')
Users
@endsection

@section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Users</a></li>
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
                                <h4>Users</h4>
                            </div>
                            {{-- <div class="col-6 text-right">
                                <a href="{{ route('role.create')}}" class="btn btn-outline-primary ">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Add new Role
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Permission</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index=>$item)
                                <tr>
                                    <th>{{ $index + 1 }}</th>
                                    <td>
                                        @if (!empty($item['photo']))
                                        <img src="{{asset('photo/user_photo')}}/{{$item['photo']}}"
                                            alt="{{ $item['name'] }}" height="50px">
                                        @else
                                        N/A
                                        @endif

                                    </td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['email'] }}</td>
                                    <td>
                                        @if (!empty($item['phone']))
                                        {{ $item['phone'] }}
                                        @else
                                        N/A
                                        @endif

                                    </td>
                                    <td>
                                        @if (!empty($item['address']))
                                        {{ $item['address'] }}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($item['roles']['title']))
                                        {{ $item['roles']['title'] }}
                                        @else
                                        N/A
                                        @endif


                                    <td>
                                        <a href="{{ route('user_permission', $item['id'])}}"
                                            class="btn btn-outline-info">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('user.edit', $item['id'])}}" class="btn btn-outline-info">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if ($item['roles']['title'] == "Super Admin")
                                        <button class="btn btn-outline-danger" data-toggle="tooltip"
                                            data-placement="top" title="Not Avilable">
                                            <i class="fa fa-user-times" aria-hidden="true"></i>
                                        </button>

                                        @else
                                        <form action="{{ route('role.destroy', $item['id']) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-outline-danger">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        @endif


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