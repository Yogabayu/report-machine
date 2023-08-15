@extends('layouts/contentNavbarLayout')

@section('title', 'Cabang')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Sparepart</span>
    </h4>

    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Semua Sparepart </h5>
        <h6 class="card-subtitle text-muted">
            <a href="#" class="mx-2 my-2 btn btn-primary" data-toggle="modal" data-target="#Insert">
                <i class="menu-icon tf-icons bx bx-edit"></i> Tambah Sparepart
            </a>
        </h6>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover zero-configuration">
                <thead>
                    <tr class="text-nowrap">
                        <th>No</th>
                        <th>Cabang</th>
                        <th>Mesin</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($spareparts as $sparepart)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $sparepart->nama_cabang }}</td>
                            <td>{{ $sparepart->nama_mesin }}</td>
                            <td>{{ $sparepart->nama }}</td>
                            <td>Rp. {{ number_format($sparepart->harga, 0, ',', '.') }}</td>
                            <td>
                                <a href="#" class="mx-2 text-primary" data-toggle="modal"
                                    data-target="#Update{{ $sparepart->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Edit detail sparepart">
                                    <i class="menu-icon tf-icons bx bx-edit"></i>
                                </a>
                                <a href="#" class="mx-2 text-warning" data-toggle="modal"
                                    data-target="#Show{{ $sparepart->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Lihat detail sparepart">
                                    <i class="menu-icon tf-icons bx bx-show"></i>
                                </a>
                                <a href="#" class="mx-2 text-danger" data-toggle="modal"
                                    data-target="#Delete{{ $sparepart->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Hapus sparepart">
                                    <i class="menu-icon tf-icons bx bx-minus-circle"></i>
                                </a>
                            </td>
                            @include('content.web-pages.sparepart.modal')
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="Insert" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form class="modal-content" action="{{ route('sparepart.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Tambah Data Sparepart</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="cabang_id" class="form-label">Cabang</label>
                            <select name="cabang_id" id="cabang_id_index" class="form-control" required>
                                <option value="">== Pilih Cabang ==</option>
                                @foreach ($cabangs as $cabang)
                                    <option value="{{ $cabang->id }}">{{ $cabang->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="machine_id" class="form-label">Mesin</label>
                            <select name="machine_id" id="machine_id_index" class="form-control" required>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control">
                        </div>
                        <div class="row mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" id="harga" name="harga" class="form-control">
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
            </form>
        </div>
    </div>
    <!--/ Responsive Table -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var allMachine = @json($machines);

            //index
            var cabangSelect_index = document.getElementById('cabang_id_index');
            var machineSelect_index = document.getElementById('machine_id_index');

            cabangSelect_index.addEventListener('change', function() {
                var selectedCabangId_index = cabangSelect_index.value;

                machineSelect_index.innerHTML = '<option value="">== Pilih ==</option>';
                allMachine.forEach(function(machine_index) {
                    if (machine_index.cabang_id == selectedCabangId_index) {
                        var option = document.createElement('option');
                        option.value = machine_index.id;
                        option.textContent = machine_index.nama;
                        machineSelect_index.appendChild(option);
                    }
                });
            });

            //modal
            var cabangSelect = document.getElementById('cabang_id');
            var machineSelect = document.getElementById('machine_id');

            cabangSelect.addEventListener('change', function() {
                var selectedCabangId = cabangSelect.value;

                machineSelect.innerHTML = '<option value="">== Pilih ==</option>';
                allMachine.forEach(function(machine) {
                    if (machine.cabang_id == selectedCabangId) {
                        var option = document.createElement('option');
                        option.value = machine.id;
                        option.textContent = machine.nama;
                        machineSelect.appendChild(option);
                    }
                });
            });
        });
    </script>

@endsection
