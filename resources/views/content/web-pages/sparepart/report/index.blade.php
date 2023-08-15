@extends('layouts/contentNavbarLayout')

@section('title', 'Report')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Detail Sparepart</span>
    </h4>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col justify-content-center">
                    <img src="{{ asset('file/sparepart') }}/foto/{{ $detail->photo }}" class="justify-content-center"
                        style="width: 300px" />
                </div>
                <div class="col table-responsive text-nowrap">
                    <table class="table">
                        <tr>
                            <td>Nama Cabang</td>
                            <td> : </td>
                            <td>{{ $detail->nama_cabang }}</td>
                        </tr>
                        <tr>
                            <td>Nama Mesin</td>
                            <td> : </td>
                            <td>{{ $detail->nama_mesin }}</td>
                        </tr>
                        <tr>
                            <td>Nama Sparepart</td>
                            <td> : </td>
                            <td>{{ $detail->nama }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-header">
            <h5>Riwayat</h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover zero-configuration">
                <thead>
                    <tr class="text-nowrap">
                        <th>No</th>
                        <th>Foto</th>
                        <th>Pelapor</th>
                        <th>Judul</th>
                        <th>Desc</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($riwayats as $riwayat)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ asset('file/report') }}/foto/{{ $riwayat->foto }}"
                                    class="justify-content-center" style="width: 100px" />
                            </td>
                            <td>
                                {{ $riwayat->nama_user }}
                            </td>
                            <td>
                                {{ $riwayat->judul }}
                            </td>
                            <td>
                                {{ $riwayat->desc }}
                            </td>
                            <td>
                                <a href="#" class="mx-2 text-primary">
                                    <i class="menu-icon tf-icons bx bx-edit"></i>
                                </a>
                                <a href="#" class="mx-2 text-warning">
                                    <i class="menu-icon tf-icons bx bx-show"></i>
                                </a>
                                <a href="#" class="mx-2 text-danger">
                                    <i class="menu-icon tf-icons bx bx-minus-circle"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
