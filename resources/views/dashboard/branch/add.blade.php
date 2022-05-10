@extends('dashboard_layout')

@section('title')
Add New Branch
@endsection

@section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Add New Branch</a></li>
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
                                <h4>Add New Branch</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('branch.index')}}" class="btn btn-outline-primary ">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    Branch List
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-validation">
                        <form class="form-valide" action="{{ route('branch.store')}}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="name">
                                            Name <span class="text-danger">*</span>
                                        </label>
                                        <div class="">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" placeholder="Enter a Branch Name" required
                                                value="{{ old('name') }}">
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="phone">
                                            Phone <span class="text-danger">*</span>
                                        </label>
                                        <div class="">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                id="phone" name="phone" placeholder="Enter a Phone Number" required
                                                value="{{ old('phone') }}">
                                            @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="address">
                                            Address <span class="text-danger">*</span>
                                        </label>
                                        <div class="">
                                            <select class="form-control @error('address_id') is-invalid @enderror"
                                                id="address_id" name="address_id">
                                                <option value="">Please select</option>
                                                @foreach ($addresses as $item)
                                                <option value="{{ $item['address']}}">{{ $item['address']}}</option>
                                                @endforeach
                                            </select>
                                            @error('address_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="status">
                                            Status <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control @error('status') is-invalid @enderror" id="status"
                                            name="status">
                                            <option value="">Please select</option>
                                            <option value="0">Draft</option>
                                            <option value="1" selected>Published</option>
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