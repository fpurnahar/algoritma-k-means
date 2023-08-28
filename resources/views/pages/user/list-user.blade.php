@extends('layouts.app')

@section('title', 'Users')
@section('name', 'Management')

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
                        @if (session('info'))
                            <div class="alert alert-warning">
                                {{ session('info') }}
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
                    <div class="col">
                        <h3 class="card-title">DataTable @yield('title')</h3>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="col-4 mb-2 float-right">
                    <form>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="search" name="search">
                            <span class="input-group-append">
                                <i class="btn btn-info btn-flat">Go!</i>
                            </span>
                        </div>
                    </form>
                </div>
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Nama User</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Verified</th>
                            <th>Created</th>
                            <th>Updated</th>
                            @if (Auth::user()->role_id != 2)
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($get_user as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user_name }}</td>
                                <td>{{ $item->role_name }}</td>
                                <td>{{ $item->user_email }}</td>
                                <td>{{ date('d-M-Y', strtotime($item->user_verified)) }}</td>
                                <td>{{ date('d-M-Y', strtotime($item->user_created)) }}</td>
                                <td>{{ date('d-M-Y', strtotime($item->user_updated)) }}</td>
                                @if (Auth::user()->role_id != 2)
                                    @if ($item->user_id == 1)
                                        {{-- <td class="project-actions text-center block">
                                            <a href="#" class="btn btn-warning btn-sm"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        </td> --}}
                                    @else
                                        <td class="project-actions text-center">
                                            <form action="{{ route('delete.user', $item->user_id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group btn-group-sm">
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fas fa-trash"></i></button>
                                                </div>
                                            </form>
                                        </td>
                                    @endif
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2 mb-2">
                    {{ $get_user->links('pagination::bootstrap-5') }}
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
                url: "{{ route('search.user') }}",
                data: {
                    'search.user': $value
                },
                success: function(data) {
                    console.log(data);
                    var trHTML = '';
                    data.data.forEach(function(item, index) {
                        index++;
                        trHTML +=
                            `<tr>
                                <td>` + index + `</td>
                                <td>` + item.user_name + `</td>
                                <td>` + item.role_name + `</td>
                                <td>` + item.user_email + `</td>
                                <td>` + item.user_verified + `</td>
                                <td>` + item.user_created + `</td>
                                <td>` + item.user_updated + `</td>
                                <td>
                                    <form action="delete/` + item.user_id + `" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            <div class="btn-group btn-group-sm">
                                                <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
                                            </div>
                                    </form>
                                </td>
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
