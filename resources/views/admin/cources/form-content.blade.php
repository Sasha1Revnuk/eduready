<div id="page-content">
    <form action="{{route('saveCourse')}}page_form_components.html" method="post" class="form-horizontal form-box">
       {{csrf_field()}}
        <h4 class="form-box-header">{{isset($data['course']) ? 'Редагування курсу ' . $course->title : 'Додати курс'}}</h4>
        <input type="hidden" name="action" value="{{$data['action']}}">
        <div class="form-box-content">
            <div class="form-group">
                <label class="control-label col-md-2" for="example-input-normal">Назва курсу</label>
                <div class="col-md-3">
                    <input type="text" id="example-input-normal" name="title" class="form-control" value="{{isset($data['course']) ? $course->title  : ''}}">
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
                    <textarea id="example-textarea" name="desc" class="form-control" rows="3">{{isset($data['course']) ? $course->desc  : ''}}</textarea>
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
                    <textarea id="example-textarea-ckeditor" name="description" class="ckeditor">{{isset($data['course']) ? $course->description : ''}}</textarea>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-10 col-md-offset-2">
                    <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Зберегти</button>
                </div>
            </div>
        </div>
    </form>
</div>