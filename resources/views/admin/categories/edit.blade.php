@extends('layouts.admin.pages')
@section('content')
    <div id="page-content">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error!</strong> {{$error}}
                </div>
            @endforeach
        @endif
        <form action="{{'/adm/categories/update'}}" method="post" class="form-horizontal form-box">
            {{csrf_field()}}
            <input type="hidden" value="{{$data['category']->id}}" name="id">
            <h4 class="form-box-header">Редагування категорії</h4>
            <div class="form-box-content">
                <!-- Input Sizes -->
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-input-small">Назва</label>
                    <div class="col-md-3">
                        <input type="text" id="example-input-small" name="name" class="form-control input-sm" value="{{$data['category']->title}}">
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-10 col-md-offset-2">
                        <input type="submit" class="btn btn-success" value="Обновити категорію">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection