<div class="col-lg-6">
    {{-- Admin --}}
        <div class="card">
            <div class="card-header">
                <h4>Ulasan</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-primary">Lihat semua <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <tr>
                            <th>Dari</th>
                            <th>Untuk Buku</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                        {{-- Looping Ulasan --}}
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="badge badge-success">
                                        5 <i class="fas-fa-star"></i>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-info">Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data :(</td>
                            </tr>
                        {{-- End Looping Ulasan --}}
                    </table>
                </div>
            </div>
        </div>
    {{-- End Admin --}}
    {{-- Pembaca --}}
        <div class="card">
            <div class="card-header">
                <h4>Ulasan</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-primary">Lihat semua <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <tr>
                            <th>Untuk Buku</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                        {{-- Looping Ulasan --}}
                            <tr>
                                <td></td>
                                <td>
                                    <div class="badge badge-success">
                                        5 <i class="fas-fa-star"></i>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-info">Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-center">Belum ada data :(</td>
                            </tr>
                        {{-- End Looping Ulasan --}}
                    </table>
                </div>
            </div>
        </div>
    {{-- End Pembaca --}}
</div>