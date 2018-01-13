@extends ('layouts.master')


@section ('content')
    <div class="row">
    	<div class="col-8 main">
    		<h4>Edit this Question</h4>
		    <form method="POST" action="/exams/{{$exam->id}}/questions/{{$question->id}}/update">
                {!! method_field('patch') !!}
		    	{{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ Session::token() }}">
			    <div class="form-group">
			      <input type="text" class="form-control" name="description" value="{{$question->description}}" placeholder="Question">
			    </div>
                
                @if ( $options )
                    @foreach ( $options as $key=>$option )
                        <div class="form-group row">
                            <label for="option-{{$key}}" class="col-sm-2 col-form-label">Option {{$key+1}}</label>
                            <input type="text" class="form-control col-sm-10" id="option-{{$key}}" value="{{$option->description}}" name="option_{{$option->id}}">
                        </div>        
                    @endforeach
                @endif
                
                <div class="form-group row">
                    <div class="btn-group" data-toggle="buttons">
                        @if ( $options )
                            @foreach ( $options as $key=>$option )
                                <label class="btn btn-primary">
                                    @if ( $option->flag )
                                        <input type="checkbox" name="answer" value="{{$option->id}}" autocomplete="off" checked> {{$option->description}}
                                    @else
                                        <input type="checkbox" name="answer" value="{{$option->id}}" autocomplete="off"> {{$option->description}}
                                    @endif
                                </label>                            
                            @endforeach
                        @endif
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