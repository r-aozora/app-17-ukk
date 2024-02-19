@extends('layouts.app')

@section('link')
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
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    <h2>Invoice</h2>
                                    <div class="invoice-number">123</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Peminjam:</strong><br>
                                            Nama<br>
                                            Username<br>
                                            Alamat
                                        </address>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Kontak Peminjam:</strong><br>
                                            Email<br>
                                            Telepon
                                        </address>
                                        <address>
                                            <strong>Waktu:</strong><br>
                                            Created_at
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="section-title">Buku yang dipinjam</div>
                                <p class="section-lead">Pastikan buku yang kamu pinjam sesuai sebelum datang ke perpustakaan.</p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-md">
                                        <tr>
                                            <th data-width="40">No</th>
                                            <th>Sampul Buku</th>
                                            <th class="text-center">Judul Buku</th>
                                            <th class="text-center">Kategori</th>
                                            <th class="text-right">Jumlah Pinjam</th>
                                        </tr>
                                        {{-- Looping Detail --}}
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <img src="{{ asset('images/buku.png') }}" alt="" height="100">
                                                </td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-right"></td>
                                            </tr>
                                        {{-- End Looping Detail --}}
                                    </table>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <div class="section-title">Deskripsi</div>
                                        <p class="section-lead">Silakan datang ke perpustakaan untuk mengambil buku agar status peminjaman dikonfirmasi.</p>
                                        <div class="images">
                                            <h4><span class="badge badge-warning">Dipesan</span></h4>
                                            <h4><span class="badge badge-info">Dipinjam</div></h4>
                                            <h4><span class="badge badge-success">Dikembalikan</span></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Tanggal Peminjaman</div>
                                            <div class="invoice-detail-value">tgl_pinjam</div>
                                        </div>
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Tenggat Pengembalian</div>
                                            <div class="invoice-detail-value">tenggat</div>
                                        </div>
                                        <hr class="mt-2 mb-2">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Tanggal Pengembalian</div>
                                            <div class="invoice-detail-value invoice-detail-value-lg">tgl_kembali</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-md-right">
                        <a href="" class="btn btn-warning btn-icon icon-left">
                            <i class="fas fa-pen"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
@endsection
