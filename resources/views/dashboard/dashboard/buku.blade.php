<div class="col-lg-6">
    {{-- Admin --}}
        <div class="card">
            <div class="card-header">
                <h4>Buku</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-primary">Lihat semua <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <tr>
                            <th>Judul Buku</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        {{-- Looping Buku --}}
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="badge badge-danger/success">
                                        Kosong/Tersedia
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data :(</td>
                            </tr>
                        {{-- End Looping Buku --}}
                    </table>
                </div>
            </div>
        </div>
    {{-- End Admin --}}
    {{-- Pembaca --}}
        <div class="card">
            <div class="card-header">
                <h4>Koleksi</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-primary">Lihat semua <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <tr>
                            <th>Judul Buku</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                        {{-- Looping Koleksi --}}
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-center">Belum ada data :(</td>
                            </tr>
                        {{-- End Looping Koleksi --}}
                    </table>
                </div>
            </div>
        </div>
    {{-- End Pembaca --}}
</div>