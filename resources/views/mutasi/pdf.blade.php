<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Mutasi</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h2 { margin: 0; padding: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #f8fafc; text-align: center; font-weight: bold; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Riwayat Mutasi Transmigran</h2>
        <p>Provinsi Jambi | Dicetak pada: {{ date('d-m-Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 25%;">Nama Kepala Keluarga</th>
                <th style="width: 15%;">Tanggal</th>
                <th style="width: 20%;">Jenis Mutasi</th>
                <th style="width: 35%;">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mutasis as $m)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $m->transmigran->nama_kepala_keluarga ?? '-' }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($m->tanggal_mutasi)->format('d-m-Y') }}</td>
                <td>{{ $m->jenis_mutasi }}</td>
                <td>{{ $m->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>