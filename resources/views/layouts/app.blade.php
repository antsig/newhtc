<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTC Pajak - @yield('title', 'Pusat Pelatihan Pajak')</title>
    <!-- Bootstrap CSS for layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f1f3f5;
            font-family: 'Arial', sans-serif;
        }
        
        /* Top Header */
        .top-header {
            background-color: #074174;
            color: white;
            padding: 10px 0;
        }
        .search-form .form-control {
            border-radius: 0;
            height: 30px;
            font-size: 13px;
        }
        .search-form .btn {
            border-radius: 0;
            height: 30px;
            padding: 0 12px;
            background-color: #d1d5da;
            border: none;
            color: #333;
        }

        /* Navbar */
        .main-navbar {
            background-color: #04315a;
        }
        .main-navbar .nav-link {
            color: white !important;
            font-size: 13px;
            font-weight: bold;
            padding: 15px 12px;
            text-transform: uppercase;
        }
        .main-navbar .nav-link:hover {
            background-color: #064b8a;
        }
        .navbar-brand {
            font-weight: bold;
        }
        
        /* Dropdown Customization */
        .main-navbar .dropdown-menu {
            background-color: #04315a;
            border: 1px solid #064b8a;
            border-radius: 0;
            margin-top: 0;
            padding: 0;
        }
        .main-navbar .dropdown-item {
            color: white !important;
            font-size: 13px;
            font-weight: bold;
            padding: 12px 15px;
            text-transform: uppercase;
            border-bottom: 1px solid #064b8a;
        }
        .main-navbar .dropdown-item:last-child {
            border-bottom: none;
        }
        .main-navbar .dropdown-item:hover, .main-navbar .dropdown-item:focus {
            background-color: #064b8a;
            color: white !important;
        }

        /* Breaking News */
        .breaking-news-container {
            background-color: white;
            border: 1px solid #ddd;
            margin-top: 15px;
            margin-bottom: 15px;
            display: flex;
            align-items: stretch;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .breaking-news-label {
            background-color: #074174;
            color: white;
            padding: 8px 15px;
            font-weight: bold;
            font-size: 14px;
            white-space: nowrap;
            display: flex;
            align-items: center;
        }
        .breaking-news-ticker {
            flex-grow: 1;
            padding: 0 15px;
            display: flex;
            align-items: center;
            overflow: hidden;
            font-size: 14px;
        }
        .breaking-news-ticker marquee {
            color: #555;
        }

        /* General layout for widgets */
        .sidebar-title {
            background-color: #074174;
            color: white;
            padding: 10px 15px;
            font-weight: bold;
            font-size: 14px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }
        
        /* Floating WhatsApp */
        .whatsapp-float {
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 60px;
            height: 60px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50%;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 1050;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .whatsapp-float:hover {
            background-color: #128c7e;
            color: #FFF;
            transform: scale(1.1);
        }
        
        /* Footer */
        .footer {
            background-color: #222;
            color: #ddd;
            padding: 20px 0;
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <!-- Header Section (Top Bar) -->
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="d-flex align-items-center">
                        @if(isset($identitas) && $identitas->logo)
                            <img src="{{ Storage::url($identitas->logo) }}" alt="Logo" class="me-2" style="max-height: 40px;">
                        @else
                            <img src="{{ asset('images/no-image.png') }}" alt="Logo" class="me-2" style="max-height: 40px; border-radius:4px;">
                        @endif
                        <span class="fw-bold fs-5">{{ $identitas->nama_website ?? 'HTC Training & Consulting' }}</span>
                    </div>
                </div>
                <div class="col-md-8 text-end">
                    <div class="d-flex justify-content-end align-items-center">
                        <!-- Dynamic Date using PHP -->
                        <span class="me-3" style="font-size:14px;">
                            <?php
                                setlocale(LC_TIME, 'id_ID.utf8');
                                echo \Carbon\Carbon::now()->locale('id')->translatedFormat('l, d M Y');
                            ?>
                        </span>
                        <form class="d-flex search-form" action="#">
                            <input type="text" class="form-control" placeholder="Search something.." aria-label="Search">
                            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark main-navbar p-0">
        <div class="container">
            <a class="navbar-brand d-lg-none py-2 px-3" href="#">MENU</a>
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mb-2 mb-lg-0 w-100">
                    @if(isset($global_menus) && $global_menus->count() > 0)
                        @foreach($global_menus as $menu)
                            @if($menu->children && $menu->children->count() > 0)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown{{ $menu->id_menu }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $menu->nama_menu }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown{{ $menu->id_menu }}">
                                        @foreach($menu->children as $child)
                                            <li><a class="dropdown-item" href="{{ str_starts_with($child->link, 'http') ? $child->link : url($child->link) }}">{{ $child->nama_menu }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ str_starts_with($menu->link, 'http') ? $menu->link : url($menu->link) }}">
                                        @if(strtolower($menu->nama_menu) == 'home') <i class="fas fa-home"></i> @else {{ $menu->nama_menu }} @endif
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Breaking News Ticker -->
        <div class="breaking-news-container">
            <div class="breaking-news-label">BREAKING NEWS</div>
            <div class="breaking-news-ticker">
                <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                    @if(isset($breakingNews) && $breakingNews->count() > 0)
                        @foreach($breakingNews as $news)
                            {{ $news->judul }} &nbsp;&nbsp;&bull;&nbsp;&nbsp;
                        @endforeach
                    @else
                        Belum ada berita utama saat ini.
                    @endif
                </marquee>
            </div>
        </div>

        <!-- Main Content 3-Column Layout -->
        <div class="row g-3">
            <!-- Left Sidebar -->
            @hasSection('left-sidebar')
            <div class="col-md-3 order-2 order-md-1">
                @yield('left-sidebar')
            </div>
            @endif

            <!-- Main Content -->
            @php
                $mainCol = 12;
                if(View::hasSection('left-sidebar')) $mainCol -= 3;
                if(View::hasSection('right-sidebar')) $mainCol -= 3;
            @endphp
            <div class="col-md-{{ $mainCol }} order-1 order-md-2">
                @yield('content')
            </div>

            <!-- Right Sidebar -->
            @hasSection('right-sidebar')
            <div class="col-md-3 order-3 order-md-3">
                @yield('right-sidebar')
            </div>
            @endif
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Pusat Pelatihan Pajak - HTC Training &amp; Consulting</p>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $identitas->no_telp ?? '6285331887878') }}" target="_blank" class="whatsapp-float" title="Hubungi Kami">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
