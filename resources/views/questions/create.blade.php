@extends ('layouts.master')


@section ('content')
    <div class="row">
    	<div class="col-8 main">
    		<h4>Create a new Question</h4>
		    <form method="POST" action="/exams/{{$exam_id}}/questions">
		    	{{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ Session::token() }}">
			    <div class="form-group">
			      <input type="text" class="form-control" name="description" placeholder="Question">
			    </div>
             
                <div class="form-group row">
                    <label for="option_1" class="col-sm-2 col-form-label">Option 1</label>
                    <input type="text" class="form-control col-sm-10" id="option_1" name="option_1" placeholder="option 1">
                </div>
                <div class="form-group row">
                    <label for="option_2" class="col-sm-2 col-form-label">Option 2</label>
                    <input type="text" class="form-control col-sm-10" id="option_2" name="option_2" placeholder="option 2">
                </div>
                <div class="form-group row">
                    <label for="option_3" class="col-sm-2 col-form-label">Option 3</label>
                    <input type="text" class="form-control col-sm-10" name="option_3" id="option_3" placeholder="option 3">
                </div>
                <div class="form-group row">
                    <label for="option_4" class="col-sm-2 col-form-label">Option 4</label>
                    <input type="text" class="form-control col-sm-10" name="option_4" id="option_4" placeholder="option 4">
                </div>
                <div class="form-group row">
                    <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-primary">
                        <input type="radio" name="answer" value="option_1" autocomplete="off"> Option 1
                      </label>
                      <label class="btn btn-primary">
                        <input type="radio" name="answer" value="option_2"  autocomplete="off"> Option 2
                      </label>
                      <label class="btn btn-primary">
                        <input type="radio" name="answer" value="option_3"  autocomplete="off"> Option 3
                      </label>
                      <label class="btn btn-primary">
                        <input type="radio" name="answer" value="option_4"  autocomplete="off"> Option 4
                      </label>
                    </div>
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