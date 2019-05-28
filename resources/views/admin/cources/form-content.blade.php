<div id="page-content">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> {{$error}}
            </div>
        @endforeach
    @endif
    <form action="{{route('saveCourse')}}" method="post" class="form-horizontal form-box" enctype="multipart/form-data">
       {{csrf_field()}}
        <h4 class="form-box-header">{{isset($data['course']) ? 'Редагування курсу ' . $data['course']->title : 'Додати курс'}}</h4>
        <input type="hidden" name="action" value="{{$data['action']}}">
        @if(isset($data['course']))
            <input type="hidden" name="id" value="{{$data['course']->id}}">
        @endif
        <div class="form-box-content">
            <div class="form-group">
                <label class="control-label col-md-2" for="example-input-normal">Назва курсу</label>
                <div class="col-md-3">
                    <input type="text" id="example-input-normal" name="title" class="form-control" value="{{isset($data['course']) ? $data['course']->title  : ''}}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2" for="example-file">Зображення</label>
                <div class="col-md-3">
                    <input type="file" id="example-file" name="image" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2" for="example-textarea">Короткий опис</label>
                <div class="col-md-3">
                    <textarea id="example-textarea" name="desc" class="form-control" rows="3">{{isset($data['course']) ? $data['course']->desc  : ''}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2" for="example-select">Категорія</label>
                <div class="col-md-3">
                    <select id="example-select" name="category" class="form-control">
                        @foreach(\App\Models\Category::all() as $category)
                            @if(isset($data['course']))
                                <option value="{{$category->id}}" {{$data['course']->category->id == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2" for="example-textarea-ckeditor">Опис</label>
                <div class="col-md-10">
                    <textarea id="example-textarea-ckeditor" name="description" class="ckeditor">{{isset($data['course']) ? $data['course']->description : ''}}</textarea>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-10 col-md-offset-2">
                    @if(isset( $data['course']))
                        <a href="{{'/adm/courses/edit?id=' . $data['course']->id}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                    @else
                        <a href="{{route('main-admin')}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                    @endif
                        <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Зберегти</button>
                </div>
            </div>
        </div>
    </form>
</div>