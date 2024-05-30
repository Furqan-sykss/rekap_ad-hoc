@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chart Badan Adhoc</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
            .container {
                background-color: #0e2238;
                color: #fff;
                padding: 20px;
                border-radius: 15px;
            }

            .table-container {
                margin-top: 30px;
                background-color: #fff;
                color: #000;
                padding: 20px;
                border-radius: 15px;
            }

            .table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
            }

            .table th,
            .table td {
                padding: 0.75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
            }

            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }

            .table tbody+tbody {
                border-top: 2px solid #dee2e6;
            }

            .table-bordered {
                border: 1px solid #dee2e6;
            }

            .table-bordered th,
            .table-bordered td {
                border: 1px solid #dee2e6;
            }
        </style>
    </head>

    <body>

        <div class="container mt-5">
            <h1 class="text-center">Jumlah Badan Adhoc dari Tiap Kota</h1>
            <form method="GET" action="{{ route('charts.badan_adhoc') }}" class="mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <label>Posisi</label>
                        <select name="posisi" class="form-control">
                            @foreach ($positions as $value => $label)
                                <option value="{{ $value }}" {{ $selectedPosition == $value ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mt-4">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <canvas id="cityChart"></canvas>
                </div>
            </div>

            <div class="table-container mt-5">
                <h2 class="text-center">Perbandingan Jumlah Badan Adhoc per Kota</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kota</th>
                            <th>Jumlah Badan Adhoc</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $city => $total)
                            <tr>
                                <td>{{ $city }}</td>
                                <td>{{ $total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="table-container mt-5">
                <h2 class="text-center">Jumlah Badan Adhoc per Kelurahan</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kota</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Jumlah PPK</th>
                            <th>Jumlah PPS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kecamatanData as $data)
                            <tr>
                                <td>{{ $data->kabupaten_kota }}</td>
                                <td>{{ $data->kecamatan }}</td>
                                <td>{{ $data->kelurahan }}</td>
                                <td>{{ $data->total_ppk }}</td>
                                <td>{{ $data->total_pps }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('cityChart').getContext('2d');
                const cityData = @json($cities);

                const data = {
                    labels: Object.keys(cityData),
                    datasets: [{
                        label: 'Jumlah Badan Adhoc',
                        data: Object.values(cityData),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                };

                const config = {
                    type: 'pie',
                    data: data,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Jumlah Badan Adhoc dari Tiap Kota'
                            }
                        }
                    },
                };

                new Chart(ctx, config);
            });
        </script>

    </body>

    </html>
@endsection
