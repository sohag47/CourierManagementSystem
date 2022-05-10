@extends('dashboard_layout')

@section('title')
User Role
@endsection

@section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">User Role</a></li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<!-- row -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-6">
                                <h4>User Role</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('user.index')}}" class="btn btn-outline-primary ">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    User List
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-validation">
                        <form class="form-valide" action="{{ route('user_permission_save', $user['id'])}}"
                            method="post">
                            @csrf
                            <div class="row">

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="title">
                                            Name <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="title" name="title"
                                                placeholder="Enter a Menu" readonly value="{{ $user['name'] }}">


                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="title">
                                            Email <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="title" name="title"
                                                placeholder="Enter a Menu" readonly value="{{ $user['email'] }}">


                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="status">
                                            User Role <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control @error('user_role') is-invalid @enderror"
                                            id="user_role" name="user_role">
                                            <option value="">Please select</option>
                                            @foreach ($roles as $item)
                                            <option value="{{ $item['id']}}" @if ($item['id']==$user['user_role'])
                                                selected @endif>{{ $item['title']}}</option>
                                            @endforeach
                                        </select>
                                        @error('user_role')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>

                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->

@endsection