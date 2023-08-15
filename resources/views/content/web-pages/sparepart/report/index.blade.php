@extends('layouts/contentNavbarLayout')

@section('title', 'Report')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <a href="{{ route('sparepart.index') }}"><i class="menu-icon tf-icons bx bx-arrow-back"></i></a><span
            class="text-muted fw-light ml-3">Detail
            Sparepart</span>
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
            <h6 class="card-subtitle text-muted">
                <a href="#" class="mx-2 my-2 btn btn-primary" data-toggle="modal" data-target="#Insert">
                    <i class="menu-icon tf-icons bx bx-edit"></i> Tambah Riwayat
                </a>
            </h6>
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
                                <a href="#" class="mx-2 text-primary" data-toggle="modal"
                                    data-target="#Update{{ $riwayat->id }}">
                                    <i class="menu-icon tf-icons bx bx-edit"></i>
                                </a>
                                {{-- <a href="#" class="mx-2 text-warning">
                                    <i class="menu-icon tf-icons bx bx-show"></i>
                                </a> --}}
                                <a href="#" class="mx-2 text-danger" data-toggle="modal"
                                    data-target="#Delete{{ $riwayat->id }}">
                                    <i class="menu-icon tf-icons bx bx-minus-circle"></i>
                                </a>
                            </td>
                        </tr>

                        @include('content.web-pages.sparepart.report.modal')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="Insert" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form class="modal-content" action="{{ route('report_post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Tambah Data Sparepart</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <input type="hidden" name="spareparts_id" value="{{ $detail->id }}">
                        <div class="row mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" id="judul" name="judul" class="form-control">
                        </div>
                        <div class="row mb-3">
                            <label for="desc" class="form-label">Deskripsi</label>
                            <input type="text" id="desc" name="desc" class="form-control">
                            {{-- <div id="editor"></div> --}}
                            {{-- <textarea name="desc" id="ckeditor desc" class="form-control" cols="30" rows="10"></textarea> --}}
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
@endsection
