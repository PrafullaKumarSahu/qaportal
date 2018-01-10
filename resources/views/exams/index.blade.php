@extends ('layouts.master')


@section ('content')
    <div class="row">
    	<div class="col-8 main">
    		<h1>Exams</h1>
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
		        		    	<td>{{$exam->id}}</td>
		        		    	<td>{{$exam->title}}</td>
		        		    	<!-- Need to update URLs -->
		        		    	<td><a href="/exams/{{$exam->id}}/questions">Manage</a></td>
		        		    	<td><a href="/exams/{{$exam->id}}">Delete</a></td>
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