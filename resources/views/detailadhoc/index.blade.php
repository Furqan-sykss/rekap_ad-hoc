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
                        <th>Alamat</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
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
                                <td>{{ $detail->alamat }}</td>
                                <td>{{ $detail->kecamatan }}</td>
                                <td>{{ $detail->kelurahan }}</td>
                                <td>{{ $detail->kabupaten_kota }}</td>
                                <td>{{ $detail->provinsi }}</td>
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

        $(document).ready(function() {
            $('#kabupaten_kota').on('change', function() {
                const kabupatenKota = $(this).val();
                const kecamatanSelect = $('#kecamatan');
                const kelurahanSelect = $('#kelurahan');

                kecamatanSelect.empty().append('<option value="">Pilih Kecamatan</option>');
                kelurahanSelect.empty().append('<option value="">Pilih Kelurahan</option>');

                console.log("Kabupaten/Kota selected:", kabupatenKota); // Debugging line
                if (kecamatanOptions[kabupatenKota]) {
                    console.log("Kecamatan options found:", kecamatanOptions[
                        kabupatenKota]); // Debugging line
                    kecamatanOptions[kabupatenKota].forEach(function(kecamatan) {
                        kecamatanSelect.append(new Option(kecamatan, kecamatan));
                    });
                }
            });

            $('#kecamatan').on('change', function() {
                const kecamatan = $(this).val();
                const kelurahanSelect = $('#kelurahan');

                kelurahanSelect.empty().append('<option value="">Pilih Kelurahan</option>');

                console.log("Kecamatan selected:", kecamatan); // Debugging line
                if (kelurahanOptions[kecamatan]) {
                    console.log("Kelurahan options found:", kelurahanOptions[kecamatan]); // Debugging line
                    kelurahanOptions[kecamatan].forEach(function(kelurahan) {
                        kelurahanSelect.append(new Option(kelurahan, kelurahan));
                    });
                }
            });

            // Set initial kecamatan and kelurahan based on current filters
            @if (request('kabupaten_kota'))
                const currentKabupatenKota = '{{ request('kabupaten_kota') }}';
                const currentKecamatan = '{{ request('kecamatan') }}';
                const currentKelurahan = '{{ request('kelurahan') }}';

                $('#kabupaten_kota').val(currentKabupatenKota).trigger('change');
                if (currentKecamatan) {
                    setTimeout(function() {
                        $('#kecamatan').val(currentKecamatan).trigger('change');
                        if (currentKelurahan) {
                            setTimeout(function() {
                                $('#kelurahan').val(currentKelurahan);
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
