@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
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
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-export">
                                        <i class="fas fa-file-export"></i> Export
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Invoice ID</th>
                                                <th>Peminjam</th>
                                                <th>Waktu</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tenggat Pengembalian</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Looping Peminjaman --}}
                                            @foreach ($pinjam as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->invoice }}</td>
                                                    <td>
                                                        <a href="{{ route('user.show', $item->user->slug) }}">{{ $item->user->name }}</a>
                                                    </td>
                                                    <td>{{ $item->created_at->format('j-n-Y') }}</td>
                                                    <td>{{ $item->tgl_pinjam ?? '-' }}</td>
                                                    <td>{{ $item->tenggat ?? '-' }}</td>
                                                    <td>{{ $item->tgl_kembali ?? '-' }}</td>
                                                    <td>
                                                        @switch($item->status)
                                                            @case('0')
                                                                <div class="badge badge-warning">Dipesan</div>
                                                                @break
                                                            @case('1')
                                                                <div class="badge badge-info">Dipinjam</div>
                                                                @break
                                                            @case('2')
                                                                <div class="badge badge-success">Dikembalikan</div>
                                                                @break
                                                            @default
                                                        @endswitch
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('peminjaman.show', $item->invoice) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Lihat Data">Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
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
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-export">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Export Data Peminjaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('peminjaman.export') }}" method="GET">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="status">Filter Status Peminjaman</label>
                            <select name="status" id="status" class="form-control selectric">
                                <option value="all" selected>Semua</option>
                                <option value="0">Dipesan</option>
                                <option value="1">Dipinjam</option>
                                <option value="2">Dikembalikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Export</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection
