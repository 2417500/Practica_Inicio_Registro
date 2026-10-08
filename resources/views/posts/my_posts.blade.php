@extends('layouts.app')

@section('content')
<h2 style="margin-bottom: 20px;">Mis Publicaciones</h2>

<div class="table-container">
    <table class="custom-table">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Título</th>
                <th>Contenido</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr>
                    <td><span class="badge badge-{{ $post->type }}">{{ $post->type }}</span></td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta entrada?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding: 5px 10px; font-size: 0.8rem;">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Aún no has creado ninguna publicación.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection