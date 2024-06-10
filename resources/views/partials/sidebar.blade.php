<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    ::after,
    ::before {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    a {
        text-decoration: none;
    }

    li {
        list-style: none;
    }

    h1 {
        font-weight: 600;
        font-size: 1.5rem;
    }

    body {
        font-family: 'Poppins', sans-serif;
    }

    .container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
    }

    .card {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #f5f5f5;
        border-bottom: 1px solid #ccc;
        padding: 10px;
    }

    .card-title {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 8px;
    }

    th {
        background-color: #f5f5f5;
        text-align: left;
        font-weight: bold;
    }

    .wrapper {
        display: flex;
    }

    .main {
        min-height: 100vh;
        width: 100%;
        overflow: hidden;
        margin-left: 70px;
        /* Sama dengan lebar sidebar yang diperluas */
        transition: all .25s ease-in-out;
        background-color: #fafbfe;
    }

    #sidebar {
        width: 70px;
        min-width: 70px;
        z-index: 1000;
        transition: all .25s ease-in-out;
        background-color: #0e2238;
        display: flex;
        flex-direction: column;
        height: 100vh;
        position: fixed;
    }

    #sidebar.expand~.main {
        margin-left: 260px;
        /* Sesuaikan margin saat sidebar dikompresi */
    }

    #sidebar.expand {
        width: 260px;
        min-width: 260px;
    }

    .toggle-btn {
        background-color: transparent;
        cursor: pointer;
        border: 0;
        padding: 1rem 1.5rem;
    }

    .toggle-btn i {
        font-size: 1.5rem;
        color: #FFF;
    }

    .sidebar-logo {
        margin: auto 0;
    }

    .sidebar-logo a {
        color: #FFF;
        font-size: 1.15rem;
        font-weight: 600;
    }

    #sidebar:not(.expand) .sidebar-logo,
    #sidebar:not(.expand) a.sidebar-link span {
        display: none;
    }

    .sidebar-nav {
        padding: 2rem 0;
        flex: 1 1 auto;
    }

    a.sidebar-link {
        padding: .625rem 1.625rem;
        color: #FFF;
        display: block;
        font-size: 0.9rem;
        white-space: nowrap;
        border-left: 3px solid transparent;
    }

    .sidebar-link i {
        font-size: 1.1rem;
        margin-right: .75rem;
    }

    a.sidebar-link:hover {
        background-color: rgba(255, 255, 255, .075);
        border-left: 3px solid #3b7ddd;
    }

    .sidebar-item {
        position: relative;
    }

    #sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
        position: absolute;
        top: 0;
        left: 70px;
        background-color: #0e2238;
        padding: 0;
        min-width: 15rem;
        display: none;
    }

    #sidebar:not(.expand) .sidebar-item:hover .has-dropdown+.sidebar-dropdown {
        display: block;
        max-height: 15em;
        width: 100%;
        opacity: 1;
    }

    #sidebar.expand .sidebar-link[data-bs-toggle="collapse"]::after {
        border: solid;
        border-width: 0 .075rem .075rem 0;
        content: "";
        display: inline-block;
        padding: 2px;
        position: absolute;
        right: 1.5rem;
        top: 1.4rem;
        transform: rotate(-135deg);
        transition: all .2s ease-out;
    }

    #sidebar.expand .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
        transform: rotate(45deg);
        transition: all .2s ease-out;
    }
</style>

<body>

    <aside id="sidebar">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
                <i class="lni lni-grid-alt"></i>
            </button>
            <div class="sidebar-logo">
                <a href="/">SIAKBA</a>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="/" class="sidebar-link">
                    <i class="lni lni-user"></i>
                    <span>Beranda</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('badan_adhoc_details.index') }}" class="sidebar-link">
                    <i class="lni lni-agenda"></i>
                    <span>Daftar</span>
                </a>
            </li>
            @if (auth()->user()->level == 1)
                <li class="sidebar-item">
                    <a href="{{ route('charts.badan_adhoc') }}" class="sidebar-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pie-chart-fill" viewBox="0 0 16 16">
                            <path
                                d="M15.985 8.5H8.207l-5.5 5.5a8 8 0 0 0 13.277-5.5zM2 13.292A8 8 0 0 1 7.5.015v7.778zM8.5.015V7.5h7.485A8 8 0 0 0 8.5.015" />
                        </svg>
                        <span>Rekapitulasi Ad/hoc</span>
                    </a>
                </li>
            @endif

            {{-- <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-popup">
                    </i>
                    <span>Cara Mendaftar<br>Anggota/Ad hoc</span>
                </a>
            </li> --}}
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-cog"></i>
                    <span>Hubungi kami</span>
                </a>
            </li>

        </ul>
        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="sidebar-link btn btn-link text-white">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>
    {{-- <div class="main p-3">
            <div class="container-fluid">
                <h6 class="text-start bg-white mb-2 p-3"><b>Dashboard</b></h6>
                <h6 class="text-start bg-white mb-3 p-3"><b>Beranda</b></h6>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('img/logokpu.jpg') }}" class="img-fluid" alt="Foto Kandidat">
                                    </div>
                                    <div class="col-md-9">
                                        <h5 class="card-title">{{ Auth::user()->name }}</h5>
                                        <p class="card-text">{{ Auth::user()->email }}</p>
                                        <p class="card-text">Pelamar KOTA ADM. JAKARTA TIMUR</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Daftar Pendaftaran</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Posisi yang Dilamar</th>
                                            <th>Seleksi</th>
                                            <th>Tanggal Pendaftaran</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>PULOGADUNG</td>
                                            <td>Seleksi PPK Pada Pilkada 2024</td>
                                            <td>28 April 2024</td>
                                            <td>Mengupload Persyaratan</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">Aksi</a></td>
                                        </tr>
                                        <tr>
                                            <td>RAWAMANGUN</td>
                                            <td>Seleksi PPS Pada Pilkada 2024</td>
                                            <td>04 Mei 2024</td>
                                            <td>Mengupload Persyaratan</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">Aksi</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script>
        const hamBurger = document.querySelector(".toggle-btn");
        const sidebar = document.querySelector("#sidebar");
        const mainContent = document.querySelector(".main");

        hamBurger.addEventListener("click", function() {
            sidebar.classList.toggle("expand");
            if (sidebar.classList.contains("expand")) {
                mainContent.style.marginLeft = "260px";
            } else {
                mainContent.style.marginLeft = "70px";
            }
        });
    </script>



</body>

</html>
