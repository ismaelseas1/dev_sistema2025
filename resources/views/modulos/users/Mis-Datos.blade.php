@extends('welcome')
@section('contenido')

<div class="content-wrapper">
    <section class="content-header">
        <h1> Gestor Perfil Usuarios</h1>

    </section>
    <section class="content">
        <div class="box">
         
            <div class="box-body">
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf
            
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control input-lg" name="name" required
                         value="{{auth()->user()->name}}">
                    </div>
                    @error('email')
                    <p class="text-danger">El correo ya existe</p>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="email" class="form-control input-lg" name="email" required
                        value="{{auth()->user()->email}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control input-lg" name="password"
                        
                        placeholder="Escriba su contraseña actual">
                    </div>
                </div>
                <div class="form-group">
                    <input type="file" name="fotoPerfil">
                    <br>

                    @if (auth()->user()->foto !='')
                    <img src="{{url('storage/'.auth()->user()->foto) }}" width="150px" height="150px">
                    @else
                    <img src="{{url('storage/users/anonymous.png')}}" width="150px" height="150px">
                    @endif
                    <br>
                       

                </div>
                <div class="box-footer">
                    <button class="btn btn-primary pull-right" type="submit">Guardar</button>

            </div>
    </section>
</div>

@endsection