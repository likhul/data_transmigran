<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data UPTD</title>
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
        <h2>Laporan Data UPTD (Unit Permukiman Transmigrasi)</h2>
        <p>Provinsi Jambi | Dicetak pada: {{ date('d-m-Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 25%;">Nama UPTD</th>
                <th style="width: 20%;">Kabupaten</th>
                <th style="width: 10%;">Tahun</th>
                <th style="width: 15%;">Kapasitas</th>
                <th style="width: 25%;">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($uptds as $u)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $u->nama_uptd }}</td>
                <td>{{ $u->kabupaten->nama_kabupaten ?? '-' }}</td>
                <td class="text-center">{{ $u->tahun }}</td>
                <td class="text-center">{{ $u->kapasitas_kk ? $u->kapasitas_kk . ' KK' : '-' }}</td>
                <td>{{ $u->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>