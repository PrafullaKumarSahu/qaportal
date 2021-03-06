@extends ('layouts.master')


@section ('content')
    <div class="row">
    	<div class="col-8 main">
    		<h3>Recommended Exams For You.</h3>
		    @if ($exams)
		       {{--  <select class="custom-select">
		        	<option>Select an Exam</option>
	        		@foreach ($exams as $exam)
	        		    <option value="{{$exam->id}}">{{$exam->title}}</option>
	        		@endforeach
        	    </select> --}}

                <ul class="list-group exams">
                    @foreach ($exams as $exam)
                        <li class="list-group-item"><a href="/exams/{{$exam->id}}">{{$exam->title}}</a></li>
                    @endforeach
                </ul>
		    @else
		        <p>Sorry! Nothing here.</p>
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