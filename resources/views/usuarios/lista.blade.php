@extends("layout")


@section("pagina")
Usuarios de sistema
@endsection

@section("styles")
<link rel="stylesheet" href="{{ asset('assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
@endsection

@section("content")
<div class="row">
    <div class="col-md-12" style="margin-bottom:10px;">
        <a href="{{ route($ruta .'.create') }}" class="btn btn-primary btn-sm">Agregar <i class="fa fa-plus"></i></a>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{ ucfirst($ruta) }}</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataList as $object)
                            <tr>
                                <td>{{ $object->id }}</td>
                                <td>{{ $object->nombre }}</td>
                                <td>{{ $object->email }}</td>
                                <td>
                                    <form
                                    id="form_delete_{{ $object->id }}"
                                    action="{{ route($ruta .'.destroy',[$object->id]) }}"
                                    method="POST"
                                    >
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    </form>

                                    <a class="btn btn-success btn-sm" href="{{ route($ruta .'.edit',[$object->id]) }}"><i class="fa fa-pencil"></i></a>

                                    <a class="btn btn-danger btn-sm" href="javascript:eliminar({{ $object->id }});"><i class="fa fa-{{ Request::has('lista') ? 'times': 'trash' }}"></i></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section("scripts")
<script src="{{ asset('assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/js/init/datatables-init.js') }}"></script>
<script>
function eliminar(id){
    var r = confirm("¿Desea esta acción?");
    if (r == true) {
        $("#form_delete_"+ id).trigger("submit");
    } else {

    }
}
</script>
@endsection
