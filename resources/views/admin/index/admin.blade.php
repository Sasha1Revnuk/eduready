<div id="page-content">
    <h3 class="page-header">Користувачі</h3>
    <form action="{{route('main-admin')}}" method="get" class="form-horizontal form-box">
        <div class="form-box-content">
            <div class="form-group">
                <label class="control-label col-md-2" for="example-select-multiple">Статус</label>
                <div class="col-md-2">
                    <select id="example-select-multiple" name="status[]" class="form-control" multiple>
                        <option value="1" {{in_array(1, request()->get('status')) ? 'selected' : ''}}>Активний</option>
                        <option value="0" {{in_array(0, request()->get('status')) ? 'selected' : ''}}>Очікування підтвердення</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="example-input-small">Email:</label>
                <div class="col-md-3">
                    <input type="text" id="example-input-small" name="email" class="form-control input-sm" value="{{request()->get('email')}}">
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-md-10 col-md-offset-2">
                    <input type="submit" value="Фільтрувати" class="btn btn-success">
                </div>
            </div>
        </div>
    </form>
    <table class="table table-borderless">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Користувач</th>
            <th class="hidden-xs hidden-sm"><i class="fa fa-envelope-o"></i> Email</th>
            <th class="cell-small text-center"><i class="fa fa-bolt"></i> Функції</th>
        </tr>
        </thead>
        <tbody>
        @php
           // dd($data['users']);
        @endphp
        @foreach($data['users'] as $man)
            <tr class="{{$man->ready == 1 ? 'success' : 'warning'}}">
                <td class="text-center">{{$man->id}}</td>
                <td>{{$man->name}}</td>
                <td class="hidden-xs hidden-sm">{{$man->email}}</td>
                <td class="text-center">
                    <div class="btn-group">
                        @if($man->ready == 0)
                        <a href="{{'/adm/user/active/' . $man->id}}" data-toggle="tooltip" title="Підтвердити" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>
                        @endif
                        <a href="{{'/adm/user/delete/' . $man->id}}" data-toggle="tooltip" title="Видалити" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>