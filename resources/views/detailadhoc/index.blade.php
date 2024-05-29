@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="my-4">Detail Badan Ad/hoc</h1>
        <a href="{{ route('badan_adhoc_details.create') }}" class="btn btn-primary mb-4">Tambah Detail</a>
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
                            <td>{{ $detail->kota }}</td>
                            <td>{{ $detail->provinsi }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                    data-id="{{ $detail->id }}">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
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
@endsection
