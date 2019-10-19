@extends("layout")

@section("pagina")
Crear usuarios de sistema
@endsection

@section("content")
<div class="row">
    <div class="col-md-12" style="margin-bottom:10px;">
        <a href="{{ route('usuarios.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Volver</a>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{ isset($object) ? "Editar" : "Crear" }} usuarios de sistema</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('usuarios.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @if(isset($object))
                        <input type="hidden" id="id" value="{{ $object->id }}" required name="id" class="form-control">
                    @endif

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" id="nombre" value="{{ isset($object) ? $object->nombre : '' }}" required name="nombre" placeholder="Nombre" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                            <input type="email" id="email" value="{{ isset($object) ? $object->email : '' }}" required name="email" placeholder="Email" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-unlock-alt"></i></div>
                            <input type="password" id="password" value="" required name="password" placeholder="Password" class="form-control">
                        </div>
                    </div>

                    <div class="form-actions form-group">
                        <button type="submit" class="btn btn-success btn-sm">{{ isset($object) ? "Editar" : "Crear" }}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section("scripts")

@endsection
