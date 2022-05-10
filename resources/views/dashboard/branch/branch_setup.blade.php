@extends('dashboard_layout')

@section('title')
Branch User Setup
@endsection

@section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Branch User Setup</a></li>
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
                                <h4>Branch User Setup</h4>
                            </div>
                            {{-- <div class="col-6 text-right">
                                <a href="{{ route('branch-setup')}}" class="btn btn-outline-primary ">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Branch Setup List
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
                                    <th>Role</th>
                                    <th>Branch</th>
                                    <th>Setup</th>
                                    {{-- <th>Last Update</th>
                                    <th>Edit</th>
                                    <th>Delete</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index=>$user)
                                <tr>
                                    <th>{{ $index + 1 }}</th>
                                    <td>
                                        @if (!empty($user['photo']))
                                        <img src="{{asset('photo/user_photo')}}/{{$user['photo']}}"
                                            alt="{{ $user['name'] }}" height="50px">
                                        @else
                                        N/A
                                        @endif

                                    </td>
                                    <td>{{ $user['name'] }}</td>
                                    <td>
                                        @if (!empty($user['roles']))
                                        {{ $user['roles']['title']}}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($user['branch']))
                                        {{ $user['branch']['name']}}
                                        @else
                                        N/A
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('branch_user_setup', $user['id'])}}"
                                            class="btn btn-outline-info">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </a>
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