@extends ('layouts.master')


@section ('content')
    <div class="row">
    	<div class="col-8 main">
    		<h4>{{ $exam->title }}</h4>
		   <p>{{ $question->description }}</p>
       
        @if ( count($options) )
            <div class="options">
              <ol class="option-group">
                  @foreach ( $options as $option )
                  <li>{{$option->description}}</li>
                  @endforeach  
              </ol>
            </div>
        @endif
       
       <div class="pagination-navigation"> 
      @if ( $previous )
		   <a href="{{ URL::to( '/exams/' . $exam->id . '/questions/' . $previous ) }}">Previous</a>
		   @endif
		   @if ( $next )
           <a href="{{ URL::to( '/exams/' . $exam->id . '/questions/' . $next ) }}">Next</a>
           @endif
       </div>
    	</div>
    	<div class="col-4">
    	   @include('layouts.errors')
    	</div>
    </div>
    
@endsection

@section ('footer')
    <!--Enqueue related scripts-->
@endsection