@extends('layouts.user-layout')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

@section('content')
<div class="card-body">
    <h2 class="card-title">{{ __('translate.cart') }}</h2>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col" style="width: 10rem">{{ __('translate.date') }}</th>
            <th scope="col">{{ __('translate.title') }}</th>
            <th scope="col" style="width: 10rem">{{ __('translate.action') }}</th>
          </tr>
        </thead>
        <tbody>
          
         @forelse ($carts as $cart)
         <tr>
             <td class="p-4" style="width: 10rem">{{ $cart->created_at->format('d M Y') }}</td>
            <td class="p-4">{{ $cart->ebook->title }}</td>
            <td class="p-4" style="width: 10rem">
                <form action="{{ route('deleteCart',['id'=>$cart->id]) }}" method="POST">
                            @csrf
                      <button type="submit" class="btn bg-danger text-white ml-2" value="Delete">{{ __('translate.delete') }}
                      </button>
                </form>
          </tr>
          @empty
          <tr>
            <td class="bg-warning"></td>
            <td class="bg-warning">{{ __('translate.empty') }}</td>
            <td class="bg-warning"></td>
          </tr> 
         @endforelse
        </tbody>
      </table>
      <div class="row ml-auto text-md-end">
        <form action="{{ route('submit') }}" method="POST">
            @csrf
            <button type="submit" class="btn text-white" style="background: linear-gradient(90deg, rgba(2,2,218,1), rgba(0,212,255,1));">
                Submit
            </button>
        </form>
    </div>
</div>
<div class="card-body border-top border-primary border-5 mt-3">
    <h2 class="card-title">{{ __('translate.submitted') }}</h2>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              {{ __('translate.hist') }}
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col" style="width: 10rem">{{ __('translate.date') }}</th>
                            <th scope="col">{{ __('translate.title') }}</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                         @forelse ($histories as $histories)
                         <tr>
                             <td class="p-4" style="width: 10rem">{{ $histories->created_at->format('d M Y') }}</td>
                            <td class="p-4">{{ $histories->ebook->title }}</td>
                          </tr>
                          @empty
                          <tr>
                            <td class="bg-warning">{{ __('translate.empty') }}</td>
                            <td class="bg-warning"></td>
                          </tr> 
                         @endforelse
                        </tbody>
                      </table>
                 </div>
          </div>
        </div>
      </div>
</div>
@endsection
