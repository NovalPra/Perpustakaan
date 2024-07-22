<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan Universitas Amikom | @yield('title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>

    <style>
        /* Custom CSS jika diperlukan */
        body {
            background-color: #f0f0f0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .alert-info {
            background-color: #17a2b8;
            color: #fff;
            border: none;
        }
        .alert-info h4 {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="alert alert-info text-center">
            <h4><b>Selamat datang</b> di Perpustakaan Amikom</h4>
        </div>
        
        <!-- Include bagian-bagian sesuai kebutuhan -->
        @include('menu')
        @include('banner')
        @include('sidebar')
        @include('konten')
        @include('footer')
    </div>
</body>
</html>
