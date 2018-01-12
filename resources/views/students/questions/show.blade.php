@extends ('layouts.master')


@section ('content')
  <div class="row">
      <div class="col-8 main">
          <h1>{{ $exam->title }}</h1>
          <p>{{ $question->description }}</p>
          <form method="POST" action="/exams/{{$exam->id}}/questions/{{$question->id}}/answers">
          {{ csrf_field() }}
          @if ( count($options) )
              <div class="option-group">
                  @foreach ( $options as $option )
                  <div class="checkbox">
                      <label class="row option-label" for="option-{{$option->id}}">
                         @if ( $option->id == $user_answer )
                              <input type="checkbox" checked name="answer" value="{{$option->id}}" id="option-{{$option->id}}"> {{ $option->description }}
                          @else
                              <input type="checkbox" name="answer" value="{{$option->id}}" id="option-{{$option->id}}"> {{ $option->description }}
                          @endif
                      </label>
                  </div>
                  @endforeach  
              </div>
          @endif

          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
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