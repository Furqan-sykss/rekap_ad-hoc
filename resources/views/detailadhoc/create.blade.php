@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Tambah Detail Badan Ad/hoc</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('badan_adhoc_details.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Posisi</label>
                <select name="posisi" class="form-control" required>
                    <option value="PPK" {{ old('posisi') == 'PPK' ? 'selected' : '' }}>PPK</option>
                    <option value="PPS" {{ old('posisi') == 'PPS' ? 'selected' : '' }}>PPS</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Pendidikan Terakhir</label>
                <input type="text" name="pendidikan_terakhir" class="form-control"
                    value="{{ old('pendidikan_terakhir') }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Program Studi</label>
                <input type="text" name="program_studi" class="form-control" value="{{ old('program_studi') }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="form-group mb-3">
                <label>NIK</label>
                <input type="text" name="nik" class="form-control" value="{{ old('nik') }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}"
                    required>
            </div>
            <div class="form-group mb-3">
                <label>No BPJS Kesehatan</label>
                <input type="text" name="no_bpjs_kesehatan" class="form-control" value="{{ old('no_bpjs_kesehatan') }}"
                    required>
            </div>
            <div class="form-group mb-3">
                <label>No BPJS Ketenagakerjaan</label>
                <input type="text" name="no_bpjs_ketenagakerjaan" class="form-control"
                    value="{{ old('no_bpjs_ketenagakerjaan') }}" required>
            </div>
            <div class="form-group mb-3">
                <label>NPWP</label>
                <input type="text" name="npwp" class="form-control" value="{{ old('npwp') }}" required>
            </div>
            <div class="form-group mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                    </option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
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
                <label>Agama</label>
                <select class="form-control" name="agama" required>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>

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

        $(document).ready(function() {
            $('#kabupaten_kota').on('change', function() {
                const kabupatenKota = $(this).val();
                const kecamatanSelect = $('#kecamatan');
                kecamatanSelect.empty();

                if (kecamatanOptions[kabupatenKota]) {
                    kecamatanOptions[kabupatenKota].forEach(function(kecamatan) {
                        kecamatanSelect.append(new Option(kecamatan, kecamatan));
                    });
                }

                $('#kelurahan').empty();
            });

            $('#kecamatan').on('change', function() {
                const kecamatan = $(this).val();
                const kelurahanSelect = $('#kelurahan');
                kelurahanSelect.empty();

                if (kelurahanOptions[kecamatan]) {
                    kelurahanOptions[kecamatan].forEach(function(kelurahan) {
                        kelurahanSelect.append(new Option(kelurahan, kelurahan));
                    });
                }
            });
        });
    </script>

@endsection
