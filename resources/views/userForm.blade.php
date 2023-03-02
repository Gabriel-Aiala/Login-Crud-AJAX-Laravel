@extends('templates.basicTemplate')
@section('content')



<div class="container-fluid h-100">
    
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-4">
      <h1>Criar Usuario</h1>
      <hr>
        <form>
        @csrf
        <div class="alert  d-none messageBox"></div>
          <div class="form-group">
            <label for="name">Usuário</label>
            <input type="text" class="form-control"  name="name" id="name" placeholder="Digite seu nome de usuário">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu melhor email">
          </div>
          <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Digite sua senha">
          </div>
          <button type="submit" class="btn btn-success btn-submit">Criar Usuario</button> <a class =" btn btn-danger" href="{{route('listUsers')}}"> Voltar </a>
        </form>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
      
      
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
    $(".btn-submit").click(function(e){
    
        e.preventDefault();

        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
     
        $.ajax({
           type:'POST',
           url:"{{ route('store') }}",
           data:{name:name, email:email,password,password},
           success:function(data){
            $('.messageBox').removeClass('alert-success').removeClass('alert-danger')
                if($.isEmptyObject(data.error)){
                  console.log(data)
                  $('.messageBox').removeClass('d-none').addClass('alert-success').html('usuario '+name +' criado com sucesso')
                    
                   
                }else{
                  
                  $('.messageBox').removeClass('d-none').addClass('alert-danger').html('Não foi posssivel criar o usuario , tente novamente')
                }
           }
        });
    
    });
  
    
  
</script>

@endsection