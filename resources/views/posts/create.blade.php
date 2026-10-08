@extends('layouts.app')

@section('content')
<h2 style="margin-bottom: 20px;">Crear Nueva Publicación</h2>

<div class="auth-card" style="max-width: 600px;">
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Título</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label>Tipo de Contenido</label>
            <select name="type" class="form-control" required>
                <option value="nota">Nota</option>
                <option value="pensamiento">Pensamiento</option>
                <option value="texto">Texto General</option>
            </select>
        </div>

        <div class="form-group">
            <label>Contenido</label>
            <textarea name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Publicación</button>
    </form>
</div>
@endsection