@extends('layouts.admin.pages')
@section('content')
    <div id="page-content">
        @if($value = \Illuminate\Support\Facades\Session::pull('PasswordChange'))
            <div class="alert alert-success alert-dismissible" style="z-index: 9999">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{$value}}
            </div>
        @endif
        @if($value = \Illuminate\Support\Facades\Session::pull('ProfileChange'))
            <div class="alert alert-success alert-dismissible" style="z-index: 9999">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{$value}}
            </div>
        @endif
        @if($value = \Illuminate\Support\Facades\Session::pull('testDelete'))
            <div class="alert alert-success alert-dismissible" style="z-index: 9999">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{$value}}
            </div>
    @endif

    <!-- END Navigation info -->

        <!-- Search Results -->
        <div class="page-header page-header-top clearfix">
            <div class="row">
                <h4 class="text-center">{{$data['title']}}</h4>
            </div>
            <form class="form-horizontal">
                <div class="col-md-4 text-center">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="text" id="example-input-typeahead" class="form-control" name="name" placeholder="Назва курсу" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Курс:</label>
                            <select class="form-control" id="example-select" name="cource" >
                                <option value="0">--</option>
                                @foreach($data['courceFilter'] as $cource)
                                    @if(request()->get('cource'))
                                        <option value="{{$cource->id}}" {{request()->get('cource') == $cource->id ? 'selected' : ''}} >{{$cource->title}}</option>
                                    @else
                                        <option value="{{$cource->id}}" >{{$cource->title}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <button class="btn btn-info"><i class="fa fa-filter"></i> Фільтр</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Назва тесту</th>
                <th>Курс</th>
                <th>Бали</th>
            </tr>
            </thead>
            <tbody>
                @if(count($data['tests']) > 0)
                    @foreach($data['tests'] as $testCollection)
                        @foreach($testCollection as $test)
                            <tr>
                                @php
                                    $mark = \App\Models\TestResult::where('test_id', $test->id)->where('user_id', $data['user']->id)->first();
                                @endphp
                                <td class="text-center">{{$test->id}}</td>
                                @if($mark)
                                    <td>{{$test->title}}</td>
                                @else
                                   <td><a href="{{'/adm/tests/info?test_id=' . $test->id}}">{{$test->title}}</a></td>

                                @endif
                                <td>{{\App\Models\Course::find($test->cource_id)->title}}</td>
                                @if($mark)
                                <td>{{$mark->mark}}</td>
                                @else
                                    <td>0</td>
                                @endif
                            </tr>
                        @endforeach
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection