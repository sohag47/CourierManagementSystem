@extends('dashboard_layout')

@section('title')
Address
@endsection

@section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Address</a></li>
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
                                <h4>Address</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('address.create')}}" class="btn btn-outline-primary ">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Add new Address
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Address</th>
                                    <th>Last Update</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($addresses as $index=>$item)
                                <tr>
                                    <th>{{ $index + 1 }}</th>
                                    <td>{{ $item['address'] }}</td>
                                    <td>
                                        {{\Carbon\Carbon::parse($item['updated_at'])->format('d-m-Y H:i:s A') }}
                                        {{--
                                        {{\Carbon\Carbon::createFromTimeStamp(strtotime($item['updated_at']))->diffForHumans()}}
                                        --}}

                                    </td>

                                    <td>
                                        <a href="{{ route('address.edit', $item['id'])}}" class="btn btn-outline-info">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('address.destroy', $item['id']) }}" method="post">
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