<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>SMKN 12 | @yield('title')</title>

    <style>
        /* Biar link pas di-hover lebih cakep */
        .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">

            <nav class="col-2 bg-dark vh-100 d-flex flex-column justify-content-between p-3 text-white">

                <div class="text-center">
                    <div class="bg-white rounded-circle d-inline-flex p-1 mb-2">
                        <img src="{{ asset('img/logo-smk.png') }}" width="60" height="60" class="rounded-circle" alt="Logo">
                    </div>
                    <h5 class="fw-bold mt-2">SMKN 12 JAKARTA</h5>
                    <hr class="text-white">
                </div>

                <div class="mb-auto w-100">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item mb-2">
                            <a href="{{ route('guru.dashboard-guru-page') }}" class="nav-link text-white">
                                Dashboard Guru
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{ route('siswa.dashboard-siswa-page') }}" class="nav-link text-white">
                                Dashboard Siswa
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{ route('absensi.dashboard-absensi-page') }}" class="nav-link text-white">
                                Data Absensi
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="w-100">
                    <hr class="text-white">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">
                            Logout
                        </button>
                    </form>
                </div>

            </nav>

            <main class="col-10 bg-light p-0" style="height: 100vh; overflow-y: auto;">
                @yield('main')
            </main>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
