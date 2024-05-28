<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>siakba</title>
</head>

<body>

    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <label>REGISTER</label>
                        <hr>

                        <form method="POST" action="{{ route('register.store') }}">
                            @csrf

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap"
                                    placeholder="Masukkan Nama Lengkap">
                            </div>

                            <div class="form-group">
                                <label>Alamat Email</label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="Masukkan Alamat Email">
                            </div>

                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" class="form-control" name="nik"
                                    placeholder="Masukkan NIK (16 angka)">
                            </div>

                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir"
                                    placeholder="Masukkan Tempat Lahir">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir">
                            </div>

                            <div class="form-group">
                                <label>No. BPJS Kesehatan</label>
                                <input type="text" class="form-control" name="no_bpjs_kesehatan"
                                    placeholder="Masukkan No. BPJS Kesehatan">
                            </div>

                            <div class="form-group">
                                <label>No. BPJS Ketenagakerjaan</label>
                                <input type="text" class="form-control" name="no_bpjs_ketenagakerjaan"
                                    placeholder="Masukkan No. BPJS Ketenagakerjaan">
                            </div>

                            <div class="form-group">
                                <label>NPWP</label>
                                <input type="text" class="form-control" name="npwp" placeholder="Masukkan NPWP">
                            </div>

                            <div class="form-group">
                                <label>No. HP</label>
                                <input type="text" class="form-control" name="no_hp" placeholder="Masukkan No. HP">
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Provinsi</label>
                                <select class="form-control" name="provinsi" id="provinsi">
                                    <option value="Aceh">Aceh</option>
                                    <!-- Tambahkan provinsi lain jika diperlukan -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kabupaten/Kota</label>
                                <select class="form-control" name="kabupaten_kota" id="kabupaten_kota">
                                    <option value="Banda Aceh">Banda Aceh</option>
                                    <option value="Lhokseumawe">Lhokseumawe</option>
                                    <option value="Langsa">Langsa</option>
                                    <option value="Sabang">Sabang</option>
                                    <!-- Tambahkan kabupaten/kota lain di Aceh -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select class="form-control" name="kecamatan" id="kecamatan">
                                    <!-- Kecamatan akan diisi dengan JavaScript berdasarkan kabupaten/kota yang dipilih -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kelurahan</label>
                                <select class="form-control" name="kelurahan" id="kelurahan">
                                    <!-- Kelurahan akan diisi dengan JavaScript berdasarkan kecamatan yang dipilih -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Agama</label>
                                <select class="form-control" name="agama">
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Masukkan Password">
                            </div>

                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Konfirmasi Password">
                            </div>

                            <button type="submit"
                                class="mt-3 btn btn-register btn-block btn-success">REGISTER</button>
                        </form>

                    </div>
                </div>

                <div class="text-center" style="margin-top: 15px">
                    Sudah punya akun? <a href="{{ route('login') }}">Silahkan Login</a>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const kecamatanOptions = {
            "Banda Aceh": ["Baiturrahman", "Banda Raya", "Jaya Baru", "Kuta Alam", "Kuta Raja", "Lueng Bata", "Meuraxa",
                "Syiah Kuala", "Ulee Kareng"
            ],
            "Lhokseumawe": ["Banda Sakti", "Blang Mangat", "Muara Dua", "Muara Satu"],
            "Langsa": ["Langsa Barat", "Langsa Kota", "Langsa Lama", "Langsa Timur", "Langsa Baro"],
            "Sabang": ["Sukajaya", "Sukakarya", "Sukamakmue"]
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
            "Sukakarya": ["Aneuk Laot", "Krueng Raya", "Kuta Ateueh", "Kuta Barat", "Kuta Timu"],
            "Sukamakmue": ["Batee Shok", "Beurawang", "Iboih", "Keuneukai", "Paya", "Paya Seunara"]
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


</body>

</html>
