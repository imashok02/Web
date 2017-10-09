@extends('layouts.pages')


@section('content')

 <div class="row block-1-2 block-tab-full">
   		
                    @forelse ($list as $followers)
                        <a href="{{ url('/' . $followers->username) }}">
                            <p>{{ $followers->name }}</p></a>
                                   
                    @empty
                        <p>No users</p>
                    @endforelse
</div>
</div>
</div>


@endsection