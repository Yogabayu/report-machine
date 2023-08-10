<div class="modal fade" id="Delete{{ $cabang->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Hapus Cabang</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cabang.destroy', [$cabang->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        Apakah data ingin dihapus
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

<div class="modal fade" id="Update{{ $cabang->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('cabang.update', [$cabang->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Update Cabang</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="provinsi_code" class="form-label">Provinsi</label>
                            <select name="provinsi_code" id="provinsi_code" class="form-control" required>
                                <option value="">== Pilih Provinsi ==</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->code }}"
                                        @if ($cabang->provinsi_code == $province->code) selected @else @endif>
                                        {{ $province->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row mb-3">
                            <label for="kota_code" class="form-label">Kota</label>
                            <select name="kota_code" id="kota_code" class="form-control" required>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->code }}"
                                        @if ($cabang->kota_code == $city->code) selected @else @endif>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="kecamatan_code" class="form-label">Kecamatan</label>
                            <select name="kecamatan_code" id="kecamatan_code" class="form-control" required>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->code }}"
                                        @if ($cabang->kecamatan_code == $district->code) selected @else @endif>
                                        {{ $district->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="desa_code" class="form-label">Desa</label>
                            <select name="desa_code" id="desa_code" class="form-control" required>
                                @foreach ($village as $vill)
                                    <option value="{{ $vill->code }}"
                                        @if ($cabang->desa_code == $vill->code) selected @else @endif>
                                        {{ $vill->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control"
                                value="{{ $cabang->nama }}">
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control"
                                value="{{ $cabang->alamat }}">
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

<div class="modal fade" id="Show{{ $cabang->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Detail Cabang</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <div class="row mb-3">
                        <label for="province" class="form-label">Provinsi</label>
                        <input type="text" id="province" class="form-control" value="{{ $cabang->province }}"
                            disabled>
                    </div>
                    <div class="row mb-3">
                        <label for="city" class="form-label">Kota</label>
                        <input type="text" id="city" class="form-control" value="{{ $cabang->city }}"
                            disabled>
                    </div>
                    <div class="row mb-3">
                        <label for="district" class="form-label">Kecamatan</label>
                        <input type="text" id="district" class="form-control" value="{{ $cabang->district }}"
                            disabled>
                    </div>
                    <div class="row mb-3">
                        <label for="village" class="form-label">Desa</label>
                        <input type="text" id="village" class="form-control" value="{{ $cabang->village }}"
                            disabled>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" class="form-control" value="{{ $cabang->nama }}"
                            disabled>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" id="alamat" class="form-control" value="{{ $cabang->alamat }}"
                            disabled>
                    </div>
                    <div class="row mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <img src="{{ asset('file/cabang') }}/foto/{{ $cabang->foto }}" width="100%" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
