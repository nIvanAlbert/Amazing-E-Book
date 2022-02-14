@extends('layouts.guest-layout')

@section('content')

<div class="row">
    <h1>{{ __('translate.register') }}</h1>
</div>
<div class="row d-flex align-items-center h-75">
    <form method="POST" action="{{ route('register') }} " enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <label for="first_name" class="col-md-2 col-form-label text-md-end">{{ __('translate.fname') }}</label>

            <div class="col col-1g-10">
                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}"  autocomplete="first_name" autofocus>

                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="middle_name" class="col-md-2 col-form-label text-md-end">{{ __('translate.mname') }}</label>

            <div class="col col-1g-10">
                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}"  autocomplete="middle_name" autofocus>

                @error('middle_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="last_name" class="col col-md-2 col-form-label text-md-end">{{ __('translate.lname') }}</label>

            <div class="col col-1g-10">
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"  autocomplete="last_name" autofocus>

                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="gender_id" class="col-md-2 col-form-label text-md-end">{{ __('translate.gender') }}</label>
            <div class="col col-md-2"></div>
            <div class="col col-1g-5 d-flex justify-content-between">
                <div class="form-check">
                    <input class="form-check-input @error('_id') is-invalid @enderror" type="radio" name="gender_id" id="Male" value="1" {{ old('gender_id')==1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault1">
                        {{ __('translate.male') }}
                    </label>
                  </div>
                  <p></p>
                  <div class="form-check">
                    <input class="form-check-input @error('gender_id') is-invalid @enderror" type="radio" name="gender_id" id="Female" value="2" {{ old('gender_id')==2 ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault2">
                        {{ __('translate.female') }}
                    </label>
                </div>

                @error('gender_id')
                    <span class="invalid-feedback d-block"  role="alert">
                        <strong class="ml-3">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="role_id"  class="col-md-2 col-form-label text-md-end">{{ __('translate.role') }}</label>
            {{-- <div class="col-md-2"></div> --}}
            <div class="col-md-5">
                <select class="form-select form-control @error('role_id') is-invalid @enderror" aria-label="Default select example" id="role_id" name="role_id">
                    <option value="">{{ __('translate.choose') }}</option>
                    <option value=1>User</option>
                    <option value=2>Admin</option>
                </select>
                @error('role_id')
                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('translate.email') }}</label>

            <div class="col-md-10">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-2 col-form-label text-md-end">{{ __('translate.password') }}</label>

            <div class="col-md-10">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row-mb-3">
            <label for="profile_img" class="col-form-label ">{{ __('translate.pimg') }}</label>
           <input class="form-control form-control-lg form-label-primary" id="profile_img" name="profile_img" type="file">
           @error('profile_img')
               <span class="invalid-feedback d-block" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
      </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('translate.register') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
