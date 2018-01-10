@extends ('layouts.master')


@section ('content')
    <div class="row">
    	<div class="col-8 main">
    		<h1>Create a new Question</h1>
		    <form method="POST" action="/exams/{{$exam_id}}/questions">

		    	{{ csrf_field() }}
			    <div class="form-group">
			      <input type="text" class="form-control" name="description" placeholder="Question">
			    </div>
			    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
    	</div>
    	<div class="col-4">
    	   @include('layouts.errors')
    	</div>
    </div>
    
@endsection

@section ('footer')
    <!--Enqueue related scripts-->
@endsection