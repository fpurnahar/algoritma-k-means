@extends('layouts.app')

@section('title', 'Edit')
@section('name', 'Biji Kopi')

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
                        <form action="{{ route('update.biji.kopi', $edit_biji_kopi->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="namaBijiKopi">Nama Biji Kopi</label>
                                            <input type="text" class="form-control" id="namaBijiKopi"
                                                name="nama_biji_kopi" value="{{ $edit_biji_kopi->nama_biji_kopi }}"
                                                placeholder="Enter nama biji kopi ..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="user_id" name="user_id"
                                                value="{{ Auth::user()->role_id }}" hidden>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Aroma Biji Kopi</label>
                                            <select class="form-control" name="aroma_id" required>
                                                <option value="{{ $edit_biji_kopi->aroma_id }}">
                                                    {{ $edit_biji_kopi->deskripsi_aroma }}
                                                </option>
                                                @foreach ($get_aroma_biji_kopi as $aroma)
                                                    <option value="{{ $aroma->id }}">
                                                        {{ $aroma->deskripsi_aroma }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Warna Biji Kopi</label>
                                            <select class="form-control" name="warna_id" required>
                                                <option value="{{ $edit_biji_kopi->warna_id }}">
                                                    {{ $edit_biji_kopi->deskripsi_warna }}
                                                </option>
                                                @foreach ($get_warna_biji_kopi as $warna)
                                                    <option value="{{ $warna->id }}">
                                                        {{ $warna->deskripsi_warna }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Fisik Biji Kopi</label>
                                            <select class="form-control" name="fisik_id" required>
                                                <option value="{{ $edit_biji_kopi->fisik_id }}">
                                                    {{ $edit_biji_kopi->deskripsi_fisik }}
                                                </option>
                                                @foreach ($get_fisik_biji_kopi as $fisik)
                                                    <option value="{{ $fisik->id }}">
                                                        {{ $fisik->deskripsi_fisik }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kadar Air Biji Kopi</label>
                                            <select class="form-control" name="kadar_air_id" required>
                                                <option value="{{ $edit_biji_kopi->kadar_air_id }}">
                                                    {{ $edit_biji_kopi->deskripsi_kadar_air }}
                                                </option>
                                                @foreach ($get_kadar_air_biji_kopi as $kadar_air)
                                                    <option value="{{ $kadar_air->id }}">
                                                        {{ $kadar_air->deskripsi_kadar_air }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('dashboard') }}" class="btn btn-primary float-left">Back Data Biji
                                    Kopi</a>
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

@endsection
