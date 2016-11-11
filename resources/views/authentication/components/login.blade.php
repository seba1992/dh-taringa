{{-- Formulario de login --}}

<div class="container">
  <h1>Login de usuario</h1>

  <form action="/login" method="POST">
  
    {{csrf_field()}}
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    @if($errors->login->has('email'))
      <div class="alert alert-danger">{{ $errors->login->first('email') }}</div>
    @endif

    <div class="form-group">
      <label for="password">Contraseña</label>
      <input type="password" name="password" class="form-control">
    </div>

    @if($errors->login->has('password'))
      <div class="alert alert-danger">{{ $errors->login->first('password') }}</div>
    @endif

    <input type="submit" class="btn btn-default" value="Entrar">
  </form>
</div>
