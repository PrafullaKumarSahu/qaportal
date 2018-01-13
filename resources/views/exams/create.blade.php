@extends ('layouts.master')


@section ('content')
    <div class="row">
    	<div class="col-8 main">
    		<h4>Create a new Exam</h4>
		    <form method="POST" action="/exams">
		    	{{ csrf_field() }}
			    <div class="form-group row">
			       <label for="name" class="col-sm-2 col-form-label">Name</label>
			      <input type="text" class="form-control col-sm-10" id="name" name="title" placeholder="Exam name">
			    </div>
			    <div class="form-group row">
			    	<label for="description" class="col-sm-2 col-form-label">Description</label>
			      <textarea class="form-control col-sm-10" name="description" placeholder="Exam description"></textarea>
			    </div>
			    <div class="form-group row">
			    	<label for="question_count" class="col-sm-3 col-form-label">Question Count</label>
			      <input type="number" class="form-control col-sm-2" placeholder="20" id="question_count" name="question_count" min="10" max="50" step="5">
			    </div>

			    <div class="form-group row">
			      <label for="time" class="col-sm-2 col-form-label">Time (in minute)</label>
			      <input type="number" id="time" class="form-control col-sm-2" placeholder="20" name="time" min="10" max="60" step="10">
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