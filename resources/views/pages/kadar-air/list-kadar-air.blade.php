@extends('layouts.app')

@section('title', 'Kadar Air')
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
                    <div class="col-9">
                        <h3 class="card-title">DataTable @yield('title') @yield('name')</h3>
                    </div>
                    @if (Auth::user()->role_id != 2)
                        <div class="col-3">
                            <a href="{{ route('create.kadar.air') }}" class="btn btn-block btn-sm btn-primary float-right">
                                Tambah @yield('name') @yield('title')
                                <i class="nav-icon fas fa-plus"></i>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Deskripsi Kadar Air</th>
                            @if (Auth::user()->role_id != 2)
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($get_data_kadar_air as $item)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->deskripsi_kadar_air }}</td>
                                @if (Auth::user()->role_id != 2)
                                    <td class="project-actions text-center">
                                        <form action="{{ route('delete.kadar.air', $item) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('edit.kadar.air', $item) }}" class="btn btn-warning btn-sm"><i
                                                    class="fas fa-pencil-alt"> Edit</i></a>
                                            <div class="btn-group btn-group-sm">
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
                                                    Delete</button>
                                            </div>
                                        </form>
                                    </td>
                                @endif
                            </tr>
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

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
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
@endsection
