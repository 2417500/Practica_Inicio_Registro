@extends('layouts.app')

@section('content')
<h2 style="margin-bottom: 20px;">Información de la Cuenta</h2>

<div class="auth-card" style="max-width: 500px;">
    <div class="form-group">
        <label>Nombre:</label>
        <p><strong>{{ $user->name }}</strong></p>
    </div>
    <div class="form-group">
        <label>Correo Electrónico:</label>
        <p><strong>{{ $user->email }}</strong></p>
    </div>
    <div class="form-group">
        <label>Total de Publicaciones:</label>
        <p><strong>{{ $user->posts_count }}</strong></p>
    </div>
</div>
@endsection