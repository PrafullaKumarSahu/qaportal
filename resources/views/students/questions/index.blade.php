<!-- @extends ('layouts.master') -->


@section ('content')
    <div class="row">
        <div class="col-8 main">
            <h4>{{ $exam->title }}</h4>
            <p>{{ $exam->description }}</p>
            @if (count($questions))
                <button class="btn btn-primary"><a href="exams/{{$exam->id}}/questions/{{$questions->first()->id}}"> Start</a></button>
                <!-- <ol>
                    @foreach ( $questions as $question )
                        <li>{{ $question->description }}</li>
                    @endforeach
                </ol> -->
            @endif
        </div>
        <div class="col-4">
           @include('layouts.errors')
        </div>
    </div>
    
@endsection

@section ('footer')
    
@endsection