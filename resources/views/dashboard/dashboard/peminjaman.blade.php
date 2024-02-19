<div class="row">
    <div class="col-12">
        {{-- Admin --}}
            <div class="card">
                <div class="card-header">
                    <h4>Peminjaman</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary">Lihat semua <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Invoice ID</th>
                                <th>Peminjam</th>
                                <th>Waktu</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tenggat</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            {{-- Looping Peminjaman --}}
                                <tr>
                                    <td></td>
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
                                        <a href="#" class="btn btn-sm btn-info">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8" class="text-center">Belum ada data :(</td>
                                </tr>
                            {{-- End Looping Peminjaman --}}
                        </table>
                    </div>
                </div>
            </div>
        {{-- End Admin --}}
        {{-- Pembaca --}}
            <div class="card">
                <div class="card-header">
                    <h4>Peminjaman</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary">Lihat semua <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Invoice ID</th>
                                <th>Waktu</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tenggat</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
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
                                        <a href="#" class="btn btn-sm btn-info">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada data :(</td>
                                </tr>
                            {{-- End Looping Peminjaman --}}
                        </table>
                    </div>
                </div>
            </div>
        {{-- End Pembaca --}}
    </div>
</div>
