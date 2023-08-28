@extends('layouts.app')

@section('title', 'Update')
@section('name', 'User Manafement')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('info'))
                        <div class="alert alert-danger">
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
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('update.user', Auth::user()->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="userName">Nama</label>
                                            <input type="text" class="form-control" id="user_name" name="user_name"
                                                value="{{ $profile->user_name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="userRole">Role User</label>
                                            <input type="text" class="form-control" value="{{ $profile->role_name }}"
                                                required>
                                            <input type="text" class="form-control" id="role_id" name="role_id"
                                                value="{{ $profile->role_id }}" hidden>
                                        </div>
                                        <div class="form-group">
                                            <label for="userEmail">Email</label>
                                            <input type="email" class="form-control" id="user_email" name="user_email"
                                                value="{{ $profile->user_email }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="userEmail">Email Verified</label>
                                            <input type="date" class="form-control" id="user_verified"
                                                name="user_verified"
                                                value="{{ date('Y-m-d', strtotime($profile->user_verified)) }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="passwordUser">Password</label>
                                            <div class="input-group mb-3">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" placeholder="Password"
                                                    value="{{ $profile->user_password }}" autocomplete="new-password">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (session('info'))
                                                <div class="alert alert-danger">
                                                    {{ session('info') }}
                                                </div>
                                            @endif
                                            <div class="input-group mb-3">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    placeholder="Retype password" name="password_confirmation"
                                                    value="{{ $profile->user_password }}" autocomplete="new-password">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (session('info'))
                                                <div class="alert alert-danger">
                                                    {{ session('info') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="image">Image User</label>
                                        <div class="card text-center">
                                            <img src="{{ asset($profile->user_image_path) }}" class="card-img-top"
                                                id="previewimg">
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="imgInp"
                                                        name="user_image_path">
                                                    <input type="text" name="user_image_path"
                                                        value="{{ $profile->user_image_path }}" hidden>
                                                    <label class="custom-file-label"
                                                        for="customFile">{{ $profile->user_image_path }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success float-right">Submit</button>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@section('script')
    <script src="{{ asset('') }}plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewimg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imgInp").change(function() {
            readURL(this);
        });
        bsCustomFileInput.init();
    </script>
@endsection
