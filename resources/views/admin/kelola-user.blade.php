@extends('layout.main-layout')

@section('content')
    <div class="pagetitle">
        <h1>Data User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Kelola Data</li>
                <li class="breadcrumb-item active">Data User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title d-flex justify-content-start">Data Pengguna</h5>
                        <h5 class="card-title d-flex justify-content-end">
                            <button type="button" class="btn btn-primary"><i class="bi bi-plus me-1"></i> Tambah Data</button>
                        </h5>
                    </div>
                    

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($nomor_urut = 1)
                            @forelse ($posts as $item)
                                <tr>
                                    <th scope="row">{{ $nomor_urut++ }}</th>
                                    <td>{{ $item->nip }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->jabatan_user }}</td>
                                    <td>
                                        <div class="d-flex justify-between">
                                            <a href="/kelola-user/{{ $item->nip }}/edit" class="btn btn-secondary bi bi-pen mx-1"></a>
                                            <a href="/kelola-user/{{ $item->nip }}/delete" class="btn btn-danger bi bi-trash mx-1"></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Post belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
        </div>
    </section>
@endsection
