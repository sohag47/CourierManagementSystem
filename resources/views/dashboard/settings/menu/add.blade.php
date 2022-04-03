@extends('dashboard_layout')

@section('title')
Add New Menu
@endsection

@section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Add New Menu</a></li>
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
                                <h4>Add New Menu</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('menu.index')}}" class="btn btn-outline-primary ">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    Menu List
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-validation">
                        <form class="form-valide" action="{{ route('menu.store')}}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="title">
                                            Title <span class="text-danger">*</span>
                                        </label>
                                        <div class="">
                                            <input type="text" class="form-control" id="title" name="title"
                                                placeholder="Enter a Menu">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="route_name">
                                            URL <span class="text-danger">*</span>
                                        </label>
                                        <div class="">
                                            <input type="text" class="form-control" id="route_name" name="route_name"
                                                placeholder="Enter a Menu Route">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="icon">
                                            Icon <span class="text-danger">*</span>
                                        </label>
                                        <div class="">
                                            <input type="text" class="form-control" id="icon" name="icon"
                                                placeholder="Enter a fontawesome icon">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="parent_id">
                                            Parent <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" id="parent_id" name="parent_id">
                                            <option value="">Please select</option>
                                            <option value="0">Parent</option>
                                            <option value="1">Menu</option>
                                            {{-- @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['category'] }}</option>
                                            @endforeach --}}

                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="status">
                                            Status <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="">Please select</option>
                                            <option value="0">Draft</option>
                                            <option value="1" selected>Published</option>
                                            {{-- @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['category'] }}</option>
                                            @endforeach --}}

                                        </select>
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