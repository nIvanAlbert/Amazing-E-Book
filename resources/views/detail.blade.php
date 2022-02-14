@extends('layouts.user-layout')


@section('content')

<div class="card-body p-5">
    <table class="table">
        <thead>
          <tr>
            {{-- <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col" ></th> --}}
            <h1>{{ __('translate.detail') }}</h1>
          </tr>
        </thead>
        <tbody>
         <tr>
            <td class="p-4">{{ __('translate.title') }}: </td>
            <td class="p-4">{{ $book->title }}</td>
          </tr>
          <tr>
            <td class="p-4">{{ __('translate.author') }}: </td>
            <td class="p-4">{{ $book->author }}</td>
          </tr>
          <tr>
            <td class="p-4">{{ __('translate.desc') }}: </td>
            <td class="p-4">{{ $book->description }}</td>
          </tr>
        </tbody>
      </table>
      <div class="row ml-auto text-md-end">
        <form action="{{ route('rent',['id'=>$book->id]) }}" method="POST">
            @csrf
            <button type="submit" class="btn text-white" style="background: linear-gradient(90deg, rgba(2,2,218,1), rgba(0,212,255,1));">
              {{ __('translate.rent') }}
            </button>
        </form>
    </div>
    
</div>
       
@endsection
