@extends('layouts.app')

@section('content')
<div class="container">   
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">Dashboard</div> -->

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>LAMAMIA</h1>

                    <h4>An IIM Alumni Edu Venture</h4>

                  {{--
                    <div class="wpb_wrapper"><style>ul{list-style-image:url("https://s3-ap-southeast-1.amazonaws.com/subscriber.images/staging/2016/10/19094007/i-c-tick.png")}</style><ul style="margin-left:10px"><li><b>Learn</b> with engaging Videos from India’s best teachers</li>
<br><li><b>Practice</b> to perfection with chapter-wise tests with feedback and analysis</li>
<br><li><b>Master</b> concepts through customized adaptive learning modules which will make you even better</li>
<br><li><b>Challenge</b> your peers over Quizzo (India's Largest Math &amp; Science Quiz App)</li>
<br><li><b>Compete</b> nationally with the National School Challenge</li>
<br><li><b>Analyze</b> with real time progress updates, in-depth solutions, feedback &amp; recommendations</li>
<br></ul></div>
                    --}}  
                    <div>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        </p>
                        <p>
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
