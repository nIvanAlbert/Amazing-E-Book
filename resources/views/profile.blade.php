@extends('layouts.user-layout')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

@section('content')
<div class="card-header">{{ __('translate.profile') }}</div>

<div class="card-body">
    <div class="row">
        <div class="col col-lg-4 d-flex align-items-center">
            <img class="card-img w-100" src="{{ asset(Auth::user()->display_picture_link) }}" alt="Card image cap">
        </div>
        <div class="col col-lg-8">
            <form method="POST" action="{{ route('modProfile') }} " enctype="multipart/form-data">
                @csrf
        
                <div class="row mb-3">
                    <label for="first_name" class="col-md-2 col-form-label text-md-end">{{ __('translate.fname') }}</label>
        
                    <div class="col col-1g-10">
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ Auth::user()->first_name }}"  autocomplete="first_name" autofocus>
        
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
                        <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ Auth::user()->middle_name }}"  autocomplete="middle_name" autofocus>
        
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
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ Auth::user()->last_name }}"  autocomplete="last_name" autofocus>
        
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
                            <input class="form-check-input @error('_id') is-invalid @enderror" type="radio" name="gender_id" id="Male"  value="1" {{ Auth::user()->gender_id==1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                {{ __('translate.male') }}
                            </label>
                          </div>
                          <p></p>
                          <div class="form-check">
                            <input class="form-check-input @error('gender_id') is-invalid @enderror" type="radio" name="gender_id" id="Female" value="2" {{ Auth::user()->gender_id==2 ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                {{ __('translate.female') }}
                            </label>
                        </div>
                        <div class="col col-md-3"></div>
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
                            <option {{ Auth::user()->role_id==1 ? 'selected=""' : '' }} value=1>User</option>
                            <option {{ Auth::user()->role_id==2 ? 'selected=""' : '' }} value=2>Admin</option>
                        </select>
                        @error('role_id')
                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('translate.email') }}</label>
        
                    <div class="col-md-10">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}"  autocomplete="email">
        
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
                <div class="row-mb-5">
                    <label for="profile_img" class="col-md-2 col-form-label text-md-end ">{{ __('translate.pimg') }}</label>
                   <input class="form-control form-control-lg form-label-primary" id="profile_img" name="profile_img" type="file">
                   @error('profile_img')
                       <span class="invalid-feedback d-block" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                    @enderror
              </div>
        
                <div class="row mt-3">
                    <div class="col-md-6-md-4 text-md-end">
                        <form action="{{ route('modProfile')}}" method="POST">
                            <button type="submit" class="btn btn-primary">
                                {{ __('translate.save') }}
                            </button>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
