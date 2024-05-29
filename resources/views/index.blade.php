@extends('layouts.app')

@section('content')
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
@endsection
