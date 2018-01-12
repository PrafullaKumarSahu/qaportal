@extends ('layouts.master')


@section ('content')
  <div class="row">
      <div class="col-8 main">
          <h1>{{ $exam->title }}</h1>
          <p>{{ $question->description }}</p>
          
          @if ( count($options) )
              <div class="option-group" data-toggle="buttons">
                  @foreach ( $options as $option )
                  <div class="checkbox">
                      <label class="row option-label" for="option-{{$option->id}}">
                          <input type="checkbox" name="answer" value="{{$option->id}}" autocomplete="off" id="option-{{$option->id}}"> {{$option->description}}
                      </label>
                  </div>
                  @endforeach  
              </div>
          @endif
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