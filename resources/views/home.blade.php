@extends('layouts.user-layout')


@section('content')

<div class="card-body">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">{{ __('translate.title') }}</th>
            <th scope="col">{{ __('translate.author') }}</th>
            <th scope="col" style="width: 10rem"></th>
          </tr>
        </thead>
        <tbody>
          
         @foreach ($books as $book)
         <tr>
            <td class="p-4">{{ $book->title }}</td>
            <td class="p-4">{{ $book->author }}</td>
            <td class="p-4" style="width: 10rem"><a class="text-decoration-none" href="/detail/{{ $book->id }}">{{ __('translate.learnm') }}</a></td>
          </tr>
             
         @endforeach
        </tbody>
      </table>
</div>
       
@endsection
