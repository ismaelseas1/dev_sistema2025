@extends('welcome')
@section('contenido')

<div class="content-wrapper">
    <section class="content-header">
        <h1> gestor de usuarios</h1>

    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalCrearUsuario">Crear Usuarios</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive table-hover" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th>Sucursal</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Ultimo login</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->foto != '')
                                    <img src="{{ url('storage/' . $user->foto) }}" class="img-thumbnail" width="40px" height="40px">
                                @else
                                    <img src="{{ url('storage/users/anonymous.png') }}" class="img-thumbnail" width="40px" height="40px">
                                @endif
                            </td>
                            <td>{{ $user->sucursal }}</td>
                            <td>{{ $user->rol }}</td>
                            <td>
                                @if( $user->estado==1 )
                                    <button class="btn btn-success btn-xs">Activo</button>
                                @else
                                    <button class="btn btn-danger btn-xs">Inactivo</button>
                                @endif
                            
                        </td>
                            <td>{{ $user->ultimo_login }}</td>
                            <td>
                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
                            </td>
                            
                        @endforeach

                    </tbody>
                
            </div>
    </section>
</div>
<div class="modal fade" id="modalCrearUsuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="">
                @csrf

                <div class="modal-header" style="background: #3c8dbc; color: white">    
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Crear Usuario</h4>
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
                    <button  class="btn btn-primary" type="submit" >Crear usuario</button>
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