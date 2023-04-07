@extends('layout.main-layout')

@section('content')
    <div class="pagetitle">
        <h1>Kelola Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Kelola Data</li>
                <li class="breadcrumb-item active">Data Pegawai</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @include('komponen.pesan')
    <section class="section">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title d-flex justify-content-start">Data Pegawai</h5>
                        <h5 class="card-title d-flex justify-content-end">
                            <a href="form-pegawai" class="btn btn-primary">
                                <i class="bi bi-plus me-1"></i> Tambah Data
                            </a>
                        </h5>
                    </div>
                    

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Divisi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $posts->firstItem() ?>
                            @forelse ($posts as $item)
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $item->nip }}</td>
                                    <td>{{ $item->nama_pegawai }}</td>
                                    <td>{{ $item->divisi }}</td>
                                    <td>
                                        <div class="d-flex justify-between">
                                            <a href="kelola-pegawai/{{ $item->nip }}/edit" class="btn btn-secondary bi bi-pen mx-1"></a>
                                            <form action="{{ url('admin/kelola-pegawai/'.$item->nip) }}" method="post" onsubmit="return confirm('Yakin akan menghapus data ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" name="submit" class="btn btn-danger bi bi-trash mx-1"></button>
                                            </form>
                                            {{-- <a href="" class="btn btn-danger bi bi-trash mx-1"></a> --}}
                                        </div>
                                    </td>
                                    <?php $i++ ?>
                                </tr>
                            @empty
                            <div class="alert alert-danger">
                                Oops Data Kosong
                            </div>
                        @endforelse
                    </table>
                    {{ $posts->links() }}
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
        </div>
    </section>
@endsection
