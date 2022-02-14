@extends('layouts.user-layout')


@section('content')

<div class="card-header">{{ $acc->first_name}} {{ $acc->middle_name}} {{ $acc->last_name}}</div>

<div class="card-body">
    <form method="POST" action="{{ route('updateRole',['id'=>$acc->id]) }} " enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label for="role_id"  class="col-md-2 col-form-label text-md-end">{{ __('translate.role') }}</label>
            <div class="col-md-5">
                <select class="form-select form-control @error('role_id') is-invalid @enderror" aria-label="Default select example" id="role_id" name="role_id">
                    <option {{ $acc->role_id==1 ? 'selected=""' : '' }} value=1>User</option>
                    <option {{ $acc->role_id==2 ? 'selected=""' : '' }} value=2>Admin</option>
                </select>
                @error('role_id')
                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6-md-4 text-md-end">
                <button type="submit" class="btn btn-primary">
                    {{ __('translate.save') }}
                </button>
            </div>
        </div>
    </form>

</div>
@endsection
