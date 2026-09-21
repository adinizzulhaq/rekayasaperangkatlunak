<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin | Perpustakaan')
    </title>

    <link
        rel="icon"
        href="{{ asset('images/favicon.png') }}"
        type="image/png">

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* =========================================
           GLOBAL
        ========================================= */

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #F8FAFC;
            color: #111827;
            font-family: 'Inter', sans-serif;
        }


        /* =========================================
           LAYOUT
        ========================================= */

        .admin-layout {
            min-height: 100vh;
            display: flex;
        }


        /* =========================================
           SIDEBAR
        ========================================= */

        .admin-sidebar {
            width: 250px;
            min-height: 100vh;
            background: #111827;
            color: #ffffff;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }


        /* =========================================
           LOGO
        ========================================= */

        .sidebar-brand {
            height: 75px;
            display: flex;
            align-items: center;
            padding: 0 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-right: 11px;
        }

        .brand-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .brand-text {
            font-size: 17px;
            font-weight: 700;
            letter-spacing: 0.2px;
        }

        .brand-subtitle {
            display: block;
            font-size: 10px;
            font-weight: 400;
            color: #9ca3af;
            margin-top: 2px;
        }


        /* =========================================
           SIDEBAR MENU
        ========================================= */

        .sidebar-menu {
            padding: 25px 14px;
            flex: 1;
        }

        .menu-label {
            padding: 0 12px;
            margin-bottom: 10px;
            font-size: 10px;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 11px 13px;
            margin-bottom: 4px;
            border-radius: 8px;
            color: #9ca3af;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .menu-item:hover {
            background: rgba(255, 255, 255, 0.06);
            color: #ffffff;
        }

        .menu-item.active {
            background: #4f46e5;
            color: #ffffff;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }


        /* =========================================
           SIDEBAR FOOTER
        ========================================= */

        .sidebar-footer {
            padding: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .logout-button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 13px;
            border: none;
            border-radius: 8px;
            background: transparent;
            color: #9ca3af;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .logout-button:hover {
            background: rgba(239, 68, 68, 0.12);
            color: #f87171;
        }


        /* =========================================
           MAIN
        ========================================= */

        .admin-main {
            margin-left: 250px;
            width: calc(100% - 250px);
            min-height: 100vh;
        }


        /* =========================================
           TOPBAR
        ========================================= */

        .admin-topbar {
            height: 75px;
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .topbar-title {
            font-size: 16px;
            font-weight: 600;
            color: #374151;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #ede9fe;
            color: #4f46e5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .profile-info {
            line-height: 1.2;
        }

        .profile-name {
            font-size: 13px;
            font-weight: 600;
            color: #111827;
        }

        .profile-role {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 3px;
        }


        /* =========================================
           CONTENT
        ========================================= */

        .admin-content {
            padding: 30px;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 768px) {

            .admin-sidebar {
                width: 70px;
            }

            .sidebar-brand {
                justify-content: center;
                padding: 0;
            }

            .brand-text,
            .brand-subtitle,
            .menu-label,
            .menu-text {
                display: none;
            }

            .brand-icon {
                margin-right: 0;
            }

            .menu-item {
                justify-content: center;
                padding: 12px;
            }

            .menu-icon {
                margin: 0;
            }

            .sidebar-footer {
                padding: 10px;
            }

            .logout-button {
                justify-content: center;
            }

            .admin-main {
                margin-left: 70px;
                width: calc(100% - 70px);
            }

            .admin-topbar {
                padding: 0 18px;
            }

            .admin-content {
                padding: 20px;
            }

            .profile-info {
                display: none;
            }
        }
    </style>

</head>


<body>

    <div class="admin-layout">


        {{-- =========================================
             SIDEBAR
        ========================================== --}}

        <aside class="admin-sidebar">


            {{-- BRAND --}}

            <div class="sidebar-brand">

                <div class="brand-icon">

                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="Logo Perpustakaan">

                </div>

                <div class="brand-text">

                    Perpustakaan

                    <span class="brand-subtitle">
                        ADMIN PANEL
                    </span>

                </div>

            </div>


            {{-- MENU --}}

            <div class="sidebar-menu">

                <div class="menu-label">
                    Menu Utama
                </div>


                {{-- Dashboard --}}

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <i class="fa-solid fa-house"></i>
                    </span>

                    <span class="menu-text">
                        Dashboard
                    </span>

                </a>


                {{-- Peminjaman --}}

                <a
                    href="{{ route('admin.borrowings.index') }}"
                    class="menu-item {{ request()->routeIs('admin.borrowings.index') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <i class="fa-solid fa-book-open-reader"></i>
                    </span>

                    <span class="menu-text">
                        Peminjaman
                    </span>

                </a>


                {{-- Peminjam Aktif --}}

                <a
                    href="{{ route('admin.borrowings.active') }}"
                    class="menu-item {{ request()->routeIs('admin.borrowings.active') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <i class="fa-solid fa-user-check"></i>
                    </span>

                    <span class="menu-text">
                        Peminjam Aktif
                    </span>

                </a>


                {{-- Buku --}}

                <a
                    href="{{ route('admin.books.index') }}"
                    class="menu-item {{ request()->routeIs('admin.books.*') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <i class="fa-solid fa-book"></i>
                    </span>

                    <span class="menu-text">
                        Buku
                    </span>

                </a>


                {{-- Kategori --}}

                <a
                    href="{{ route('admin.categories.index') }}"
                    class="menu-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <i class="fa-solid fa-tags"></i>
                    </span>

                    <span class="menu-text">
                        Kategori
                    </span>

                </a>


                {{-- Pengguna --}}

                <a
                    href="{{ route('admin.users.index') }}"
                    class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <i class="fa-solid fa-users"></i>
                    </span>

                    <span class="menu-text">
                        Pengguna
                    </span>

                </a>


            </div>


            {{-- SIDEBAR FOOTER --}}

            <div class="sidebar-footer">

                <form
                    method="POST"
                    action="{{ route('logout') }}">

                    @csrf

                    <button
                        type="submit"
                        class="logout-button">

                        <span class="menu-icon">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </span>

                        <span class="menu-text">
                            Logout
                        </span>

                    </button>

                </form>

            </div>


        </aside>


        {{-- =========================================
             MAIN
        ========================================== --}}

        <main class="admin-main">


            {{-- TOPBAR --}}

            <header class="admin-topbar">

                <div class="topbar-title">

                    @yield(
                    'page-title',
                    'Admin Dashboard'
                    )

                </div>


                <div class="admin-profile">

                    <div class="profile-avatar">

                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                    </div>


                    <div class="profile-info">

                        <div class="profile-name">

                            {{ auth()->user()->name }}

                        </div>

                        <div class="profile-role">

                            Administrator

                        </div>

                    </div>

                </div>

            </header>


            {{-- CONTENT --}}

            <div class="admin-content">

                @yield('content')

            </div>


        </main>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')


</body>

</html>