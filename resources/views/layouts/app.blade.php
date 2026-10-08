<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Pensamientos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="app-container">
        <!-- Barra Superior (Basada en Bosquejo) -->
        <header class="top-header">
            <div class="system-title">N del sistema</div>
            <div class="header-actions">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <svg class="icon" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                        Cerrar sesión
                    </button>
                </form>
                <a href="{{ route('profile.show') }}" class="btn">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    Cuenta
                </a>
            </div>
        </header>

        <div class="main-body">
            <!-- Sidebar Lateral (Basado en Bosquejo) -->
            <aside class="sidebar">
                <div class="nav-menu">
                    <a href="{{ route('posts.index') }}" class="nav-item {{ request()->routeIs('posts.index') ? 'active' : '' }}">
                        <svg class="icon" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
                        Muro General
                    </a>
                    <a href="{{ route('posts.my_posts') }}" class="nav-item {{ request()->routeIs('posts.my_posts') ? 'active' : '' }}">
                        <svg class="icon" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
                        Mis Notas
                    </a>
                    <a href="{{ route('posts.create') }}" class="nav-item {{ request()->routeIs('posts.create') ? 'active' : '' }}">
                        <svg class="icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        Nueva Publicación
                    </a>
                </div>

                <div class="sidebar-footer">
                    <button id="theme-toggle" class="btn btn-full">
                        <svg class="icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line></svg>
                        MODO CLARO/OSCURO
                    </button>
                </div>
            </aside>

            <!-- Contenido Dinámico -->
            <main class="content-area">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>