{{-- @if(count($errors) > 0)
@foreach($errors->all() as $error)
<br>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ $error }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endforeach
@endif --}}
@if(session('error'))
<div class="row page-titles">
    <div class="col-12 alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ session('error') }}</strong>
    </div>
</div>
@endif

@if(session('status'))
<div class="row page-titles">
    <div class="col-12 alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ session('status') }}</strong>
    </div>
</div>
@endif




{{-- @if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="fe fe-x-octagon fe-16 mr-2"></span>
    <strong>{{ session('error') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="row page-titles">
    <div class="col-12 alert alert-warning alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ session('error') }}</strong>
    </div>
</div>
@endif --}}