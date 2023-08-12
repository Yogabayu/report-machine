@extends('layouts/contentNavbarLayout')

@section('title', 'Cabang')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Cabang</span>
    </h4>

    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Semua Cabang </h5>
        <h6 class="card-subtitle text-muted">
            <a href="#" class="mx-2 my-2 btn btn-primary" data-toggle="modal" data-target="#Insert">
                <i class="menu-icon tf-icons bx bx-edit"></i> Tambah Cabang
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
                        <th>Provinsi</th>
                        <th>Kota</th>
                        <th>Kecamatan</th>
                        <th>Desa</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($cabangs as $cabang)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $cabang->province }}</td>
                            <td>{{ $cabang->city }}</td>
                            <td>{{ $cabang->district }}</td>
                            <td>{{ $cabang->village }}</td>
                            <td>{{ $cabang->nama }}</td>
                            <td>{{ $cabang->alamat }}</td>
                            <td>
                                <a href="{{ route('cabang.edit', ['cabang' => $cabang->id]) }}" class="mx-2 text-primary"
                                    data-toggle="modal" data-target="#Update{{ $cabang->id }}">
                                    <i class="menu-icon tf-icons bx bx-edit"></i>
                                </a>
                                <a href="{{ route('cabang.show', ['cabang' => $cabang->id]) }}" class="mx-2 text-warning"
                                    data-toggle="modal" data-target="#Show{{ $cabang->id }}">
                                    <i class="menu-icon tf-icons bx bx-show"></i>
                                </a>
                                <a href="{{ route('cabang.show', ['cabang' => $cabang->id]) }}" class="mx-2 text-danger"
                                    data-toggle="modal" data-target="#Delete{{ $cabang->id }}">
                                    <i class="menu-icon tf-icons bx bx-minus-circle"></i>
                                </a>
                            </td>
                            @include('content.web-pages.cabang.modal')
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="Insert" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form class="modal-content" action="{{ route('cabang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Tambah Data Cabang</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="provinsi_code" class="form-label">Provinsi</label>
                            <select name="provinsi_code" id="provinsi_code" class="form-control" required>
                                <option value="">== Pilih Provinsi ==</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->code }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row mb-3">
                            <label for="kota_code" class="form-label">Kota</label>
                            <select name="kota_code" id="kota_code" class="form-control" required>
                                <option value="">== Pilih Kota ==</option>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="kecamatan_code" class="form-label">Kecamatan</label>
                            <select name="kecamatan_code" id="kecamatan_code" class="form-control" required>
                                <option value="">== Pilih Kecamatan ==</option>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="desa_code" class="form-label">Desa</label>
                            <select name="desa_code" id="desa_code" class="form-control" required>
                                <option value="">== Pilih Desa ==</option>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control">
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control">
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
    <!--/ Responsive Table -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            var citiesByProvince = @json($cities);
            var districtByCity = @json($districts);
            var villageByDistrict = @json($village);

            var provinsiSelect = document.getElementById('provinsi_code');
            var kotaSelect = document.getElementById('kota_code');
            var kecamatanSelect = document.getElementById('kecamatan_code');
            var desaSelect = document.getElementById('desa_code');

            provinsiSelect.addEventListener('change', function() {
                var selectedProvinceId = provinsiSelect.value;

                kotaSelect.innerHTML = '<option value="">== Pilih Kota ==</option>';
                citiesByProvince.forEach(function(city) {
                    if (city.province_code == selectedProvinceId) {
                        var option = document.createElement('option');
                        option.value = city.code;
                        option.textContent = city.name;
                        kotaSelect.appendChild(option);
                    }
                });
            });

            kotaSelect.addEventListener('change', function() {
                var selectedCityId = kotaSelect.value;
                kecamatanSelect.innerHTML = '<option value="">== Pilih Kota ==</option>';
                districtByCity.forEach(function(district) {
                    if (district.city_code == selectedCityId) {
                        var option = document.createElement('option');
                        option.value = district.code;
                        option.textContent = district.name;
                        kecamatanSelect.appendChild(option);
                    }
                });
            });

            kecamatanSelect.addEventListener('change', function() {
                var selectedKecamatanId = kecamatanSelect.value;
                desaSelect.innerHTML = '<option value="">== Pilih Kota ==</option>';
                villageByDistrict.forEach(function(village) {
                    if (village.district_code == selectedKecamatanId) {
                        var option = document.createElement('option');
                        option.value = village.code;
                        option.textContent = village.name;
                        desaSelect.appendChild(option);
                    }
                });
            });
        });
    </script>

@endsection
