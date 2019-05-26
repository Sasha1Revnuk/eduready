<div id="page-content">
    <form action="" method="post" class="form-horizontal form-box">
        {{csrf_field()}}
        <h4 class="form-box-header">Редагування або додавання уроку</h4>
        <input type="hidden" name="action" value="">
        <div class="form-box-content">
            <div class="form-group">
                <label class="control-label col-md-2" for="example-input-normal">Назва уроку</label>
                <div class="col-md-3">
                    <input type="text" id="example-input-normal" name="title" class="form-control" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="example-file">Зображення</label>
                <div class="col-md-3">
                    <input type="file" id="example-file" name="image" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="example-textarea-ckeditor">Текст уроку</label>
                <div class="col-md-10">
                    <textarea id="example-textarea-ckeditor" name="description" class="ckeditor"></textarea>
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