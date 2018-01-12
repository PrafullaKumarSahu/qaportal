@extends ('layouts.master')


@section ('content')
    <div class="row">
    	<div class="col-8 main">
    		<h4>Questions</h4>
            <button type="button" class="btn btn-primary create"><a href="/exams/{{$exam->id}}/questions/create">Create a new Question</a></button>
    		@if (count($questions))
    		    <table class="table table-bordered table-hover">
    		    	<thead>
    		    		<th>ID</th>
    		    		<th>Descripion</th>
    		    		<th>View</th>
    		    		<th>Manage</th>
    		    		<th>Delete</th>
    		    	</thead>
    		    	<tbody>
    		    		@foreach ( $questions as $question )
	    		    		<tr>
	    		    			<td>{{ $question->id }}</td>
	    		    			<td>{{ $question->description }}</td>
	    		    			<td><a href="/exams/{{$exam->id}}/questions/{{$question->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
	    		    			<td><a href="/exams/{{$exam->id}}/questions/{{$question->id}}/edit"><i class="fa fa-pencil edit-icon" aria-hidden="true"></i></a></td>
	    		    			<td><i class="fa fa-times delete-icon" aria-hidden="true"></i></td>
	    		    		</tr>
    		    		@endforeach
    		    		
    		    	</tbody>
    		    </table>
    		    <nav aria-label="navigation">{{ $questions->links() }}</nav>
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