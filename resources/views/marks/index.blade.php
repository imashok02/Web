@extends('layouts.pages')

@section('content')


  <div id="page-contents">
      <div class="container">
        <div class="row">


<div class="create-post">
              <div class="row">
                <div class="col-md-7 col-sm-7">
                  <div class="form-group">
                    <img src="images/users/user-1.jpg" alt="" class="profile-photo-md" />
                    
  {!! Form::open(['route'=> 'marks.store', 'method'=>'POST'] )!!}
			<h2>Add Mark</h2>
			
                  {{ Form::text('name',null,['class'=>'form-control']) }}
                
			{{ Form::submit('Add Mark',['class'=>'button']) }}

		{!!Form::close()!!}
		</div>
      
                  </div>
                </div>
              </div>
            </div><!-- Post Create Box End-->



            <div class="suggestions" >
              <h4 class="grey">All Marks Available</h4>
              <div class="follow-user">
                
		@foreach ($marks as $mark)
		<li style="list-style: none"> {{$mark->name}} </li>

		@endforeach
		</div>
		</div>

		</div>
		</div>
		</div>





@endsection



                