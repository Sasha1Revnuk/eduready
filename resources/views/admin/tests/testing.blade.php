@extends('layouts.admin.pages')
@section('content')
<div id="page-content">
    <div class="page-header page-header-top clearfix">
        <div class="row">
            <h4 class="text-center">{{$data['title']}}</h4>
        </div>
        <div class="row push">
            <div class="col-sm-12">
                <div id="example-progress-bar" class="progress">
                    <div class="progress-bar progress-bar-success"></div>
                </div>
            </div>
        </div>
        <form action="{{route('test-result')}}" method="post" class="form-horizontal form-box">
            <div class="col-md-12">
                    {{csrf_field()}}
                    <input type="hidden" name="test_id" value="{{$data['test']->id}}">
                    @php
                        $counter = 0;
                    @endphp
                    @foreach($data['test']->questions as $question)
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-4">
                                <p class="form-control-static">{{$question->title}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            @php
                                $counter ++;
                            @endphp
                            @foreach($question->answers as $answer)

                            <div class="col-md-11" style="margin-left: 3%">
                                <input type="checkbox" value="{{$answer->id}}" name="answer[{{$question->id}}][]"> {{$answer->title}}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-4">
                            <button class="btn btn-success"><i class="fa fa-arrow-circle-o-up"></i> Здати тест</button>                            </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection