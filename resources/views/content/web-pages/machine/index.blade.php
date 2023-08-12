@extends('layouts/contentNavbarLayout')

@section('title', 'Cabang')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Mesin</span>
    </h4>

    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Semua Mesin </h5>
        <h6 class="card-subtitle text-muted">
            <a href="#" class="mx-2 my-2 btn btn-primary" data-toggle="modal" data-target="#Insert">
                <i class="menu-icon tf-icons bx bx-edit"></i> Tambah Mesin
            </a>
        </h6>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif

        <div class="table-responsive text-nowrap">
            <table class="table table-hover zero-configuration">
                <thead>
                    <tr class="text-nowrap">
                        <th>No</th>
                        <th>Foto</th>
                        <th>Cabang</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($machines as $machine)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><img src="{{ asset('file/machine') }}/foto/{{ $machine->photo }}" width="100px" /></td>
                            <td>{{ $machine->nama_cabang }}</td>
                            <td>{{ $machine->nama }}</td>
                            <td>
                                <a href="#" class="mx-2 text-primary" data-toggle="modal"
                                    data-target="#Update{{ $machine->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Edit detail user">
                                    <i class="menu-icon tf-icons bx bx-edit"></i>
                                </a>
                                <a href="#" class="mx-2 text-warning" data-toggle="modal"
                                    data-target="#Show{{ $machine->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Lihat detail user">
                                    <i class="menu-icon tf-icons bx bx-show"></i>
                                </a>
                                <a href="#" class="mx-2 text-danger" data-toggle="modal"
                                    data-target="#Delete{{ $machine->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Hapus user">
                                    <i class="menu-icon tf-icons bx bx-minus-circle"></i>
                                </a>
                            </td>
                            @include('content.web-pages.machine.modal')
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="Insert" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form class="modal-content" action="{{ route('machine.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Tambah Data Mesin</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="cabang_id" class="form-label">Cabang</label>
                            <select name="cabang_id" id="cabang_id" class="form-control" required>
                                <option value="">== Pilih Cabang ==</option>
                                @foreach ($cabangs as $cabang)
                                    <option value="{{ $cabang->id }}">{{ $cabang->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control">
                        </div>
                        <div class="row mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" id="foto" name="foto" class="form-control"
                                accept="image/png, image/jpg, image/jpeg">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    <!--/ Responsive Table -->
@endsection
