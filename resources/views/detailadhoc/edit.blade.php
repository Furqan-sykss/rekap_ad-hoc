@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit Detail Badan Ad/hoc</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('badan_adhoc_details.update', $detail->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $detail->nama }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Posisi</label>
                        <select name="posisi" class="form-control" required>
                            <option value="PPK" {{ $detail->posisi == 'PPK' ? 'selected' : '' }}>PPK</option>
                            <option value="PPS" {{ $detail->posisi == 'PPS' ? 'selected' : '' }}>PPS</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" value="{{ $detail->pekerjaan }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Pendidikan Terakhir</label>
                        <input type="text" name="pendidikan_terakhir" class="form-control"
                            value="{{ $detail->pendidikan_terakhir }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Program Studi</label>
                        <input type="text" name="program_studi" class="form-control" value="{{ $detail->program_studi }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $detail->email }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" value="{{ $detail->nik }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="{{ $detail->tempat_lahir }}"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control"
                            value="{{ $detail->tanggal_lahir }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>No BPJS Kesehatan</label>
                        <input type="text" name="no_bpjs_kesehatan" class="form-control"
                            value="{{ $detail->no_bpjs_kesehatan }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>No BPJS Ketenagakerjaan</label>
                        <input type="text" name="no_bpjs_ketenagakerjaan" class="form-control"
                            value="{{ $detail->no_bpjs_ketenagakerjaan }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>NPWP</label>
                        <input type="text" name="npwp" class="form-control" value="{{ $detail->npwp }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>No HP</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ $detail->no_hp }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="Laki-laki" {{ $detail->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan" {{ $detail->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required>{{ $detail->alamat }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Provinsi</label>
                        <select class="form-control" name="provinsi" id="provinsi" required>
                            <option value="Aceh">Aceh</option>
                            <!-- Tambahkan provinsi lain jika diperlukan -->
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Kabupaten/Kota</label>
                        <select class="form-control" name="kabupaten_kota" id="kabupaten_kota" required>
                            <option value="Banda Aceh">Banda Aceh</option>
                            <option value="Lhokseumawe">Lhokseumawe</option>
                            <option value="Langsa">Langsa</option>
                            <option value="Sabang">Sabang</option>
                            <!-- Tambahkan kabupaten/kota lain di Aceh -->
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Kecamatan</label>
                        <select class="form-control" name="kecamatan" id="kecamatan" required>
                            <!-- Kecamatan akan diisi dengan JavaScript berdasarkan kabupaten/kota yang dipilih -->
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Kelurahan</label>
                        <select class="form-control" name="kelurahan" id="kelurahan" required>
                            <!-- Kelurahan akan diisi dengan JavaScript berdasarkan kecamatan yang dipilih -->
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>TPS</label>
                        <select class="form-control" name="tps" id="tps" required>
                            <!-- Kelurahan akan diisi dengan JavaScript berdasarkan kecamatan yang dipilih -->
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Agama</label>
                        <input type="text" name="agama" class="form-control" value="{{ $detail->agama }}"
                            required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

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
            const kecamatanSelect = $('#kecamatan');
            const kelurahanSelect = $('#kelurahan');
            const tpsSelect = $('#tps');

            $('#kabupaten_kota').on('change', function() {
                const selectedKota = $(this).val();
                kecamatanSelect.empty().append('<option value="">Pilih Kecamatan</option>');
                kelurahanSelect.empty().append('<option value="">Pilih Kelurahan</option>');
                tpsSelect.empty().append('<option value="">Pilih TPS</option>');

                console.log('Selected Kota: ', selectedKota);
                console.log('Available Kecamatan: ', kecamatanOptions[selectedKota]);

                if (kecamatanOptions[selectedKota]) {
                    kecamatanOptions[selectedKota].forEach(function(kecamatan) {
                        kecamatanSelect.append(new Option(kecamatan, kecamatan));
                    });
                }
            });

            kecamatanSelect.on('change', function() {
                const selectedKecamatan = $(this).val();
                kelurahanSelect.empty().append('<option value="">Pilih Kelurahan</option>');
                tpsSelect.empty().append('<option value="">Pilih TPS</option>');

                console.log('Selected Kecamatan: ', selectedKecamatan);
                console.log('Available Kelurahan: ', kelurahanOptions[selectedKecamatan]);

                if (kelurahanOptions[selectedKecamatan]) {
                    kelurahanOptions[selectedKecamatan].forEach(function(kelurahan) {
                        kelurahanSelect.append(new Option(kelurahan, kelurahan));
                    });
                }
            });

            kelurahanSelect.on('change', function() {
                const selectedKelurahan = $(this).val();
                tpsSelect.empty().append('<option value="">Pilih TPS</option>');

                console.log('Selected Kelurahan: ', selectedKelurahan);
                console.log('Available TPS: ', tpsOptions[selectedKelurahan]);

                if (tpsOptions[selectedKelurahan]) {
                    tpsOptions[selectedKelurahan].forEach(function(tps) {
                        tpsSelect.append(new Option(tps, tps));
                    });
                }
            });

            // Set initial values if available
            const initialKota = '{{ $detail->kabupaten_kota }}';
            const initialKecamatan = '{{ $detail->kecamatan }}';
            const initialKelurahan = '{{ $detail->kelurahan }}';
            const initialTPS = '{{ $detail->tps }}';

            if (initialKota) {
                $('#kabupaten_kota').val(initialKota).trigger('change');
                if (initialKecamatan) {
                    setTimeout(() => {
                        kecamatanSelect.val(initialKecamatan).trigger('change');
                        if (initialKelurahan) {
                            setTimeout(() => {
                                kelurahanSelect.val(initialKelurahan).trigger('change');
                                if (initialTPS) {
                                    setTimeout(() => {
                                        tpsSelect.val(initialTPS);
                                    }, 500);
                                }
                            }, 500);
                        }
                    }, 500);
                }
            }
        });
    </script>
@endsection
