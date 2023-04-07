@extends('layout.main-layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Menambah Data Pegawai</h5>
            @include('komponen.pesan')
            <!-- Vertical Form -->
            <form action="kelola-pegawai" method="post" class="row g-3">
                @csrf
                <div class="col-12">
                    <label for="nip" class="form-label">Nomor Induk Pegawai</label>
                    <input type="text" class="form-control" id="nip" name="nip" maxlength="6" value="{{ Session::get ('nip') }}">
                </div>
                <div class="col-12">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ Session::get ('nama_pegawai') }}">
                </div>
                <div class="col-12">
                    <label for="nama" class="form-label">Divisi</label>
                    <select class="form-select" id="divisi" name="divisi" value="{{ Session::get ('divisi') }}">
                        <option selected>Pilih Divisi</option>
                        <option value="1">Cleaning Service</option>
                        <option value="2">Security</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>
@endsection
