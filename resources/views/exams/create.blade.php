@extends ('layouts.master')


@section ('content')
    <div class="row">
    	<div class="col-8 main">
    		<h4>Create a new Exam</h4>
		    <form method="POST" action="/exams">
		    	{{ csrf_field() }}
			    <div class="form-group">
			      <input type="text" class="form-control" name="title" placeholder="Exam name">
			    </div>
			    <div class="form-group">
			      <textarea class="form-control" name="description" placeholder="Exam description"></textarea>
			    </div>
			    <div class="form-group">
			      <input type="number" class="form-control" name="question_count" min="10" max="50" step="5">
			    </div>

			    <div class="form-group">
			      <input type="number" class="form-control" name="time" min="10" max="60" step="10">
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