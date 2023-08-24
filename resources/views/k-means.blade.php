@extends('layouts.app')

@section('title', 'K-Means')
@section('name', 'Clustering Biji Kopi')

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable Clustering 1 Biji Kopi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="float-right mb-12">
                            {{-- <form action="{{ route('cluster') }}" method="POST">
                                @csrf
                                <button class="btn btn-block btn-success" type="submit"> Generate
                                    Cluster</button>
                            </form> --}}
                        </div>
                    </div>
                </div>
                <table id="cluster1A" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Biji Kopi</th>
                            <th>Aroma Biji Kopi</th>
                            <th>Warna Biji Kopi</th>
                            <th>Fisik Biji Kopi</th>
                            <th>Kadar Air Biji Kopi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result_cluster['cluster_1'] as $key => $cluster)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cluster->nama_biji_kopi }}</td>
                                <td>{{ $cluster->deskripsi_aroma }}</td>
                                <td>{{ $cluster->deskripsi_warna }}</td>
                                <td>{{ $cluster->deskripsi_fisik }}</td>
                                <td>{{ $cluster->deskripsi_kadar_air }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable Clustering 2 Biji Kopi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="float-right mb-12">
                            {{-- <form action="{{ route('cluster') }}" method="POST">
                                @csrf
                                <button class="btn btn-block btn-success" type="submit"> Generate
                                    Cluster</button>
                            </form> --}}
                        </div>
                    </div>
                </div>
                <table id="cluster2A" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Biji Kopi</th>
                            <th>Aroma Biji Kopi</th>
                            <th>Warna Biji Kopi</th>
                            <th>Fisik Biji Kopi</th>
                            <th>Kadar Air Biji Kopi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result_cluster['cluster_2'] as $key => $cluster)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cluster->nama_biji_kopi }}</td>
                                <td>{{ $cluster->deskripsi_aroma }}</td>
                                <td>{{ $cluster->deskripsi_warna }}</td>
                                <td>{{ $cluster->deskripsi_fisik }}</td>
                                <td>{{ $cluster->deskripsi_kadar_air }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable Clustering 3 Biji Kopi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="float-right mb-12">
                            {{-- <form action="{{ route('cluster') }}" method="POST">
                                @csrf
                                <button class="btn btn-block btn-success" type="submit"> Generate
                                    Cluster</button>
                            </form> --}}
                        </div>
                    </div>
                </div>
                <table id="cluster3A" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Biji Kopi</th>
                            <th>Aroma Biji Kopi</th>
                            <th>Warna Biji Kopi</th>
                            <th>Fisik Biji Kopi</th>
                            <th>Kadar Air Biji Kopi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result_cluster['cluster_3'] as $key => $cluster)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cluster->nama_biji_kopi }}</td>
                                <td>{{ $cluster->deskripsi_aroma }}</td>
                                <td>{{ $cluster->deskripsi_warna }}</td>
                                <td>{{ $cluster->deskripsi_fisik }}</td>
                                <td>{{ $cluster->deskripsi_kadar_air }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Grafik Chart Clustering Biji Kopi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <canvas id="clusteringChart" width="400" height="200"></canvas>
            </div>
        </div>

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Grafik Chart Clustering Biji Kopi</h3>
            </div>
            <!-- /.card-header -->
            <<canvas id="attributeChart" width="400" height="200"></canvas>

        </div>
    </section>
@endsection

@section('script')

    <script>
        $(function() {
            $("#cluster1A").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#cluster1A_wrapper .col-md-6:eq(0)');
            $('#cluster1B').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $("#cluster2A").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#cluster2A_wrapper .col-md-6:eq(0)');
            $('#cluster2B').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $("#cluster3A").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#cluster3A_wrapper .col-md-6:eq(0)');
            $('#cluster3B').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    {{-- Grafik Data Cluster --}}
    <!-- Include Chart.js from CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script>
        var clusterNames = @json(array_keys($clusterCounts));
        var clusterCounts = @json(array_values($clusterCounts));
        var fourthAttribute = @json($fourthAttribute);

        var ctx = document.getElementById('clusteringChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: clusterNames,
                datasets: [{
                    label: 'Jumlah Elemen dalam Setiap Cluster',
                    data: clusterCounts,
                    backgroundColor: fourthAttribute.map((value, index) => {
                        if (index % 3 === 0) {
                            return 'rgba(0, 0, 255, 0.6)'; // Blue
                        } else if (index % 3 === 1) {
                            return 'rgba(0, 128, 0, 0.6)'; // Green
                        } else {
                            return 'rgba(255, 0, 0, 0.6)'; // Red
                        }
                    }), // Customize color encoding
                    borderColor: 'rgba(75, 192, 192, 1)', // Sesuaikan dengan warna yang Anda inginkan
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


    {{-- <script src="{{ asset('admin_lte/plugins/chart.js/Chart.min.js') }}"></script> --}} --}}
    <script>
        var attributeNames = @json($attributeNames);
        var attributeValues = @json($attributeValues);

        var ctx = document.getElementById('attributeChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: attributeNames,
                datasets: [{
                    label: 'Attribute Values',
                    data: attributeValues,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Set your desired color
                    borderColor: 'rgba(75, 192, 192, 1)', // Set your desired color
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
