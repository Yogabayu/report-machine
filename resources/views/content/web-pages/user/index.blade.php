@extends('layouts/contentNavbarLayout')

@section('title', 'Users')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">List Users</span>
    </h4>

    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Semua User</h5>
        <h6 class="card-subtitle text-muted">
            <a href="#" class="mx-2 my-2 btn btn-primary" data-toggle="modal" data-target="#Insert">
                <i class="menu-icon tf-icons bx bx-edit"></i> Tambah User
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
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Cabang</th>
                        <th>Level Akun</th>
                        <th>Status Akun</th>
                        <th>Jenis Kelamin</th>
                        <th>Telp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ asset('file/profile') }}/foto/{{ $user->foto }}" width="100%" />
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->nama_cabang }}</td>
                            <td>
                                @if ($user->level == 1)
                                    Superadmin
                                @elseif ($user->level == 2)
                                    Admin
                                @elseif ($user->level == 3)
                                    Teknisi
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($user->status == 0)
                                    Nonaktif
                                @elseif ($user->status == 1)
                                    Aktif
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($user->jenis_kelamin == 'l')
                                    Laki-laki
                                @elseif ($user->jenis_kelamin == 'p')
                                    Perempuan
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $user->telp }}</td>
                            <td>
                                <a href="#" class="mx-2 text-primary" data-toggle="modal"
                                    data-target="#Update{{ $user->id }}">
                                    <i class="menu-icon tf-icons bx bx-edit"></i>
                                </a>
                                <a href="#" class="mx-2 text-warning" data-toggle="modal"
                                    data-target="#Show{{ $user->id }}">
                                    <i class="menu-icon tf-icons bx bx-show"></i>
                                </a>
                                <a href="#" class="mx-2 text-danger" data-toggle="modal"
                                    data-target="#Delete{{ $user->id }}">
                                    <i class="menu-icon tf-icons bx bx-minus-circle"></i>
                                </a>
                            </td>
                            @include('content.web-pages.user.modal')
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="Insert" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form class="modal-content" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Tambah Data User</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        {{-- <div class="row mb-3">
                            <label for="provinsi_code" class="form-label">Provinsi</label>
                            <select name="provinsi_code" id="provinsi_code" class="form-control" required>
                                <option value="">== Pilih Provinsi ==</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->code }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="row mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
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
                            <label for="level" class="form-label">Level Akun</label>
                            <select name="level" id="level" class="form-control" required>
                                <option value="">---</option>
                                <option value="1">Superadmin</option>
                                <option value="2">Admin</option>
                                <option value="3">Teknisi</option>
                            </select>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="form-label">Status Akun</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="">---</option>
                                <option value="1">Aktif</option>
                                <option value="0">Nonaktif</option>
                            </select>
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

@endsection
