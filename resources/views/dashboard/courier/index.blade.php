@extends('dashboard_layout')

@section('title')
Pending Order
@endsection

@section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Pending Order</a></li>
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
                                <h4>Pending Order</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('courier.create')}}" class="btn btn-outline-primary ">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Add new Order
                                </a>
                            </div>
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
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Order Recieved</th>
                                    <th>Delete</th>
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
                                    <td>
                                        {{\Carbon\Carbon::parse($info['created_at'])->format('d-m-Y H:i:s A') }}
                                    </td>
                                    <td class="text-danger">
                                        @if (empty($info['order_received']))
                                        <i class="fa fa-exclamation-circle text-danger" aria-hidden="true"></i>
                                        Pending Order
                                        @endif
                                    </td>


                                    <td>
                                        <form action="{{ route('order_received', $info['id']) }}" method="post">
                                            @csrf
                                            <button class="btn btn-outline-success">
                                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                            </button>

                                        </form>
                                        {{-- <a href="{{ route('courier.edit', $info['id'])}}"
                                            class="btn btn-outline-success">

                                        </a> --}}
                                    </td>
                                    <td>
                                        <form action="{{ route('courier.destroy', $info['id']) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-outline-danger">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>

                                        </form>

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