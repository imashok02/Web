@extends('layouts.pages')

@section('content')

@foreach($category as $category)


{{$category->questions()->title}}

@endforeach
@endsection