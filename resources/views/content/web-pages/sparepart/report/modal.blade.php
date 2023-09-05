<div class="modal fade" id="Delete{{ $riwayat->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Hapus Riwayat</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('report_delete', [$riwayat->id]) }}" method="POST">
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


<div class="modal fade" id="Update{{ $riwayat->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('report_update', [$riwayat->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Update Data</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <input type="hidden" name="id" value="{{ $riwayat->id }}">
                        <input type="hidden" name="user_id" value="{{ $riwayat->user_id }}">
                        <input type="hidden" name="cabang_id" value="{{ $riwayat->cabang_id }}">
                        <input type="hidden" name="machine_id" value="{{ $riwayat->machine_id }}">
                        <input type="hidden" name="spareparts_id" value="{{ $riwayat->spareparts_id }}">
                        <div class="row mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" id="judul" name="judul" class="form-control"
                                value="{{ $riwayat->judul }}">
                        </div>
                        <div class="row mb-3">
                            <label for="desc" class="form-label">Deskripsi</label>
                            <input type="text" id="desc" name="desc" class="form-control"
                                value="{{ $riwayat->desc }}">
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


<div class="modal fade" id="Show{{ $riwayat->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Detail Riwayat</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <div class="row mb-3 justify-content-center">
                        <label for="photo" class="form-label">Foto</label>
                        <img src="{{ asset('file/report') }}/foto/{{ $riwayat->foto }}"
                            class="justify-content-center" style="width: 500px" data-lightbox="zoomA"
                            data-title="{{ $riwayat->foto }}" />
                    </div>

                    <div class="row mb-3">
                        <label for="cabang_id" class="form-label">Pelapor</label>
                        <input type="text" id="cabang_id" class="form-control" value="{{ $riwayat->nama_user }}"
                            disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
