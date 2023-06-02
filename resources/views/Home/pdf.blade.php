<!DOCTYPE html>
<html>

<head>
    <title>Hi</title>
</head>

<body>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            border: 1px solid black;
        }
    </style>
    <h1>Pesona Desa</h1>
    <p>Nama : {{ $tiket->nama_pemesan }}</p>
    <p>Email : {{ $user->email }}</p>
    <p>Telp : {{ $user->phone }}</p>
    <br>
    <p>Tanggal Kunjungan : {{ $tiket->tanggal_kunjungan }}</p>
    <table>
        <thead>
            <tr>
                <th>Nama Wisata</th>
                <th>Jumlah Tiket</th>
                <th>Harga Tiket</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $destinasi->nama_destinasi }}</td>
                <td>{{ $tiket->jumlah_tiket }}</td>
                <td>Rp. {{ $destinasi->htm_destinasi }}</td>
                <td>Rp. {{ $destinasi->htm_destinasi * $tiket->jumlah_tiket }}</td>
            </tr>
        </tbody>
    </table>
    <h2 style="text-align: center">ITEM YANG SUDAH DIBELI, UANG TIDAK DAPAT DIKEMBALIKAN .</h2>
</body>

</html>
