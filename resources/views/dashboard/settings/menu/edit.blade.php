@extends('dashboard_layout')

@section('title')
Edit Menu
@endsection

@section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Menu</a></li>
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
                                <h4>Edit Menu</h4>
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
                        <form class="form-valide" action="{{ route('menu.update', $menu['id'] )}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="title">
                                            Title <span class="text-danger">*</span>
                                        </label>
                                        <div class="">
                                            <input type="text" class="form-control" id="title" name="title"
                                                value="{{ $menu['title'] }}">
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
                                                value="{{ $menu['route_name'] }}">
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
                                                value="{{ $menu['icon'] }}">
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
                                            @foreach ($menus as $item)
                                            <option value="{{ $item['id'] }}" @if($item['id']==$menu['parent_id'])
                                                selected @endif>
                                                {{ $item['title'] }}
                                            </option>
                                            @endforeach

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
                                            <option value="0" @if ($menu['status']==0) selected @endif>Draft</option>
                                            <option value="1" @if ($menu['status']==1) selected @endif>
                                                Published
                                            </option>


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