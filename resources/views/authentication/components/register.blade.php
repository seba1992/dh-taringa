{{-- Formulario de registro --}}
<div class="container">
  <h1>Create tu cuenta!</h1>

  <form action="/register" method="POST">
    {{csrf_field()}}

    {{-- 
      Ver la clase App\Http\Requests\RegisterReqeust para entender por que accedo a los errores como $errors->register->..., y no como $errors->... 
    --}}
    
    {{-- Email del usuario --}}
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" class="form-control" value="{{old('email')}}" >
    </div>
    
    @if($errors->register->has('email'))
      <div class="alert alert-danger">{{ $errors->register->first('email') }}</div>
    @endif

    {{-- Nombre del usuario --}}    
    <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" name="name" value="{{old('name')}}" class="form-control">
    </div>

    @if($errors->register->has('name'))
      <div class="alert alert-danger">{{ $errors->register->first('name') }}</div>
    @endif

    <div class="form-group">
      <label for="name">Apellido</label>
      <input type="text" name="lastname" value="{{old('lastname')}}" class="form-control">
    </div>

    @if($errors->register->has('lastname'))
      <div class="alert alert-danger">{{ $errors->register->first('lastname') }}</div>
    @endif

    <div class="form-group">
      <label for="password">Contraseña</label>
      <input type="password" name="password" class="form-control">
    </div>

    @if($errors->register->has('password'))
      <div class="alert alert-danger">{{ $errors->register->first('password') }}</div>
    @endif

    <div class="form-group">
      <label for="password">Repetir contraseña</label>
      <input type="password" name="password_confirmation" class="form-control">
    </div>

    <input type="submit" class="btn btn-default" value="Registrar">
  </form>
</div>