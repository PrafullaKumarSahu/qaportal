@extends ('layouts.master')

@section ('content')
    <div class="row">
    	<div class="col-8 main">
    		<button class="btn btn-primary"><a href="{{$exam->id}}/questions/{{$questions->first()->id}}"> Start</a></button>
    	</div>
    	<div class="col-4">
    	   @include('layouts.errors')
    	</div>
    </div>
    
@endsection

@section ('footer')
    <!--Enqueue related scripts-->
@endsection