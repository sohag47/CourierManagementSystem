@extends('dashboard_layout')

@section('title')
Transfer Order
@endsection

@section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Transfer Order</a></li>
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
                                <h4>Transfer Order</h4>
                            </div>
                        </div>
                    </div>
                    <div class="form-validation">
                        <form class="form-valide"
                            action="{{ route('order-transfer', ['id'=> $customer_order_infos[0]['id']])}}"
                            method="post">
                            @csrf
                            <div class="row">

                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="sender_deliveryman_id">
                                            Add Deliveryman <span class="text-danger">*</span>
                                        </label>
                                        <div class="">
                                            <select
                                                class="form-control @error('sender_deliveryman_id') is-invalid @enderror"
                                                id="sender_deliveryman_id" name="sender_deliveryman_id">
                                                <option value="">Please select</option>
                                                @foreach ($delivery_mans as $man)
                                                @if ($man->branchId == $customer_order_infos[0]['sender_branch_id'])
                                                <option value="{{ $man->id}}">{{ $man->name}}- {{ $man->branch_name}}
                                                    branch
                                                </option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('sender_deliveryman_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h4> <b>Order Number:</b> {{ $customer_order_infos[0]['order_id'] }}</h4>
                                    <h4>From {{$customer_order_infos[0]['sender_branches']['name']}} Branch To
                                        {{$customer_order_infos[0]['recipient_branch']['name']}} Branch
                                    </h4>
                                    @if (!empty($customer_order_infos[0]['sender_deliveryman_id']))
                                    <h5><b>Delivery Man:</b>
                                        {{ $customer_order_infos[0]['sender_deliveryman']['name'] }}
                                    </h5>
                                    @endif
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