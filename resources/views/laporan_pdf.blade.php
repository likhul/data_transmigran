<!DOCTYPE html>
<html>
<head>
    <title>Laporan PDF</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .footer { margin-top: 30px; text-align: right; }
    </style>
</head>
<body>

    <div class="header">
        <h2>DISNAKERTRANS PROVINSI JAMBI</h2>
        <h3>{{ $judul }}</h3>
        <p>Tanggal Cetak: {{ $tanggal }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kepala Keluarga</th>
                <th>Jumlah Anggota</th>
                <th>Asal Daerah</th>
                <th>Kabupaten</th>
                <th>Tahun</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transmigrans as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_kepala_keluarga }}</td>
                <td>{{ $item->jumlah_anggota }}</td>
                <td>{{ $item->asal_daerah }}</td>
                <td>{{ $item->kabupaten->nama_kabupaten }}</td>
                <td>{{ $item->tahun_penempatan }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Jambi, {{ date('d F Y') }}</p>
        <br><br><br>
        <p>(.........................................)</p>
        <p>Admin Sistem</p>
    </div>

</body>
</html>