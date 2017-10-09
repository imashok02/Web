@extends('layouts.pages')


@section('content')

<div id="content-wrap" class="styles">

    <div class="row narrow add-bottom text-center">

      <div class="col-twelve tab-full">
@foreach($users as $user)

<li>{{ $user->name }}</li>


@endforeach


@endsection