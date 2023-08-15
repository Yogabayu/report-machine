@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Website Settings</span>
    </h4>

    <div class="row">
        <div class="col-md-12">

            <div class="card mb-4">
                <h5 class="card-header">Setting</h5>
                <hr class="my-0">
                <div class="card-body">
                    <form action="{{ route('websetting.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <input type="hidden" name="id" id="id" value="{{ $site->id }}">

                            <div class="mb-3 col-md-6">
                                <label for="name_site" class="form-label">Nama Site</label>
                                <input class="form-control" type="text" name="name_site" id="name_site"
                                    value="{{ $site->name_site ?? '' }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="name_business" class="form-label" data-toggle="tooltip" data-placement="top"
                                    title="Untuk header di report PDF">Nama Bisnis </label>
                                <input class="form-control" type="text" name="name_business" id="name_business"
                                    value="{{ $site->name_business ?? '' }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label" data-toggle="tooltip" data-placement="top"
                                    title="Untuk header di report PDF">Alamat </label>
                                <input class="form-control" type="text" name="address" id="address"
                                    value="{{ $site->address ?? '' }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="tlp" class="form-label" data-toggle="tooltip" data-placement="top"
                                    title="Untuk header di report PDF">Telephone </label>
                                <input class="form-control" type="text" name="tlp" id="tlp"
                                    value="{{ $site->tlp ?? '' }}" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="logo" class="form-label">Logo</label>
                                <br>
                                @if ($site && $site->logo)
                                    <img src="{{ asset('file/site') }}/foto/{{ $site->logo }}" width="50%"
                                        class="img-fluid mb-3" />
                                @endif

                                <input type="file" id="logo" name="logo" class="form-control"
                                    accept="image/png, image/jpg, image/jpeg">
                            </div>
                        </div>
                        <div class="mt-2" style="display: flex; justify-content: flex-end">
                            <button type="submit" class="btn btn-primary me-2">
                                Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
