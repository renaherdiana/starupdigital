<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>NeoWeb Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assetsbackend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assetsbackend/css/custom.css') }}" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        #neoweb-bg {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .content {
            transition: margin-left 0.3s ease, width 0.3s ease;
        }

        /* Optional: biar footer tidak mengecil */
        footer {
            flex-shrink: 0;
        }
    </style>
</head>

<body>
    <div id="wrapper" class="d-flex">
            <!-- Sidebar -->
            <div class="sidebar">
                @include('layouts.backend.sidebar')
            </div>

            <!-- Content -->
            <div class="content flex-grow-1 d-flex flex-column">
                
                <!-- Navbar -->
                @include('layouts.backend.navbar')

                <!-- Main Content -->
                <div class="container-fluid pt-4 px-4 flex-grow-1">
                    @yield('content')
                </div>

                <!-- Footer -->
                @include('layouts.backend.footer')

            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assetsbackend/js/jquery.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assetsbackend/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assetsbackend/js/main.js') }}"></script>
    
</body>
</html>
