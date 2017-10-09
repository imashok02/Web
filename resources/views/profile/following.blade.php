  @extends('layouts.pages')


@section('content')

<div class="row block-1-2 block-tab-full">
                    @forelse ($list as $following)
                        <a href="{{ url('/' . $following->username) }}">
                            <p>{{ $following->name }}</p>
                            
                        </a>
                    @empty
                        <p>No users</p>
                    @endforelse
</div>
@endsection