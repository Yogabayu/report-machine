<div class="modal fade" id="Show{{ $machine->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Detail Mesin</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <div class="row mb-3 justify-content-center">
                        <label for="foto" class="form-label">Foto</label>
                        <img src="{{ asset('file/machine') }}/foto/{{ $machine->photo }}" class="justify-content-center"
                            style="width: 500px" />
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" class="form-control" value="{{ $machine->nama }}" disabled>
                    </div>

                    <div class="row mb-3">
                        <label for="cabang" class="form-label">Cabang</label>
                        <input type="text" id="cabang" class="form-control" value="{{ $machine->nama_cabang }}"
                            disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="Delete{{ $machine->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Hapus Mesin</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('machine.destroy', [$machine->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-body" style="max-height: 300px; overflow-y: auto;">
                        <p>
                            Apakah data ingin dihapus ?
                        </p>
                        <p class="text-danger">
                            Mesin yang dihapus tidak dapat dipulihkan (termasuk riwayat, dll)
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


<div class="modal fade" id="Update{{ $machine->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('machine.update', [$machine->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Update Data Mesin</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="cabang_id" class="form-label">Cabang</label>
                            <select name="cabang_id" id="cabang_id" class="form-control" required>
                                <option value="">== Pilih Cabang ==</option>
                                @foreach ($cabangs as $cabang)
                                    <option
                                        value="{{ $cabang->id }}"@if ($machine->cabang_id == $cabang->id) selected @else @endif>
                                        {{ $cabang->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control"
                                value="{{ $machine->nama }}">
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
