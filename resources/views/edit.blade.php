@extends('templates.basicTemplate')
@section('content')



<div class="container-fluid h-100">
    
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-4">
      <h1>Editar Usuario</h1>
      <hr>
        <form method = "POST" action= "{{route('update')}}">
        @method('PUT')
        @csrf
        <div class="alert alert-danger d-none messageBox"></div>
          <div class="form-group">
            <label for="name">Usuário</label>
            <input type="text" class="form-control" value = "{{$user->name}}"  name="name" id="name" placeholder="Digite seu nome de usuário">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" value = "{{$user->email}}"  name="email" id="email" placeholder="Digite seu melhor email">
          </div>
          <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" value = "{{$user->password}}"  name="password" id="password" placeholder="Digite sua senha">
          </div>
          <button type="submit" class="btn btn-success btn-submit">Editar Usuario</button> <a class =" btn btn-danger" href="{{route('listUsers')}}"> Voltar </a>
        </form>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  

@endsection