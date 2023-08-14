<div class="modal fade" id="Delete{{ $sparepart->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Hapus Sparepart</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sparepart.destroy', [$sparepart->id]) }}" method="POST">
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


<div class="modal fade" id="Show{{ $sparepart->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Detail Sparepart</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <div class="row mb-3 justify-content-center">
                        <label for="photo" class="form-label">Foto</label>
                        <img src="{{ asset('file/sparepart') }}/foto/{{ $sparepart->photo }}"
                            class="justify-content-center" style="width: 500px" />
                    </div>

                    <div class="row mb-3">
                        <label for="cabang_id" class="form-label">Cabang</label>
                        <input type="text" id="cabang_id" class="form-control" value="{{ $sparepart->nama_cabang }}"
                            disabled>
                    </div>
                    <div class="row mb-3">
                        <label for="machine_id" class="form-label">Mesin</label>
                        <input type="text" id="machine_id" class="form-control" value="{{ $sparepart->nama_mesin }}"
                            disabled>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" class="form-control" value="{{ $sparepart->nama_mesin }}"
                            disabled>
                    </div>
                    <div class="row mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" id="harga" class="form-control" value="{{ $sparepart->harga }}"
                            disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="Update{{ $sparepart->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('sparepart.update', [$sparepart->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Update Data Sparepart</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="cabang_id" class="form-label">Cabang</label>
                            <select name="cabang_id" id="cabang_id" class="form-control" required>
                                <option value="">== Pilih Cabang ==</option>
                                @foreach ($cabangs as $cabang)
                                    <option value="{{ $cabang->id }}"
                                        @if ($cabang->id == $sparepart->cabang_id) selected @endif>
                                        {{ $cabang->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="machine_id" class="form-label">Mesin</label>
                            <select name="machine_id" id="machine_id" class="form-control" required>
                                <option value="">== Pilih Mesin ==</option>
                                @foreach ($machines as $machine)
                                    <option value="{{ $machine->id }}"
                                        @if ($machine->id == $sparepart->machine_id) selected @endif>
                                        {{ $machine->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control"
                                value="{{ $sparepart->nama }}" required>
                        </div>
                        <div class="row mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" id="harga" name="harga" class="form-control"
                                value="{{ $sparepart->harga }}">
                        </div>
                        <div class="row mb-3">
                            <label for="photo" class="form-label">Foto</label>
                            <input type="file" id="photo" name="photo" class="form-control"
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
