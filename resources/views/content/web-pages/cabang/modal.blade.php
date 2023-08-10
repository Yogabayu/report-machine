<div class="modal fade" id="Delete{{ $cabang->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Hapus Cabang</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
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
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Update Cabang</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
        </div>
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
                        <input type="text" id="city" class="form-control" value="{{ $cabang->city }}" disabled>
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
                        <input type="text" id="nama" class="form-control" value="{{ $cabang->nama }}" disabled>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" id="alamat" class="form-control" value="{{ $cabang->alamat }}"
                            disabled>
                    </div>
                    <div class="row mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="text" id="alamat" class="form-control" value="{{ $cabang->foto }}"
                            disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
