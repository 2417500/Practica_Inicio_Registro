<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Pensamientos</title>
    
    <!-- Fuentes de Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --bg-main: #f4f6f8;
            --bg-card: #ffffff;
            --sidebar-bg: #1e293b;
            --sidebar-text: #94a3b8;
            --sidebar-active: #38bdf8;
            --primary: #0f172a;
            --accent: #2563eb;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--bg-main);
            color: var(--text-dark);
            margin: 0;
            min-height: 100vh;
        }

        .mono {
            font-family: 'JetBrains Mono', monospace;
        }

        /* Layout Grid */
        .app-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Navigation */
        .sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            color: white;
            padding: 1.5rem 1rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-shrink: 0;
        }

        .sidebar-brand {
            font-family: 'JetBrains Mono', monospace;
            font-size: 1.1rem;
            font-weight: 700;
            color: #f8fafc;
            padding: 0.5rem 0.75rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #334155;
            padding-bottom: 1rem;
            letter-spacing: -0.5px;
        }

        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: var(--sidebar-text);
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .nav-item:hover, .nav-item.active {
            background-color: #334155;
            color: #ffffff;
        }

        .nav-item.active {
            border-left: 4px solid var(--sidebar-active);
        }

        /* Main Content Wrapper */
        .main-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        .navbar-top {
            background: #ffffff;
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 2rem;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 1rem;
        }

        .content-area {
            padding: 2rem;
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
        }

        /* Custom Cards & Badges */
        .custom-card {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        .badge-type {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            padding: 0.25rem 0.6rem;
            border-radius: 6px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .badge-pensamiento {
            background-color: #fef3c7;
            color: #92400e;
        }

        .badge-nota {
            background-color: #e0f2fe;
            color: #075985;
        }

        .badge-texto {
            background-color: #f3e8ff;
            color: #6b21a8;
        }

        .alert-custom {
            background-color: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .btn-custom {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            cursor: pointer;
            border: none;
        }

        .btn-primary-custom {
            background-color: #2563eb;
            color: white;
        }

        .btn-primary-custom:hover {
            background-color: #1d4ed8;
        }

        .btn-outline-custom {
            border: 1px solid var(--border-color);
            background: white;
            color: var(--text-dark);
        }

        .btn-outline-custom:hover {
            background-color: #f8fafc;
        }

        .btn-danger-custom {
            background-color: #ef4444;
            color: white;
        }

        .btn-danger-custom:hover {
            background-color: #dc2626;
        }
    </style>
</head>
<body>
    <div class="app-layout">
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <div>
                <div class="sidebar-brand">
                    Sistema Pensamientos
                </div>
                <nav class="nav-menu">
                    <a href="{{ route('posts.index') }}" class="nav-item {{ request()->routeIs('posts.index') ? 'active' : '' }}">
                        Muro General
                    </a>
                    <a href="{{ route('posts.my_posts') }}" class="nav-item {{ request()->routeIs('posts.my_posts') ? 'active' : '' }}">
                        Mis Notas
                    </a>
                    <a href="{{ route('posts.create') }}" class="nav-item {{ request()->routeIs('posts.create') ? 'active' : '' }}">
                        Nueva Publicación
                    </a>
                </nav>
            </div>
            
            <div style="border-top: 1px solid #334155; padding-top: 1rem;">
                <button class="btn-custom btn-outline-custom mono" style="width: 100%; justify-content: center; background: #334155; color: white; border: none;">
                    Modo Claro/Oscuro
                </button>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="main-wrapper">
            <!-- Top Header -->
            <header class="navbar-top">
                <a href="#" class="btn-custom btn-outline-custom">
                    Cuenta
                </a>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn-custom btn-danger-custom">
                        Cerrar sesión
                    </button>
                </form>
            </header>

            <!-- Page Content -->
            <main class="content-area">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>