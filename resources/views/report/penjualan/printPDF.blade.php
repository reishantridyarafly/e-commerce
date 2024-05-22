<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h1>LAPORAN PENJUALAN</h1>
    <p>PERIODE {{ $period }}</p>

    <table>
        <tr>
            <th>Tanggal</th>
            <th>Produk</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Jumlah</th>
        </tr>
        @forelse ($items as $item)
            <tr>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}</td>
                <td>{{ $item->product->nama }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ 'Rp ' . number_format($item->product->harga_jual, 0, ',', '.') }}</td>
                <td>{{ 'Rp ' . number_format($item->product->harga_jual * $item->quantity, 0, ',', '.') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Data tidak tersedia</td>
            </tr>
        @endforelse
        <tr>
            <td colspan="4"><strong>Total</strong></td>
            <td colspan="1">
                <strong>{{ 'Rp ' . number_format($items->sum(fn($item) => $item->product->harga_jual * $item->quantity), 0, ',', '.') }}</strong>
            </td>
        </tr>
    </table>

</body>

</html>
