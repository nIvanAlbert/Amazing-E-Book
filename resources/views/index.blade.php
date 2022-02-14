@extends('layouts.guest-layout')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

@section('content')
@endsection