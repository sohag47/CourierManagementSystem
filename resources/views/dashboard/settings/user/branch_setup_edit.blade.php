@extends('dashboard_layout')

@section('title')
Edit User Info
@endsection

@section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit User Info</a></li>
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
                                <h4>Edit User Info</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('branch_setup')}}" class="btn btn-outline-primary ">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    Branch Setup List
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-validation">
                        <form class="form-valide" action="{{ route('branch_user_setup_save', $user['id'])}}"
                            method="post">
                            @csrf
                            <div class="row">

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="name">
                                            Name <span class="text-danger">*</span>
                                        </label>
                                        <div class="">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" placeholder="Enter a Name" required
                                                value="{{ $user['name'] }}" readonly>
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="email">
                                            Email <span class="text-danger">*</span>
                                        </label>
                                        <div class="">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                name="email" placeholder="Enter a Email" required
                                                value="{{ $user['email'] }}" readonly>
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="status">
                                            Branch <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control @error('branch_id') is-invalid @enderror"
                                            id="branch_id" name="branch_id">
                                            <option value="">Please select</option>
                                            @foreach ($branches as $item)
                                            <option value="{{ $item['id']}}" @if ($item['id']==$user['branch_id'])
                                                selected @endif>{{ $item['name']}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('branch_id')
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