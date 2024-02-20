<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Invoice ID</th>
            <th>Peminjam</th>
            <th>Waktu</th>
            <th>Tanggal Pinjam</th>
            <th>Tenggat Pengembalian</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pinjam as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->invoice }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->created_at->format('j-n-Y') }}</td>
                <td>{{ $item->tgl_pinjam ?? '-' }}</td>
                <td>{{ $item->tenggat ?? '-' }}</td>
                <td>{{ $item->tgl_kembali ?? '-' }}</td>
                <td>
                    @switch($item->status)
                        @case('0')
                            Dipesan
                            @break
                        @case('1')
                            Dipinjam
                            @break
                        @case('2')
                            Dikembalikan
                            @break
                        @default
                    @endswitch
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
