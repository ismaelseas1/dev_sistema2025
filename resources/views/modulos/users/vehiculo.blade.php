@extends('welcome')
@section('contenido')

<div class="content-wrapper">
    <section class="content-header">
        <h1> Inicio</h1>

    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarVehiculo">
                    Agregar Vehiculo
                </button>
            </div>
            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Placa</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Vehiculo 1</td>
                            <td>Toyota</td>
                            <td>Corolla</td>
                            <td>ABC123</td>
                            <td><button class="btn btn-warning">Editar</button></td>
                        </tr>
                        <!-- Agregar más filas según sea necesario -->
                    </tbody>
                </table>
                
                
            </div>
    </section>
</div>


<!-- Modal para agregar vehiculo --> 
<div class="modal fade" id="modalAgregarVehiculo">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="">
                @csrf

                <div class="modal-header" style="background: #3c8dbc; color: white">    
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Vehiculo</h4>
                </div>

                <div class="modal-body">
                <div class="box-body">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>

                            <input type="text" class="form-control input-lg" name="name" placeholder="Ingresar nombre" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">@</span>

                            <input type="email" class="form-control input-lg" name="email" placeholder="Ingresar email" required>
                        </div>
                        @error('email')
                        <p class="text-danger">El correo ya existe</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                            <input type="password" class="form-control input-lg" name="password" placeholder="Ingresar nueva clave" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users"></i></span>

                            <select class="form-control input-lg" name="rol" required>
                                <option value="">Seleccionar rol</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Secretaria">Secretaria</option>
                                <option value="Instructor">Instructor</option>
                                <option value="Soporte">soporte</option>

                            </select>
                        </div>
                    </div>
                    
                
                </div>
            </div>
                <div class="modal-footer">
                    <button  class="btn btn-danger pull-left" type="button" data-dismiss="modal">Salir</button>
                    <button  class="btn btn-primary" type="submit" >Agregar Vehiculo</button>
                </div>
                

            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="modalEditarVehiculo">
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