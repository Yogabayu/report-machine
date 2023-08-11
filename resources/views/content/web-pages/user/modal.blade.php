<div class="modal fade" id="Show{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Detail User</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <div class="row mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <img src="{{ asset('file/profile') }}/foto/{{ $user->foto }}" class="justify-content-center"
                            style="width: 500px" />
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" id="email" class="form-control" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" class="form-control" value="{{ $user->nama }}" disabled>
                    </div>

                    <div class="row mb-3">
                        <label for="cabang" class="form-label">Cabang</label>
                        <input type="text" id="cabang" class="form-control" value="{{ $user->nama_cabang }}"
                            disabled>
                    </div>

                    <div class="row mb-3">
                        <label for="level" class="form-label">Level Akun</label>
                        <input type="text" id="cabang" class="form-control"
                            value="@if ($user->level == 1) Superadmin
                    @elseif ($user->level == 2)
                        Admin
                    @elseif ($user->level == 3)
                        Teknisi
                    @else
                        - @endif"
                            disabled>
                    </div>

                    <div class="row mb-3">
                        <label for="status" class="form-label">Status Akun</label>
                        <input type="text" id="status" class="form-control"
                            value="@if ($user->status == 0) Nonaktif
                    @elseif ($user->status == 1)
                        Aktif
                    @else
                        - @endif"
                            disabled>
                    </div>

                    <div class="row mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" id="alamat" class="form-control" value="{{ $user->alamat }}" disabled>
                    </div>

                    <div class="row mb-3">
                        <label for="umur" class="form-label">Umur</label>
                        <input type="number" id="umur" class="form-control" value="{{ $user->umur }}" disabled>
                    </div>

                    <div class="row mb-3">
                        <label for="pendidikan" class="form-label">Pendidikan</label>
                        <input type="text" id="pendidikan" class="form-control" value="{{ $user->pendidikan }}"
                            disabled>
                    </div>

                    <div class="row mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <input type="text" id="pendidikan" class="form-control"
                            value="@if ($user->jenis_kelamin == 'l') Laki-laki
                    @elseif ($user->jenis_kelamin == 'p')
                        Perempuan
                    @else
                        - @endif"
                            disabled>
                    </div>

                    <div class="row mb-3">
                        <label for="telp" class="form-label">Telephone</label>
                        <input type="text" id="telp" class="form-control" value="{{ $user->telp }}" disabled>
                    </div>

                    <div class="row mb-3">
                        <label for="telp" class="form-label">Status Pernikahan</label>
                        <input type="text" id="telp" class="form-control"
                            value="@if ($user->mariage == 1) Menikah
                    @elseif ($user->mariage == 2)
                        Belum Menikah
                    @elseif ($user->mariage == 3)
                        Undefined
                    @else
                        - @endif"
                            disabled>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="Delete{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Hapus User</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.destroy', [$user->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-body" style="max-height: 300px; overflow-y: auto;">
                        <p>
                            Apakah data ingin dihapus ?
                        </p>
                        <p class="text-danger">
                            User yang dihapus tidak dapat dipulihkan (termasuk riwayat, dll)
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="Update{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('user.update', [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Tambah Data User</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ $user->email }}">
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
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control">
                        </div>

                        <div class="row mb-3">
                            <label for="umur" class="form-label">Umur</label>
                            <input type="number" id="umur" name="umur" class="form-control">
                        </div>

                        <div class="row mb-3">
                            <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                            <input type="text" id="pendidikan" name="pendidikan" class="form-control">
                        </div>

                        <div class="row mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="">---</option>
                                <option value="l">Laki-laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                        </div>

                        <div class="row mb-3">
                            <label for="telp" class="form-label">Telp</label>
                            <input type="number" id="telp" name="telp" class="form-control">
                        </div>

                        <div class="row mb-3">
                            <label for="mariage" class="form-label">Status Pernikahan</label>
                            <select name="mariage" id="mariage" class="form-control" required>
                                <option value="">---</option>
                                <option value="1">Menikah</option>
                                <option value="2">Belum menikah</option>
                                <option value="3">Undefined</option>
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
            </div>
        </form>
    </div>
</div>
