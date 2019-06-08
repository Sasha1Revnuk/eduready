@extends('layouts.admin.pages')
@section('content')
<div id="page-content">
    <div class="page-header page-header-top clearfix">
        <div class="row">
            <h4 class="text-center">{{$data['title']}}</h4>
        </div>
        <form action="{{route('start-test')}}" method="post" class="form-horizontal form-box">
            <div class="col-md-12">
                    {{csrf_field()}}
                    <input type="hidden" name="test_id" value="{{$data['test']->id}}">
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-2">Тест: </label>
                            <div class="col-md-4">
                                <p class="form-control-static">{{$data['test']->title}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-2">Кількість питань: </label>
                            <div class="col-md-4">
                                <p class="form-control-static">{{count($data['test']->questions)}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-2">Час: </label>
                            <div class="col-md-4">
                                <p class="form-control-static">{{$data['time']}}</p>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-md-4">
                                <button class="btn btn-success"><i class="fa fa-arrow-circle-o-up"></i> Старт</button>                            </div>
                        </div>
                    </div>
            </div>
        </form>
    </div>
</div>
@endsection