@extends('layouts.auth')

@section('content')
<div class="auth-wrapper">
    <!-- Lado Izquierdo (Bosquejo) -->
    <div class="auth-hero">
        <h1 style="font-size: 2.5rem; margin-bottom: 20px;">Bienvenido</h1>
        <div class="auth-hero-box">
            <svg class="icon" style="width: 80px; height: 80px;" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
            <p style="margin-top: 10px;">Imagen en todo este recuadro</p>
        </div>
    </div>

    <!-- Lado Derecho (Formulario Login) -->
    <div class="auth-form-container">
        <div class="auth-card">
            <h2 style="text-align: center; margin-bottom: 20px;">INICIO DE SESIÓN</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login.perform') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Correo Electrónico</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary btn-full" style="margin-top: 15px;">Ingresar</button>
            </form>

            <p style="text-align: center; margin-top: 20px; font-size: 0.85rem;">
                ¿No tienes cuenta? <a href="{{ route('register') }}" style="color: var(--brown-red);">Regístrate aquí</a>
            </p>
        </div>
    </div>
</div>
@endsection