@extends('layouts.app')

@section('title', 'Dashboard')
@section('name', 'Biji Kopi')

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <ul>
                                        {{ $error }}
                                    </ul>
                                @endforeach
                            </div>
                        @endif

                    </div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <h3 class="card-title">DataTable @yield('name')</h3>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('create.biji.kopi') }}" class="btn btn-block btn-sm btn-primary float-right">
                            Tambah Data Biji Kopi
                            <i class="nav-icon fas fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <div class="float-left">
                            <form action="{{ route('cluster') }}" method="POST">
                                @csrf
                                <button class="btn btn-block btn-sm btn-success" type="submit"> Generate
                                    Cluster
                                    <i class="nav-icon fas fa-network-wired"></i>
                                </button>
                            </form>
                        </div>
                        <div class="float-right">
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
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Nama User</th>
                            <th>Role</th>
                            <th>Biji Kopi</th>
                            <th>Aroma</th>
                            <th>Warna</th>
                            <th>Fisik</th>
                            <th>Kadar Air</th>
                            @if (Auth::user()->role_id != 2)
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($get_data_biji_kopi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user_name }}</td>
                                <td>{{ $item->role_name }}</td>
                                <td>{{ $item->nama_biji_kopi }}</td>
                                <td>{{ $item->deskripsi_aroma }}</td>
                                <td>{{ $item->deskripsi_warna }}</td>
                                <td>{{ $item->deskripsi_fisik }}</td>
                                <td>{{ $item->deskripsi_kadar_air }}</td>
                                @if (Auth::user()->role_id != 2)
                                    <td class="project-actions text-center">
                                        <form action="{{ route('delete.biji.kopi', $item) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('edit.biji.kopi', $item) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            <div class="btn-group btn-group-sm">
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </div>
                                        </form>

                                        {{-- <a class="btn btn-warning btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a> --}}
                                    </td>
                                @endif
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
                                <td>` + item.user_name + `</td>
                                <td>` + item.role_name + `</td>
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
