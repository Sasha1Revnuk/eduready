<div id="page-content">
    <h3 class="page-header">Категорії</h3>
    <div class="push">
        <a href="{{route('addCategories')}}" class="btn btn-success"><i class="fa fa-plus"></i> Додати категорію</a>
    </div>
    <table class="table table-borderless">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Назва</th>
            <th class="hidden-xs hidden-sm"><i class="fa fa-filter"></i> Кількість курсів</th>
            <th class="cell-small text-center"><i class="fa fa-bolt"></i> Можливості</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['categories'] as $category)
        <tr>
            <td class="text-center">{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td class="hidden-xs hidden-sm">{{$category->courses->count()}}</td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="{{'/adm/categories/edit/' . $category->id}}" data-toggle="tooltip" title="Редагувати" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                    @if($category->courses->count() === 0)
                        <a href="{{'/adm/categories/delete/' . $category->id}}" data-toggle="tooltip" title="Видалити" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>