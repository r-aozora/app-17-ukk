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
                        <a href="#">Ulasan Buku</a>
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="section-title mt-0">Dari</div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <a href="#">
                                                <input type="text" id="username" class="form-control" value="" readonly>
                                            </a>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" id="name" class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="section-title mt-0">Untuk buku</div>
                                        <div class="form-group">
                                            <label for="judul">Judul Buku</label>
                                            <a href="#">
                                                <input type="text" id="judul" class="form-control" value="" readonly>
                                            </a>
                                        </div>
                                        <div class="section-title mt-0">Rating</div>
                                        <div class="form-group">
                                            <h3>
                                                <span class="badge badge-success/danger">
                                                    5 <i class="fas fa-star"></i>
                                                </span>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="section-title mt-0">Ulasan</div>
                                        <div class="form-group">
                                            <textarea id="ulasan" class="form-control" style="height: 250px" readonly></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-right">
                                <a href="#" class="btn btn-secondary">Kembali</a>
                                <a href="#" class="btn btn-danger" data-confirm-delete="true">
                                    Hapus Ulasan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
@endsection
