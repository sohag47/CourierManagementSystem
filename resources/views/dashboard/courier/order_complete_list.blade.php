@extends('dashboard_layout')

@section('title')
Delivery Order
@endsection

@section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Delivery Order</a></li>
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
                                <h4>Delivery Order List</h4>
                            </div>
                            {{-- <div class="col-6 text-right">
                                <a href="{{ route('courier.create')}}" class="btn btn-outline-primary ">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Add new Order
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th>Sender Name</th>
                                    <th>Sender Phone</th>
                                    <th>Recipient Name</th>
                                    <th>Recipient Phone</th>
                                    <th>Weight</th>
                                    <th>Price</th>
                                    <th>From Branch</th>
                                    <th>To Branch</th>
                                    <th>Order Transfered</th>
                                    <th>Order Pending</th>
                                    <th>Order Delevered</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customer_order_infos as $index=>$info)
                                <tr>
                                    <th>{{ $index + 1 }}</th>
                                    <td>{{ $info['order_id'] }}</td>
                                    <td>{{ $info['customers']['sender_name'] }}</td>
                                    <td>{{ $info['customers']['sender_phone']}}</td>
                                    <td>{{ $info['customers']['recipient_name']}}</td>
                                    <td>{{ $info['customers']['recipient_phone'] }}</td>
                                    <td>{{ $info['customers']['weight']}} kg</td>
                                    <td>{{ $info['customers']['price']}} taka</td>
                                    <td>
                                        {{ $info['sender_branches']['name'] }}</td>
                                    <td>{{ $info['recipient_branch']['name']}}</td>

                                    <td class="text-success">
                                        @if (!empty($info['sender_deliveryman_id']))
                                        <i class="fa fa-check-circle text-success fa-lg" aria-hidden="true"></i>
                                        @endif
                                    </td>
                                    <td class="text-success">
                                        @if (!empty($info['delivered']))
                                        <i class="fa fa-check-circle text-success fa-lg" aria-hidden="true"></i>
                                        @else
                                        <i class="fa fa-exclamation-circle text-danger fa-lg" aria-hidden="true"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('order-complete-save', $info['id']) }}" method="post">
                                            @csrf
                                            <button class="btn btn-outline-warning">
                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                            </button>

                                        </form>
                                        {{-- <a href="{{ route('order-complete-save', $info['id'])}}"
                                            class="btn btn-outline-warning">
                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                        </a> --}}
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