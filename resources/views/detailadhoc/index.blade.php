@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="container-fluid">
        <div class="col-12">
            <div class="row">

                <h1 class="my-4 text-dark mt-3 mb-3">Detail Badan Ad/hoc</h1>
            </div>
        </div>
        <a href="{{ route('badan_adhoc_details.create') }}" class="btn btn-primary mb-4">Tambah Detail</a>


        <form method="GET" action="{{ route('badan_adhoc_details.index') }}" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <label>Posisi</label>
                    <select name="posisi" class="form-control">
                        <option value="">Semua</option>
                        <option value="PPK" {{ request('posisi') == 'PPK' ? 'selected' : '' }}>PPK</option>
                        <option value="PPS" {{ request('posisi') == 'PPS' ? 'selected' : '' }}>PPS</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Kabupaten/Kota</label>
                    <select name="kabupaten_kota" id="kabupaten_kota" class="form-control">
                        <option value="">Semua</option>
                        <option value="Banda Aceh" {{ request('kabupaten_kota') == 'Banda Aceh' ? 'selected' : '' }}>Banda
                            Aceh</option>
                        <option value="Lhokseumawe" {{ request('kabupaten_kota') == 'Lhokseumawe' ? 'selected' : '' }}>
                            Lhokseumawe</option>
                        <option value="Langsa" {{ request('kabupaten_kota') == 'Langsa' ? 'selected' : '' }}>Langsa</option>
                        <option value="Sabang" {{ request('kabupaten_kota') == 'Sabang' ? 'selected' : '' }}>Sabang</option>
                        <!-- Tambahkan kabupaten/kota lain di Aceh -->
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Kecamatan</label>
                    <select name="kecamatan" id="kecamatan" class="form-control">
                        <!-- Kecamatan akan diisi dengan JavaScript berdasarkan kabupaten/kota yang dipilih -->
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Kelurahan</label>
                    <select name="kelurahan" id="kelurahan" class="form-control">
                        <!-- Kelurahan akan diisi dengan JavaScript berdasarkan kecamatan yang dipilih -->
                    </select>
                </div>
                <div class="col-md-3">
                    <label>TPS</label>
                    <select name="tps" id="tps" class="form-control">
                        <!-- Kelurahan akan diisi dengan JavaScript berdasarkan kecamatan yang dipilih -->
                    </select>
                </div>

                <div class="col-md-12 mt-2 ">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>


        {{-- <div class="row mb-4 text-light bg-rounded-full" style="background-color: #0e2238;">
            <div class="col-md-12">
                <h5>Total Keseluruhan Data: {{ $totalDetailsCount }}</h5>
            </div>
            <div class="col-md-12">
                <h5>Data yang Dipilih: {{ $filteredDetailsCount }}</h5>
            </div>
        </div> --}}


        <div class="card"style="background-color: #0e2238;">
            <div class="row  text-light bg-rounded-full">
                <div class="col-md-12">
                    <h5>Total Keseluruhan Data: {{ $totalDetailsCount }}</h5>
                </div>
                <div class="col-md-12">
                    <h5>Data yang Dipilih: {{ $filteredDetailsCount }}</h5>
                </div>
                <div class="col-md-6 mt-3">
                    <button onclick="window.location.href='{{ route('badan_adhoc_details.index') }}'"
                        class="btn btn-secondary">Refresh Page</button>
                </div>
            </div>
        </div>



        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th>Alamat</th>
                        <th>Provinsi</th>
                        <th>Kota</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>TPS</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Program Studi</th>
                        <th>Email</th>
                        <th>NIK</th>
                        <th>No BPJS Kesehatan</th>
                        <th>No BPJS Ketenagakerjaan</th>
                        <th>NPWP</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($details->isEmpty())
                        <tr style="background-color: red;" class="">
                            <td colspan="20" class="text-start text-light pt-3 pb-3">
                                <b>
                                    {{-- <marquee scrollamount="10" behavior="alternate">Data Tidak Tersedia
                                    </marquee> --}}
                                    Data Tidak Tersedia
                                </b>
                            </td>
                        </tr>
                    @else
                        @foreach ($details as $detail)
                            <tr>
                                <td>{{ $detail->nama }}</td>
                                <td>{{ $detail->posisi }}</td>
                                <td>{{ $detail->alamat }}</td>
                                <td>{{ $detail->provinsi }}</td>
                                <td>{{ $detail->kabupaten_kota }}</td>
                                <td>{{ $detail->kecamatan }}</td>
                                <td>{{ $detail->kelurahan }}</td>
                                <td>{{ $detail->tps }}</td>
                                <td>{{ $detail->tempat_lahir }}, {{ $detail->tanggal_lahir }}</td>
                                <td>{{ $detail->jenis_kelamin }}</td>
                                <td>{{ $detail->agama }}</td>
                                <td>{{ $detail->pekerjaan }}</td>
                                <td>{{ $detail->pendidikan_terakhir }}</td>
                                <td>{{ $detail->program_studi }}</td>
                                <td>{{ $detail->email }}</td>
                                <td>{{ $detail->nik }}</td>
                                <td>{{ $detail->no_bpjs_kesehatan }}</td>
                                <td>{{ $detail->no_bpjs_ketenagakerjaan }}</td>
                                <td>{{ $detail->npwp }}</td>
                                <td>{{ $detail->no_hp }}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" data-id="{{ $detail->id }}">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus detail ini?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var form = deleteModal.querySelector('#deleteForm');
                form.action = '/detail_badan_adhoc/' + id;
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        const kecamatanOptions = {
            "Banda Aceh": ["Baiturrahman", "Banda Raya", "Jaya Baru", "Kuta Alam", "Kuta Raja", "Lueng Bata", "Meuraxa",
                "Syiah Kuala", "Ulee Kareng"
            ],
            "Lhokseumawe": ["Banda Sakti", "Blang Mangat", "Muara Dua", "Muara Satu"],
            "Langsa": ["Langsa Barat", "Langsa Kota", "Langsa Lama", "Langsa Timur", "Langsa Baro"],
            "Sabang": ["Sukajaya", "Sukakarya"]
        };

        const kelurahanOptions = {
            // Banda Aceh
            "Baiturrahman": ["Ateuk Jawo", "Ateuk Deah Tanoh", "Ateuk Pahlawan", "Ateuk Munjeng", "Neusu Aceh",
                "Kampung Baru", "Neusu Jaya", "Peuniti", "Seutui", "Sukaramai"
            ],
            "Banda Raya": ["Lam Ara", "Lampuot", "Mibo", "Lhong Cut", "Lhong Raya", "Penyeurat", "Lamlagang",
                "Geuceu Komplek", "Geuceu Iniem", "Geuceu Kayee Jato"
            ],
            "Jaya Baru": ["Bitai", "Emperom", "Geuceu Meunara", "Lamjamee", "Lampoh Daya", "Lamtemen Barat",
                "Lamtemen Timur", "Punge Blang Cut", "Ulee Pata"
            ],
            "Kuta Alam": ["Peunayong", "Laksana", "Keuramat", "Kuta Alam", "Beurawe", "Kota Baru", "Bandar Baru",
                "Mulia", "Lampulo", "Lamdingin", "Lambaro Skep"
            ],
            "Kuta Raja": ["Lampaseh Kota", "Merduati", "Keudah", "Peulanggahan", "Gampong Jawa", "Gampong Pande"],
            "Lueng Bata": ["Batoh", "Blang Cut", "Cot Mesjid", "Lampaloh", "Lamdom", "Lamseupeung", "Lueng Bata",
                "Panteriek", "Sukadamai"
            ],
            "Meuraxa": ["Alue Deah Teungoh", "Asoe Nanggroe", "Gampong Blang", "Blang Oi", "Gampong Baro",
                "Cot Lamkueweuh", "Deah Baro", "Deah Glumpang", "Lambung", "Lamjabat", "Lampaseh Aceh",
                "Gampong Pie", "Punge Jurong", "Punge Ujong", "Surien", "Ulee Lheue"
            ],
            "Syiah Kuala": ["Alue Naga", "Deah Raya", "Ie Masen Kaye Adang", "Jeulingke", "Kopelma Darussalam",
                "Lamgugob", "Peurada", "Pineung", "Rukoh", "Tibang"
            ],
            "Ulee Kareng": ["Pango Raya", "Pango Deah", "Ilie", "Lamteh", "Lamglumpang", "Ceurih",
                "Ie Masen Ulee Kareng", "Doi", "Lambhuk"
            ],
            // Lhokseumawe
            "Banda Sakti": ["Banda Masen", "Hagu Barat Laut", "Hagu Selatan", "Hagu Teungoh", "Jawa Baru",
                "Jawa Lhokseumawe", "Keude Aceh", "Kota Lhokseumawe", "Kuta Blang", "Lancang Garam", "Mon Geudong",
                "Pusong Baru", "Pusong Lhokseumawe", "Simpang Empat", "Tumpok Teungoh", "Ujong Blang", "Ulee Jalan",
                "Uteun Bayi"
            ],
            "Blang Mangat": ["Alue Lim", "Asan Kareung", "Blang Buloh", "Blang Cut", "Blang Punteuet", "Blang Teue",
                "Blang Weu Baroh", "Blang Weu Panjoe", "Baloi", "Keude Punteuet", "Kuala", "Kumbang Punteuet",
                "Jambo Mesjid", "Jambo Timu", "Jeulikat", "Mane Kareung", "Mesjid Punteuet", "Rayeuk Kareung",
                "Seuneubok", "Teungoh", "Tunong", "Ulee Blang Mane"
            ],
            "Muara Dua": ["Alue Awe", "Blang Crum", "Blang Poroh", "Cot Girek Kandang", "Cut Mamplam", "Keude Cunda",
                "Lhok Mon Puteh", "Meunasah Alue", "Meunasah Blang", "Meunasah Manyang", "Meunasah Mee",
                "Meunasah Mesjid", "Meunasah Panggoi", "Paloh Batee", "Paya Bili", "Paya Punteuet", "Uteunkot"
            ],
            "Muara Satu": ["Batuphat Barat", "Batuphat Timur", "Blang Naleung Mameh", "Blang Panyang", "Blang Pulo",
                "Cot Trieng", "Meunasah Dayah", "Meuria Paloh", "Padang Sakti", "Paloh Punti", "Ujong Pacu"
            ],
            // Langsa
            "Langsa Barat": ["Langsa Lama", "Langsa Baro", "Langsa Kota", "Langsa Timur", "Gampong Jawa"],
            "Langsa Kota": ["Langsa Kota", "Langsa Baro", "Langsa Lama", "Gampong Jawa"],
            "Langsa Lama": ["Langsa Lama", "Paya Bujok", "Langsa Baro", "Langsa Timur"],
            "Langsa Timur": ["Langsa Timur", "Langsa Baro", "Langsa Kota", "Gampong Jawa"],
            "Langsa Baro": ["Langsa Baro", "Langsa Kota", "Langsa Lama", "Gampong Jawa"],
            // Sabang
            "Sukajaya": ["Anoe Itam", "Balohan", "Cot Abeuk", "Cot Bak U", "Ie Meulee", "Jaboi", "Ujoeng Kareung"],
            "Sukakarya": ["Aneuk Laot", "Krueng Raya", "Kuta Ateueh", "Kuta Barat", "Kuta Timu"]
        };


        const tpsOptions = {
            //banda aceh
            // Kecamatan Baiturrahman
            "Ateuk Jawo": ["TPS 1", "TPS 2", "TPS 3", "TPS 4"],
            "Ateuk Deah Tanoh": ["TPS 1", "TPS 2", "TPS 3"],
            "Ateuk Pahlawan": ["TPS 1", "TPS 2"],
            "Ateuk Munjeng": ["TPS 1", "TPS 2"],
            "Neusu Aceh": ["TPS 1", "TPS 2", "TPS 3"],
            "Kampung Baru": ["TPS 1", "TPS 2"],
            "Neusu Jaya": ["TPS 1", "TPS 2"],
            "Peuniti": ["TPS 1", "TPS 2"],
            "Seutui": ["TPS 1", "TPS 2"],
            "Sukaramai": ["TPS 1", "TPS 2"],

            // Kecamatan Banda Raya
            "Lam Ara": ["TPS 1", "TPS 2", "TPS 3"],
            "Lampuot": ["TPS 1", "TPS 2"],
            "Mibo": ["TPS 1", "TPS 2"],
            "Lhong Cut": ["TPS 1"],
            "Lhong Raya": ["TPS 1", "TPS 2"],
            "Penyeurat": ["TPS 1", "TPS 2"],
            "Lamlagang": ["TPS 1", "TPS 2", "TPS 3"],
            "Geuceu Komplek": ["TPS 1", "TPS 2"],
            "Geuceu Iniem": ["TPS 1", "TPS 2"],
            "Geuceu Kayee Jato": ["TPS 1", "TPS 2"],

            // Kecamatan Jaya Baru
            "Bitai": ["TPS 1", "TPS 2"],
            "Emperom": ["TPS 1", "TPS 2"],
            "Geuceu Meunara": ["TPS 1"],
            "Lamjamee": ["TPS 1", "TPS 2"],
            "Lampoh Daya": ["TPS 1", "TPS 2"],
            "Lamtemen Barat": ["TPS 1", "TPS 2"],
            "Lamtemen Timur": ["TPS 1"],
            "Punge Blang Cut": ["TPS 1", "TPS 2"],
            "Ulee Pata": ["TPS 1", "TPS 2"],

            // Kecamatan Kuta Alam
            "Peunayong": ["TPS 1", "TPS 2"],
            "Laksana": ["TPS 1", "TPS 2"],
            "Keuramat": ["TPS 1"],
            "Kuta Alam": ["TPS 1", "TPS 2"],
            "Beurawe": ["TPS 1", "TPS 2"],
            "Kota Baru": ["TPS 1", "TPS 2"],
            "Bandar Baru": ["TPS 1", "TPS 2"],
            "Mulia": ["TPS 1"],
            "Lampulo": ["TPS 1", "TPS 2"],
            "Lamdingin": ["TPS 1", "TPS 2"],
            "Lambaro Skep": ["TPS 1", "TPS 2"],

            // Kecamatan Kuta Raja
            "Lampaseh Kota": ["TPS 1", "TPS 2"],
            "Merduati": ["TPS 1", "TPS 2"],
            "Keudah": ["TPS 1", "TPS 2"],
            "Peulanggahan": ["TPS 1"],
            "Gampong Jawa": ["TPS 1", "TPS 2"],
            "Gampong Pande": ["TPS 1"],

            // Kecamatan Lueng Bata
            "Batoh": ["TPS 1", "TPS 2"],
            "Blang Cut": ["TPS 1"],
            "Cot Mesjid": ["TPS 1", "TPS 2"],
            "Lampaloh": ["TPS 1", "TPS 2"],
            "Lamdom": ["TPS 1"],
            "Lamseupeung": ["TPS 1"],
            "Lueng Bata": ["TPS 1", "TPS 2"],
            "Panteriek": ["TPS 1", "TPS 2"],
            "Sukadamai": ["TPS 1"],

            // Kecamatan Meuraxa
            "Alue Deah Teungoh": ["TPS 1"],
            "Asoe Nanggroe": ["TPS 1"],
            "Gampong Blang": ["TPS 1"],
            "Blang Oi": ["TPS 1"],
            "Gampong Baro": ["TPS 1", "TPS 2"],
            "Cot Lamkueweuh": ["TPS 1"],
            "Deah Baro": ["TPS 1"],
            "Deah Glumpang": ["TPS 1"],
            "Lambung": ["TPS 1"],
            "Lamjabat": ["TPS 1", "TPS 2"],
            "Lampaseh Aceh": ["TPS 1"],
            "Gampong Pie": ["TPS 1"],
            "Punge Jurong": ["TPS 1", "TPS 2"],
            "Punge Ujong": ["TPS 1"],
            "Surien": ["TPS 1"],
            "Ulee Lheue": ["TPS 1"],

            // Kecamatan Syiah Kuala
            "Alue Naga": ["TPS 1"],
            "Deah Raya": ["TPS 1"],
            "Ie Masen Kaye Adang": ["TPS 1"],
            "Jeulingke": ["TPS 1", "TPS 2"],
            "Kopelma Darussalam": ["TPS 1"],
            "Lamgugob": ["TPS 1", "TPS 2"],
            "Peurada": ["TPS 1"],
            "Pineung": ["TPS 1"],
            "Rukoh": ["TPS 1"],
            "Tibang": ["TPS 1"],

            // Kecamatan Ulee Kareng
            "Pango Raya": ["TPS 1", "TPS 2"],
            "Pango Deah": ["TPS 1"],
            "Ilie": ["TPS 1"],
            "Lamteh": ["TPS 1"],
            "Lamglumpang": ["TPS 1"],
            "Ceurih": ["TPS 1"],
            "Ie Masen Ulee Kareng": ["TPS 1", "TPS 2"],
            "Doi": ["TPS 1"],
            "Lambhuk": ["TPS 1", "TPS 2"],

            // Lhokseumawe
            // Kecamatan Banda Sakti
            "Banda Masen": ["TPS 1", "TPS 2", "TPS 3"],
            "Hagu Barat Laut": ["TPS 1", "TPS 2", "TPS 3", "TPS 4"],
            "Hagu Selatan": ["TPS 1", "TPS 2"],
            "Hagu Teungoh": ["TPS 1", "TPS 2", "TPS 3"],
            "Jawa Baru": ["TPS 1", "TPS 2", "TPS 3"],
            "Jawa Lhokseumawe": ["TPS 1", "TPS 2"],
            "Keude Aceh": ["TPS 1", "TPS 2"],
            "Kota Lhokseumawe": ["TPS 1", "TPS 2", "TPS 3"],
            "Kuta Blang": ["TPS 1", "TPS 2"],
            "Lancang Garam": ["TPS 1", "TPS 2", "TPS 3"],
            "Mon Geudong": ["TPS 1", "TPS 2", "TPS 3"],
            "Pusong Baru": ["TPS 1", "TPS 2", "TPS 3"],
            "Pusong Lhokseumawe": ["TPS 1", "TPS 2"],
            "Simpang Empat": ["TPS 1", "TPS 2", "TPS 3"],
            "Tumpok Teungoh": ["TPS 1", "TPS 2", "TPS 3"],
            "Ujong Blang": ["TPS 1", "TPS 2"],
            "Ulee Jalan": ["TPS 1", "TPS 2", "TPS 3"],
            "Uteun Bayi": ["TPS 1", "TPS 2", "TPS 3"],

            // Kecamatan Blang Mangat
            "Alue Lim": ["TPS 1", "TPS 2"],
            "Asan Kareung": ["TPS 1", "TPS 2"],
            "Blang Buloh": ["TPS 1", "TPS 2"],
            "Blang Cut": ["TPS 1", "TPS 2"],
            "Blang Punteuet": ["TPS 1", "TPS 2"],
            "Blang Teue": ["TPS 1", "TPS 2"],
            "Blang Weu Baroh": ["TPS 1", "TPS 2"],
            "Blang Weu Panjoe": ["TPS 1", "TPS 2"],
            "Baloi": ["TPS 1", "TPS 2"],
            "Keude Punteuet": ["TPS 1", "TPS 2"],
            "Kuala": ["TPS 1", "TPS 2"],
            "Kumbang Punteuet": ["TPS 1", "TPS 2"],
            "Jambo Mesjid": ["TPS 1", "TPS 2"],
            "Jambo Timu": ["TPS 1", "TPS 2"],
            "Jeulikat": ["TPS 1", "TPS 2"],
            "Mane Kareung": ["TPS 1", "TPS 2"],
            "Mesjid Punteuet": ["TPS 1", "TPS 2"],
            "Rayeuk Kareung": ["TPS 1", "TPS 2"],
            "Seuneubok": ["TPS 1", "TPS 2"],
            "Teungoh": ["TPS 1", "TPS 2"],
            "Tunong": ["TPS 1", "TPS 2"],
            "Ulee Blang Mane": ["TPS 1", "TPS 2"],

            // Kecamatan Muara Dua
            "Alue Awe": ["TPS 1", "TPS 2"],
            "Blang Crum": ["TPS 1", "TPS 2"],
            "Blang Poroh": ["TPS 1", "TPS 2"],
            "Cot Girek Kandang": ["TPS 1", "TPS 2"],
            "Cut Mamplam": ["TPS 1", "TPS 2"],
            "Keude Cunda": ["TPS 1", "TPS 2"],
            "Lhok Mon Puteh": ["TPS 1", "TPS 2"],
            "Meunasah Alue": ["TPS 1", "TPS 2"],
            "Meunasah Blang": ["TPS 1", "TPS 2"],
            "Meunasah Manyang": ["TPS 1", "TPS 2"],
            "Meunasah Mee": ["TPS 1", "TPS 2"],
            "Meunasah Mesjid": ["TPS 1", "TPS 2"],
            "Meunasah Panggoi": ["TPS 1", "TPS 2"],
            "Paloh Batee": ["TPS 1", "TPS 2"],
            "Paya Bili": ["TPS 1", "TPS 2"],
            "Paya Punteuet": ["TPS 1", "TPS 2"],
            "Uteunkot": ["TPS 1", "TPS 2"],

            // Kecamatan Muara Satu
            "Batuphat Barat": ["TPS 1", "TPS 2"],
            "Batuphat Timur": ["TPS 1", "TPS 2"],
            "Blang Naleung Mameh": ["TPS 1", "TPS 2"],
            "Blang Panyang": ["TPS 1", "TPS 2"],
            "Blang Pulo": ["TPS 1", "TPS 2"],
            "Cot Trieng": ["TPS 1", "TPS 2"],
            "Meunasah Dayah": ["TPS 1", "TPS 2"],
            "Meuria Paloh": ["TPS 1", "TPS 2"],
            "Padang Sakti": ["TPS 1", "TPS 2"],
            "Paloh Punti": ["TPS 1", "TPS 2"],
            "Ujong Pacu": ["TPS 1", "TPS 2"],


            // Langsa
            // Kecamatan Langsa Barat
            "Langsa Lama": ["TPS 1", "TPS 2", "TPS 3"],
            "Langsa Baro": ["TPS 1", "TPS 2", "TPS 3"],
            "Langsa Kota": ["TPS 1", "TPS 2", "TPS 3"],
            "Langsa Timur": ["TPS 1", "TPS 2", "TPS 3", "TPS 4"],
            "Gampong Jawa": ["TPS 1", "TPS 2", "TPS 3"],

            // Kecamatan Langsa Kota
            "Langsa Kota": ["TPS 1", "TPS 2", "TPS 3", "TPS 4"],
            "Langsa Baro": ["TPS 1", "TPS 2", "TPS 3", "TPS 4"],
            "Langsa Lama": ["TPS 1", "TPS 2", "TPS 3", "TPS 4"],
            "Gampong Jawa": ["TPS 1", "TPS 2", "TPS 3", "TPS 4"],

            // Kecamatan Langsa Lama
            "Langsa Lama": ["TPS 1", "TPS 2", "TPS 3", "TPS 4"],
            "Paya Bujok": ["TPS 1", "TPS 2", "TPS 3", "TPS 4"],
            "Langsa Baro": ["TPS 1", "TPS 2", "TPS 3", "TPS 4"],
            "Langsa Timur": ["TPS 1", "TPS 2", "TPS 3", "TPS 4"],

            // Kecamatan Langsa Timur
            "Langsa Timur": ["TPS 1", "TPS 2", "TPS 3", "TPS 4", "TPS 5"],
            "Langsa Baro": ["TPS 1", "TPS 2", "TPS 3", "TPS 4", "TPS 5"],
            "Langsa Kota": ["TPS 1", "TPS 2", "TPS 3", "TPS 4", "TPS 5"],
            "Gampong Jawa": ["TPS 1", "TPS 2", "TPS 3", "TPS 4", "TPS 5"],

            // Kecamatan Langsa Baro
            "Langsa Baro": ["TPS 1", "TPS 2", "TPS 3", "TPS 4", "TPS 5"],
            "Langsa Kota": ["TPS 1", "TPS 2", "TPS 3", "TPS 4", "TPS 5"],
            "Langsa Lama": ["TPS 1", "TPS 2", "TPS 3", "TPS 4", "TPS 5"],
            "Gampong Jawa": ["TPS 1", "TPS 2", "TPS 3", "TPS 4", "TPS 5"],

            // Sabang
            // Kecamatan Sukajaya
            "Anoe Itam": ["TPS 1", "TPS 2"],
            "Balohan": ["TPS 1"],
            "Cot Abeuk": ["TPS 1", "TPS 2"],
            "Cot Bak U": ["TPS 1"],
            "Ie Meulee": ["TPS 1", "TPS 2"],
            "Jaboi": ["TPS 1"],
            "Ujoeng Kareung": ["TPS 1"],
            "Gampong Beurawang": ["TPS 1", "TPS 2"],
            "Gampong Iboih": ["TPS 1", "TPS 2"],
            "Gampong Jaboi": ["TPS 1"],
            "Gampong Keuneukai": ["TPS 1", "TPS 2"],
            "Gampong Krueng Raya": ["TPS 1"],
            "Gampong Le Meulee": ["TPS 1", "TPS 2"],

            // Kecamatan Sukakarya
            "Aneuk Laot": ["TPS 1", "TPS 2"],
            "Krueng Raya": ["TPS 1", "TPS 2"],
            "Kuta Ateueh": ["TPS 1"],
            "Kuta Barat": ["TPS 1"],
            "Kuta Timu": ["TPS 1", "TPS 2"],
            "Gampong Cot Ba'u": ["TPS 1", "TPS 2"],
            "Gampong Jaboi": ["TPS 1"],
            "Gampong Le Meulee": ["TPS 1", "TPS 2"],
            "Gampong Suak Ribee": ["TPS 1"],
            "Gampong Ujong Kareung": ["TPS 1", "TPS 2"]
        };



        $(document).ready(function() {
            $('#kabupaten_kota').on('change', function() {
                const kabupatenKota = $(this).val();
                const kecamatanSelect = $('#kecamatan');
                const kelurahanSelect = $('#kelurahan');
                const tpsSelect = $('#tps');

                kecamatanSelect.empty().append('<option value="">Pilih Kecamatan</option>');
                kelurahanSelect.empty().append('<option value="">Pilih Kelurahan</option>');
                tpsSelect.empty().append('<option value="">Pilih TPS</option>');

                if (kecamatanOptions[kabupatenKota]) {
                    kecamatanOptions[kabupatenKota].forEach(function(kecamatan) {
                        kecamatanSelect.append(new Option(kecamatan, kecamatan));
                    });
                }
            });

            $('#kecamatan').on('change', function() {
                const kecamatan = $(this).val();
                const kelurahanSelect = $('#kelurahan');
                const tpsSelect = $('#tps');

                kelurahanSelect.empty().append('<option value="">Pilih Kelurahan</option>');
                tpsSelect.empty().append('<option value="">Pilih TPS</option>');

                if (kelurahanOptions[kecamatan]) {
                    kelurahanOptions[kecamatan].forEach(function(kelurahan) {
                        kelurahanSelect.append(new Option(kelurahan, kelurahan));
                    });
                }
            });

            $('#kelurahan').on('change', function() {
                const kelurahan = $(this).val();
                const tpsSelect = $('#tps');

                tpsSelect.empty().append('<option value="">Pilih TPS</option>');

                if (tpsOptions[kelurahan]) {
                    tpsOptions[kelurahan].forEach(function(tps) {
                        tpsSelect.append(new Option(tps, tps));
                    });
                }
            });

            // Set initial kecamatan and kelurahan based on current filters
            @if (request('kabupaten_kota'))
                const currentKabupatenKota = '{{ request('kabupaten_kota') }}';
                const currentKecamatan = '{{ request('kecamatan') }}';
                const currentKelurahan = '{{ request('kelurahan') }}';
                const currentTps = '{{ request('tps') }}';

                $('#kabupaten_kota').val(currentKabupatenKota).trigger('change');
                if (currentKecamatan) {
                    setTimeout(function() {
                        $('#kecamatan').val(currentKecamatan).trigger('change');
                        if (currentKelurahan) {
                            setTimeout(function() {
                                $('#kelurahan').val(currentKelurahan).trigger('change');
                                if (currentTps) {
                                    setTimeout(function() {
                                        $('#tps').val(currentTps);
                                    }, 500);
                                }
                            }, 500);
                        }
                    }, 500);
                }
            @endif
        });
    </script>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000
                });
            });
        </script>
    @endif
@endsection
