
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Klinik')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fb;
        }

        header {
            background-color: #0d6efd;
            color: white;
            padding: 20px 30px;
        }

        header h2 {
            margin: 0;
        }

        nav {
            background-color: white;
            padding: 12px 30px;
            border-bottom: 1px solid #ddd;
        }

        nav a {
            text-decoration: none;
            margin-right: 20px;
            color: #0d6efd;
        }

        main {
            padding: 30px;
        }

        footer {
            text-align: center;
            padding: 15px;
            color: #666;
        }
    </style>
</head>
<body>
    <header>
        <h2>Sistem Informasi Klinik</h2>
    </header>

    <nav>
        <a href="{{ url('/') }}">Dashboard</a>
        <a href="{{ route('pasien.index') }}">Pasien</a>
        <a href="{{ route('dokter.index') }}">Dokter</a>
        <a href="{{ route('poli.index') }}">Poli</a>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Pemrograman Web Lanjut</p>
    </footer>
</body>
</html>