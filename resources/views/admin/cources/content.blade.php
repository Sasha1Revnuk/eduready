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
<!-- END Navigation info -->

    <!-- Search Results -->
    <div class="page-header page-header-top clearfix">
        <div class="row">
            <h4 class="text-center">Назва курсу</h4>
        </div>
        <div class="row form-group">
            <div class="col-md-4">
                <a href="необхідний шлях" class="btn btn-success"><i class="fa fa-plus"></i> Додати секцію</a>
            </div>
        </div>
    </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Назва</th>
                <th class="hidden-xs hidden-sm"> Кількість уроків</th>
                <th class="cell-small text-center"><i class="fa fa-bolt"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-center">1</td>
                <td><a href="javascript:void(0)">username1</a></td>
                <td class="hidden-xs hidden-sm">user1@example.com</td>
                <td class="text-center">
                    <div class="btn-group">
                        <a href="javascript:void(0)" data-toggle="tooltip" title="Видалити" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
</div>