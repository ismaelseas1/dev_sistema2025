@extends('welcome')
@section('contenido')

<div class="content-wrapper">
    <section class="content-header">
        <h1>SUCURSALES</h1>

    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSucursal">
                    Agregar Sucursal
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped table-hover dt-responsive">
                    <thead>
                        <tr>
                            <th style="width:10px">ID</th>
                            <th>SUCURSALES</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sucursales as $sucursal)

                        @if($sucursal->estado==1)
                        <tr>
                            <td>{{$sucursal->id}}</td>
                            <td>{{$sucursal->nombre}}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning btnEditarSucursal" idSucursal="{{$sucursal->id}}" data-toggle="modal" 
                                        data-target="#modalEditarSucursal"><i class="fa fa-pencil"></i></button>

                                        <a href="Cambiar-Estado-Sucursal/0/{{$sucursal->id}}">
                                            <button class="btn btn-danger">Deshabilitar<i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>

                        @endif
                            
                            
                        @endforeach
                </table>

                <hr>
                <h2>SUCURSALES DESHABILITADAS</h2>
                <table class="table table-bordered table-striped table-hover dt-responsive">
                    <thead>
                        <tr>
                            <th style="width:10px">ID</th>
                            <th>SUCURSALES</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sucursales as $sucursal)

                        @if($sucursal->estado==0)
                        <tr>
                            <td>{{$sucursal->id}}</td>
                            <td>{{$sucursal->nombre}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="Cambiar-Estado-Sucursal/1/{{$sucursal->id}}">
                                        <button class="btn btn-success">Habilitar<i class="fa fa-check"></i></button>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        @endif
                            
                            
                        @endforeach
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modalAgregarSucursal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="">
                @csrf

                <div class="modal-header" style="background: #3c8dbc; color: white">    
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Sucursal</h4>
                </div>

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lg" name="nombre" placeholder="Ingresar sucursal" required>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button  class="btn btn-danger pull-left" type="button" data-dismiss="modal">Salir</button>
                    <button  class="btn btn-primary" type="submit" >Agregar Sucursal</button>
                </div>
                

            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="modalEditarSucursal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{url('Actualizar-Sucursal')}}">
                @csrf
                @method('PUT')

                <div class="modal-header" style="background: #ffc107; color: black">    
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Sucursal</h4>
                </div>

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lg" 
                                name="nombre" id="nombreEditar" required>
                                <input type="hidden" class="form-control input-lg" 
                                name="id" id="idEditar" required>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button  class="btn btn-danger pull-left" type="button" data-dismiss="modal">Cancelar</button>
                    <button  class="btn btn-success" type="submit" >Guardar Cambios</button>
                </div>
                

            </form>

        </div>
    </div>
</div>


@endsection