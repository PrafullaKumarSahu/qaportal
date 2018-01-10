@extends ('layouts.master')


@section ('content')
    <div class="row">
    	<div class="col-8 main">
    		<h1>{{ $exam->title }}</h1>
		   <h4>{{ $question->description }}</h4>

           @if ( $previous )
		   <a href="{{ URL::to( '/exams/' . $exam->id . '/questions/' . $previous ) }}">Previous</a>
		   @endif
		   @if ( $next )
           <a href="{{ URL::to( '/exams/' . $exam->id . '/questions/' . $next ) }}">Next</a>
           @endif

    	</div>
    	<div class="col-4">
    	   @include('layouts.errors')
    	</div>
    </div>
    
@endsection

@section ('footer')
    <!--Enqueue related scripts-->
@endsection