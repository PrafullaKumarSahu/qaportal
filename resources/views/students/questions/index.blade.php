<!-- @extends ('layouts.master') -->


@section ('content')
    <div class="row">
        <div class="col-8 main">
            @if (count($questions))
                <ol>
                    @foreach ( $questions as $question )
                        <li><a href="/exams/{{$exam_id}}/questions/{{$question->id}}">{{ $question->description }}</a></li>
                    @endforeach
                </ol>
            @endif
        </div>
        <div class="col-4">
           @include('layouts.errors')
        </div>
    </div>
    
@endsection

@section ('footer')
    
@endsection