@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="#" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="#">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Perpustakaan</div>
                    <div class="breadcrumb-item active">
                        <a href="#">Peminjaman</a>
                    </div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $title }}</h4>
                            </div>
                            <form action="#" method="POST" class="needs-validation" novalidate>
                                <div class="card-body">
                                    {{-- Error Here --}}
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="peminjam">Nama Peminjam</label>
                                            <input type="text" name="peminjam" id="peminjam" class="form-control" value="" required readonly>
                                        </div>
                                    </div>
                                    <div class="section-title">Buku yang dipinjam</div>
                                    <div class="row">
                                        {{-- Looping Detail Peminjaman --}}
                                            <div class="form-group col-lg-6">
                                                <label for="buku">Judul Buku</label>
                                                <select name="buku[]" id="buku" class="form-control select2">
                                                    {{-- Looping Buku --}}
                                                        <option value="" selected>Buku</option>
                                                    {{-- End Looping Buku --}}
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="jumlah">Jumlah Pinjam</label>
                                                <input type="number" name="jumlah[]" id="jumlah" class="form-control" value="">
                                            </div>
                                        {{-- Looping Detail Peminjaman --}}
                                        <div class="form-group col-12">
                                            <label for="buku">Tambahkan buku lainnya</label>
                                            <select name="buku[]" id="buku" class="form-control select2" multiple>
                                                {{-- Looping Buku --}}
                                                    <option value="">Buku</option>
                                                {{-- End Looping Buku --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-whitesmoke text-right">
                                    <button type="submit" class="btn btn-primary">Edit Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
@endsection
