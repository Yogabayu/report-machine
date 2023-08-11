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
