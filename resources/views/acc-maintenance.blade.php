@extends('layouts.user-layout')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

@section('content')

<div class="card-body">

    <table class="table table-striped">
        <thead>
          <tr>
            <th class="text-center" scope="col">{{ __('translate.account') }}</th>
            <th class="text-center" scope="col" style="width: 20rem">{{ __('translate.action') }}</th>
          </tr>
        </thead>
        <tbody>
          
         @foreach ($accounts as $acc)
         <tr>
            <td class="p-4 text-center">{{ $acc->first_name}} {{ $acc->middle_name}} {{ $acc->last_name}} - {{ $acc->role->role_desc }}</td>
            <td class="p-4">
              <div class="row justify-content-center">
                <div class="col">
                  <a href="{{ route('editRole',['id'=>$acc->id]) }}" class="btn btn-warning" style=" width:8rem">{{ __('translate.urole') }}</a>
                </div>
                <div class="col">
                  <form action="{{ route('deleteAcc',['id'=>$acc->id]) }}" method="POST">
                    @csrf
                      <button type="submit" class="btn bg-danger text-white ml-2" >
                        {{ __('translate.delete') }}
                      </button>
                  </form>
                </div>
                
            </div>
            </td>
          </tr>
             
         @endforeach
        </tbody>
      </table>
    
</div>
       
@endsection
