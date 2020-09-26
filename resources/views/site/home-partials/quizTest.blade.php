{{--@extends('site.app')--}}
{{--@section('title-meta')--}}
{{--<title>Quiz Test</title>--}}
{{--@endsection--}}

{{--@section('content')--}}
<section>
    <div class="container bg-white ">


            @if(!empty($msg))

                <div class="alert alert-warning "><h4>{{$msg}}</h4></div>
            @else

                @if(isset($quiz))
                    @if (Carbon\Carbon::now() >$quiz[0]->expiry_date)
                        <div class="alert alert-warning  ">Sorry! The quiz has been expired!!</div>
                    @else

                        <?php $i = 1; ?>


                        <br>
                        <div class="row form-group alert alert-success" style="margin: 0; ">
                            <div class="clo-md-4">
                                {{--<h4 class="alert-info ">Your Questions </h4>--}}
                            </div>
                            <div class="cl-md-8 ">
                                <h5 class="alert-info ">Quiz expiry
                                    date: {{ date('d-M-yy H:m', strtotime($quiz[0]->expiry_date)) }}</h5>
                                <br>
                                <h3>Your Questions</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group ">
                                <form action="{{url('/quiz-login')}}">

                                    @foreach($question as $quest)


                                        <hr>
                                        <div class="form-group alert alert-warning" style="margin: 0;">
                                            <strong><h4>Question {{ $i }} : {!! nl2br($quest->question) !!}</h4>
                                            </strong>
                                        </div>
                                        <div class="form-group">
                                            <input
                                                    type="hidden"
                                                    id="hid"
                                                    name="questions[{{ $i }}]"
                                                    value="{{ $quest->id }}"> <br>
                                            <label class="d-inline form-control mr-2">
                                                <input
                                                        type="radio"
                                                        name="option{{ $quest->id }}"
                                                        value="{{ $quest->option1 }}" required>
                                                <b>{{ $quest->option1 }}</b>
                                            </label>
                                            <label class="d-inline form-control">
                                                <input
                                                        type="radio"
                                                        name="option{{ $quest->id }}"
                                                        value="{{ $quest->option2 }}" required>
                                                <b> {{ $quest->option2 }}</b>
                                            </label>
                                        </div>


                                        <?php $i++; ?>
                                    @endforeach

                                    <button class="btn btn-info " onclick="myFunction()">Next >></button>

                                </form>
                            </div>
                        </div>




                    @endif

                @endif
            @endif
        </div>


</section>

{{--@endsection--}}


<script>

    // $(document).ready(function() {
    //     $('#button').hide();
    // });


    // function myFunction() {
    //
    //     $("input[type=radio]").each(function () {
    //
    //         // If radio button not checked
    //         // display alert message
    //         $('#button').show();
    //     });
    // }
    function myFunction() {

        var radio = [];
        var id = [];

        $("input[type='hidden']").each(function (index) {
            id.push($(this).val());

        });

        $('input:radio:checked').each(function () {


            radio.push($(this).val());

        });
        id.splice(0, 2);
        console.log(id);
        console.log(radio);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            url: '/quiz-save',

            type: 'post',
            cache: false,
            dataType: 'json',
            data: {

                id,
                radio,


            },
        })
    }

</script>