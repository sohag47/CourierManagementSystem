@extends('dashboard_layout')

@section('title')
Dashboard
@endsection

{{-- @section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Inbox</a></li>
        </ol>
    </div>
</div>
@endsection --}}

@section('content')
<div class="container-fluid mt-3">


    <div class="row">

        <div class="col-xl-6 col-lg-12 col-sm-12 col-xxl-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title mb-0">Store Location</h4> --}}
                    {{-- <div id="world-map" style="height: 470px;"></div> --}}
                    <img src="{{ asset('dashboard/images/dashboard_img.jpg') }}" alt="" style="height: 470px;">
                </div>
            </div>
        </div>
    </div>




</div>
@endsection