<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container-fluid h-100 align-items-center">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-4 align-self-center">
        <form action="{{route('home')}}" method ="POST" name="formLogin">
        @csrf
        <div class="alert alert-danger d-none messageBox"></div>
          <div class="form-group">
            <label for="username">Usuário</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Digite seu nome de usuário">
          </div>
          <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha">
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script>
    $(function(){
      $('form[name="formLogin"]').submit(function(event){
        event.preventDefault();
        $.ajax({
          url:'{{route("home")}}',
          type:'post',
          data: $(this).serialize(),
          dataType:'json',
          success:function(response){
            if (response.success === true)
            {
              window.location.href = '{{ route("listUsers") }}';
            }
else{
              $('.messageBox').removeClass('d-none').html(response.message)
              
            }
          }
        })       
      });
    });
  </script>
</body>
</html>
