@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="#">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Perpustakaan</div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $title }}</h4>
                                <div class="card-header-action">
                                    <a href="#" class="btn btn-primary" data-toggle="tooltip" title="Buat Peminjaman">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <a href="#" class="btn btn-success" data-toggle="tooltip" title="Lihat Koleksi">
                                        <i class="fas fa-bookmark"></i>
                                    </a>
                                    <a href="#" class="btn btn-success" data-toggle="tooltip" title="Cari Buku">
                                        <i class="fas fa-book"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Invoice ID</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tenggat Pengembalian</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Looping Peminjaman --}}
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <div class="badge badge-warning">Dipesan</div>
                                                        <div class="badge badge-info">Dipinjam</div>
                                                        <div class="badge badge-success">Dikembalikan</div>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-info" data-toggle="tooltip" title="Lihat Data">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                            <a href="#" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit Data">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                    </td>
                                                </tr>
                                            {{-- End Looping Peminjaman --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection
