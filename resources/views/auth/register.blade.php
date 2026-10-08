@extends('layouts.auth')

@section('content')
<div class="auth-wrapper">
    <div class="auth-hero">
        <h1 style="font-size: 2.5rem; margin-bottom: 20px;">Únete a nosotros</h1>
        <div class="auth-hero-box">
            <svg class="icon" style="width: 80px; height: 80px;" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
            <p style="margin-top: 10px;">Crea tu espacio de pensamientos</p>
        </div>
    </div>

    <div class="auth-form-container">
        <div class="auth-card">
            <h2 style="text-align: center; margin-bottom: 20px;">REGISTRO DE CUENTA</h2>

            @if($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.perform') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nombre Completo</label>
                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label>Correo Electrónico</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary btn-full" style="margin-top: 15px;">Registrarse</button>
            </form>

            <p style="text-align: center; margin-top: 20px; font-size: 0.85rem;">
                ¿Ya tienes una cuenta? <a href="{{ route('login') }}" style="color: var(--brown-red);">Inicia sesión</a>
            </p>
        </div>
    </div>
</div>
@endsection