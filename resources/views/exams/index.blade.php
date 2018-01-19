@extends ('layouts.master')


@section ('content')
    <div class="row">
    	<div class="col-8 main">
    		<h4>Exams</h4>
    		<button type="button" class="btn btn-primary create"><a href="/exams/create">Create a new Exam</a></button>
		    @if ($exams)
		        <table class="table table-bordered table-hover">
		        	<thead>
		        		<th>ID</th>
		        		<th>Exam Name</th>
		        		<th>Manage</th>
		        		<th>Delete</th>
		        	</thead>
		        	<tbody>
		        		@foreach ($exams as $exam)
		        		    <tr>
		        		    	<td>{{$loop->iteration}}</td>
		        		    	<td>{{$exam->title}}</td>
		        		    	<!-- Need to update URLs -->
		        		    	<td><a href="/exams/{{$exam->id}}/questions"><i class="fa fa-pencil edit-icon" aria-hidden="true"></i></a></td>
		        		    	<td><i class="fa fa-times delete-icon" aria-hidden="true"></i></td>
		        		    </tr>
		        		@endforeach
		        	</tbody>
		        </table>
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