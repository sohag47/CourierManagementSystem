@extends('dashboard_layout')

@section('title')
Add New Shipment
@endsection

@section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Add New Shipment</a></li>
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
                            <div class="col-3">
                                <h4>Add New Shipment</h4>
                            </div>
                            <div class="col-3">
                                <ul>
                                    @foreach ($price as $item)
                                    <li>{{ $item['type'] }} - {{ $item['price']}} Taka</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('courier.index')}}" class="btn btn-outline-primary ">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    Shipment List
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="form-validation">
            <form class="form-valide" action="{{ route('courier.store')}}" method="post">
                @csrf

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="col-form-label" for="sender_name">
                                                Sender Name <span class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <input type="text"
                                                    class="form-control @error('sender_name') is-invalid @enderror"
                                                    id="sender_name" name="sender_name"
                                                    placeholder="Enter a Sender Name" required
                                                    value="{{ old('sender_name') }}">
                                                @error('sender_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="col-form-label" for="sender_phone">
                                                Sender Phone<span class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <input type="text"
                                                    class="form-control @error('sender_phone') is-invalid @enderror"
                                                    id="sender_phone" name="sender_phone"
                                                    placeholder="Enter a Sender Phone Number" required
                                                    value="{{ old('sender_phone') }}">
                                                @error('sender_phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="col-form-label" for="recipient_name">
                                                Recipient Name <span class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <input type="text"
                                                    class="form-control @error('recipient_name') is-invalid @enderror"
                                                    id="recipient_name" name="recipient_name"
                                                    placeholder="Enter a Recipient Name" required
                                                    value="{{ old('recipient_name') }}">
                                                @error('recipient_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="col-form-label" for="recipient_phone">
                                                Recipient Phone<span class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <input type="text"
                                                    class="form-control @error('recipient_phone') is-invalid @enderror"
                                                    id="recipient_phone" name="recipient_phone"
                                                    placeholder="Enter a Recipient Phone Number" required
                                                    value="{{ old('recipient_phone') }}">
                                                @error('recipient_phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-form-label" for="sender_address">
                                                Sender Address <span class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <input type="text"
                                                    class="form-control @error('sender_address') is-invalid @enderror"
                                                    id="sender_address" name="sender_address"
                                                    placeholder="Enter a Sender Address" required
                                                    value="{{ old('sender_address') }}">
                                                @error('sender_address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-form-label" for="recipient_address">
                                                Recipient Address<span class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <input type="text"
                                                    class="form-control @error('recipient_address') is-invalid @enderror"
                                                    id="recipient_address" name="recipient_address"
                                                    placeholder="Enter a Recipient Address" required
                                                    value="{{ old('recipient_address') }}">
                                                @error('recipient_address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- <div class="card-title">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4>Add New Shipment</h4>
                                        </div>
                                        <div class="col-6 text-right">
                                            <a href="{{ route('courier.index')}}" class="btn btn-outline-primary ">
                                                <i class="fa fa-list" aria-hidden="true"></i>
                                                Shipment List
                                            </a>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-form-label" for="description">
                                                Description <span class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <input type="text"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    id="description" name="description"
                                                    placeholder="Enter a Description" required
                                                    value="{{ old('description') }}">
                                                @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-form-label" for="weight">
                                                Weight <span class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <input type="text"
                                                    class="form-control @error('weight') is-invalid @enderror"
                                                    id="weight" name="weight" placeholder="Enter a Weight" required
                                                    value="{{ old('weight') }}">
                                                @error('weight')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="price">
                                                Price <span class="text-danger">*</span>
                                            </label>
                                            <div class="">
                                                <input type="text"
                                                    class="form-control @error('price') is-invalid @enderror" id="price"
                                                    name="price" placeholder="Enter a Price" required
                                                    value="{{ old('price') }}">
                                                @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-form-label" for="sender_branch_id">
                                                From Branch <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control @error('sender_branch_id') is-invalid @enderror"
                                                id="sender_branch_id" name="sender_branch_id" readonly>
                                                {{-- <option value="">Please select</option> --}}
                                                @foreach ($branches as $item)
                                                @if (Auth::user()->branch_id == $item['id'])                                                
                                                <option value="{{ $item['id']}}" @if (Auth::user()->branch_id ==
                                                    $item['id'])
                                                    selected
                                                    @endif>{{
                                                    $item['name']}}
                                                </option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('sender_branch_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-form-label" for="recipient_branch_id">
                                                To Branch <span class="text-danger">*</span>
                                            </label>
                                            <select
                                                class="form-control @error('recipient_branch_id') is-invalid @enderror"
                                                id="recipient_branch_id" name="recipient_branch_id">
                                                <option value="">Please select</option>
                                                @foreach ($branches as $item)
                                                @if (Auth::user()->branch_id == $item['id'])

                                                @else
                                                <option value="{{ $item['id']}}">{{ $item['name']}}
                                                </option>
                                                @endif

                                                @endforeach
                                            </select>
                                            @error('recipient_branch_id')
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

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- #/ container -->

@endsection