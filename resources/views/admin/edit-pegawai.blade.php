@extends('layout.main-layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Menambah Data Pegawai</h5>
            @include('komponen.pesan')
            <!-- Vertical Form -->
            <form action="{{ url('admin/kelola-pegawai/'.$data->nip) }}" method="post" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <label for="nip" class="form-label">Nomor Induk Pegawai</label>
                    <input type="text" class="form-control" id="nip" name="nip" value="{{ $data->nip }}" disabled>
                </div>
                <div class="col-12">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama_pegawai }}">
                </div>
                <div class="col-12">
                    <label for="nama" class="form-label">Divisi</label>
                    <select class="form-select" id="divisi" name="divisi">
                        <option value="1"{{ $data->divisi == 'Cleaning Service' ? 'selected' : '' }}>Cleaning Service</option>
                        <option value="2"{{ $data->divisi == 'Security' ? 'selected' : '' }}>Security</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>
@endsection
