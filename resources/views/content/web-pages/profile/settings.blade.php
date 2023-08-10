@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Account Settings /</span> Account
    </h4>

    <div class="row">
        <div class="col-md-12">
            {{-- <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
                        Account</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('pages/account-settings-notifications') }}"><i
                            class="bx bx-bell me-1"></i> Notifications</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('pages/account-settings-connections') }}"><i
                            class="bx bx-link-alt me-1"></i> Connections</a></li>
            </ul> --}}
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
            <div class="card mb-4">
                <h5 class="card-header">Authentication</h5>
                <hr class="my-0">
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="{{ route('authupdate') }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control" type="email" id="email" name="email"
                                    value="{{ $user->email ?? '' }}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" type="password" name="password" id="password" />
                            </div>
                        </div>
                        <div class="mt-2" style="display: flex; justify-content: flex-end">
                            <button type="submit" class="btn btn-primary me-2">
                                Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <h5 class="card-header">Profile</h5>
                <hr class="my-0">
                <div class="card-body">
                    <form action="{{ route('profileupdate') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                            <div class="mb-3 col-md-6">
                                <label for="cabang" class="form-label">Cabang</label>
                                <select name="cabang_id" id="cabang_id" class="form-control" required>
                                    <option value="">-</option>
                                    @foreach ($cabang as $cab)
                                        <option value="{{ $cab->id }}"
                                            @if ($profile->cabang_id == $cab->id) selected @else @endif>
                                            {{ $cab->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input class="form-control" type="text" name="nama" id="nama"
                                    value="{{ $profile->nama ?? '' }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input class="form-control" type="text" name="alamat" id="umur"
                                    value="{{ $profile->alamat ?? '' }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="umur" class="form-label">Umur</label>
                                <input class="form-control" type="number" name="umur" id="umur"
                                    value="{{ $profile->umur ?? '' }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                                <input class="form-control" type="text" name="pendidikan" id="pendidikan"
                                    value="{{ $profile->pendidikan ?? '' }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="l" @if ($profile->jenis_kelamin == 'l') selected @endif>Laki-laki
                                    </option>
                                    <option value="p" @if ($profile->jenis_kelamin == 'p') selected @endif>Perempuan
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="telp" class="form-label">Telp.</label>
                                <input class="form-control" type="text" name="telp" id="telp"
                                    value="{{ $profile->telp ?? '' }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="mariage" class="form-label">Status Pernikahan</label>
                                <select name="mariage" id="mariage" class="form-control" required>
                                    <option value="1" @if ($profile->mariage == 1) selected @endif>Menikah
                                    </option>
                                    <option value="2" @if ($profile->mariage == 2) selected @endif>Belum Menikah
                                    </option>
                                    <option value="3" @if ($profile->mariage == 3) selected @endif>Undefined
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="foto" class="form-label">Foto</label>
                                <img src="{{ asset('file/profile') }}/foto/{{ $profile->foto }}" width="50%" />
                                <input type="file" id="foto" name="foto" class="form-control"
                                    accept="image/png, image/jpg, image/jpeg">
                            </div>
                        </div>
                        <div class="mt-2" style="display: flex; justify-content: flex-end">
                            <button type="submit" class="btn btn-primary me-2">
                                Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <h5 class="card-header">Delete Account</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">
                                Apakah anda yakin ingin menghapus akun?
                            </h6>
                            <p class="mb-0">
                                Setelah Anda menghapus akun Anda, tidak ada jalan untuk kembali. Harap yakin.
                            </p>
                        </div>
                    </div>
                    <form id="formAccountDeactivation" action="{{ route('user.delete') }}" method="POST">
                        @csrf
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="accountActivation"
                                id="accountActivation" />
                            <label class="form-check-label" for="accountActivation">Saya mengkonfirmasi akun saya
                                penonaktifan</label>
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Delete Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
