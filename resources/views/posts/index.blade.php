@extends('layouts.auth')

@section('content')
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 1.75rem; font-weight: 700; color: #0f172a; margin-bottom: 0.5rem;">
            Pensamientos y Notas de la Comunidad
        </h1>
        <p style="color: #64748b; margin: 0;">Explora las publicaciones recientes compartidas por el equipo.</p>
    </div>

    @if(session('success'))
        <div class="alert-custom">
            {{ session('success') }}
        </div>
    @endif

    <div class="custom-card">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background-color: #f8fafc; border-bottom: 1px solid var(--border-color); color: #475569; font-size: 0.875rem;" class="mono">
                    <th style="padding: 1rem 1.5rem;">Autor</th>
                    <th style="padding: 1rem 1.5rem;">Tipo</th>
                    <th style="padding: 1rem 1.5rem;">Título</th>
                    <th style="padding: 1rem 1.5rem;">Contenido</th>
                    <th style="padding: 1rem 1.5rem;">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr style="border-bottom: 1px solid var(--border-color); font-size: 0.95rem;">
                        <td style="padding: 1rem 1.5rem; font-weight: 600; color: #1e293b; white-space: nowrap;">
                            {{ $post->user->name ?? 'Usuario' }}
                        </td>
                        <td style="padding: 1rem 1.5rem;">
                            <span class="badge-type badge-{{ strtolower($post->type) }}">
                                {{ $post->type }}
                            </span>
                        </td>
                        <td style="padding: 1rem 1.5rem; font-weight: 500; color: #0f172a;">
                            {{ $post->title }}
                        </td>
                        <td style="padding: 1rem 1.5rem; color: #334155; max-width: 350px;">
                            {{ $post->content }}
                        </td>
                        <td style="padding: 1rem 1.5rem; color: #64748b; white-space: nowrap;" class="mono">
                            <small>{{ $post->created_at->format('d/m/Y H:i') }}</small>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 3rem; text-align: center; color: #64748b;">
                            No hay publicaciones registradas aún.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 1.5rem;">
        {{ $posts->links() }}
    </div>
@endsection