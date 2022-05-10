@extends('dashboard_layout')

@section('title')
Edit Role
@endsection

@section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Role</a></li>
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
                                <h4>Edit Role</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('role.index')}}" class="btn btn-outline-primary ">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    Role List
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-validation">
                        <form class="form-valide" action="{{ route('role.update', $role['id'])}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">

                                <div class="col-8">
                                    <div class="form-group">
                                        <label class="col-form-label" for="title">
                                            Title <span class="text-danger">*</span>
                                        </label>
                                        <div class="">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                id="title" name="title" placeholder="Enter a Menu" required
                                                value="{{ $role['title'] }}">
                                            @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="status">
                                            Status <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control @error('status') is-invalid @enderror" id="status"
                                            name="status">
                                            <option value="">Please select</option>
                                            <option value="0" @if ($role['status']==0) selected @endif>Draft</option>
                                            <option value="1" @if ($role['status']==1) selected @endif>Published
                                            </option>
                                        </select>
                                        @error('status')
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