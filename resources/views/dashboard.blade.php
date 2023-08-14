@extends('layouts.app')

@section('title', 'Dashboard')
@section('name', 'Biji Kopi')

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable @yield('name')</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <div class="float-left mb-12">
                            <form action="{{ route('cluster') }}" method="POST">
                                @csrf
                                <button class="btn btn-block btn-sm btn-success" type="submit"> Generate
                                    Cluster</button>
                            </form>
                        </div>
                        <div class="float-right mb-12">
                            <form>
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" id="search" name="search">
                                    <span class="input-group-append">
                                        <i class="btn btn-info btn-flat">Go!</i>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Aroma</th>
                            <th>Warna</th>
                            <th>Fisik</th>
                            <th>Kadar Air</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($get_data_biji_kopi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_biji_kopi }}</td>
                                <td>{{ $item->deskripsi_aroma }}</td>
                                <td>{{ $item->deskripsi_warna }}</td>
                                <td>{{ $item->deskripsi_fisik }}</td>
                                <td>{{ $item->deskripsi_kadar_air }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2 mb-2">
                    {{ $get_data_biji_kopi->links('pagination::bootstrap-5') }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection

@section('script')

    <script type="text/javascript">
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
    </script>

@endsection
