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
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Biji Kopi</th>
                            <th>Aroma Biji Kopi</th>
                            <th>Warja Biji Kopi</th>
                            <th>Fisik Biji Kopi</th>
                            <th>Kadar Air Biji Kopi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result_data_clustering[0] as $cluster1)
                            <?php
                            // echo '<pre>';
                            // print_r($cluster1);
                            // echo '</pre>';
                            ?>
                            @foreach ($cluster1 as $val_cluster1)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $val_cluster1['nama_biji_kopi'] }}</td>
                                    <td>{{ $val_cluster1['deskripsi_aroma'] }}</td>
                                    <td>{{ $val_cluster1['deskripsi_warna'] }}</td>
                                    <td>{{ $val_cluster1['deskripsi_fisik'] }}</td>
                                    <td>{{ $val_cluster1['deskripsi_kadar_air'] }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection

@section('script')

    {{-- <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ route('search') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                    // console.log(data);
                    var trHTML = '';
                    data.data.forEach(function(item, index) {
                        index++;
                        trHTML +=
                            `<tr>
                                <td>` + index + `</td>
                                <td>` + item.nama_biji_kopi + `</td>
                                <td>` + item.deskripsi_aroma + `</td>
                                <td>` + item.deskripsi_warna + `</td>
                                <td>` + item.deskripsi_fisik + `</td>
                                <td>` + item.deskripsi_kadar_air + `</td>
                            </tr>`;
                    });
                    $('tbody').html(trHTML);
                }
            });
        })
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script> --}}

@endsection
