@extends('dashboard_layout')

@section('title')
Recieved Order
@endsection

@section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Recieved Order</a></li>
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
                                <h4>Recieved Order</h4>
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
                                    <th>Order Recieved</th>
                                    <th>Order Transfer</th>
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
                                        @if (!empty($info['order_received']))
                                        <i class="fa fa-check-circle text-success fa-lg" aria-hidden="true"></i>
                                        @endif
                                    </td>


                                    <td>
                                        <a href="{{ route('order-transfer', $info['id'])}}"
                                            class="btn btn-outline-warning">
                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    {{-- <td>
                                        <form action="{{ route('courier.destroy', $info['id']) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-outline-danger">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>

                                        </form>

                                    </td> --}}
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