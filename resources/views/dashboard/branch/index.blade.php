@extends('dashboard_layout')

@section('title')
Branch
@endsection

@section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Branch</a></li>
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
                                <h4>Branch</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('branch.create')}}" class="btn btn-outline-primary ">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Add new Branch
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Last Update</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branches as $index=>$item)
                                <tr>
                                    <th>{{ $index + 1 }}</th>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['phone']}}</td>
                                    <td>
                                        @if (!empty($item['addresses']['address']))
                                        {{ $item['addresses']['address']}}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item['status'] == 0)
                                        Draft
                                        @else
                                        Published
                                        @endif
                                    </td>
                                    <td>
                                        {{\Carbon\Carbon::parse($item['updated_at'])->format('d-m-Y H:i:s A') }}
                                        {{--
                                        {{\Carbon\Carbon::createFromTimeStamp(strtotime($item['updated_at']))->diffForHumans()}}
                                        --}}

                                    </td>

                                    <td>
                                        <a href="{{ route('branch.edit', $item['id'])}}" class="btn btn-outline-info">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('branch.destroy', $item['id']) }}" method="post">
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