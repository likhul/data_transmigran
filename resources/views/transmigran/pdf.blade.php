<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Transmigran</title>
    <style>
        body { font-family: 'Helvetica', Arial, sans-serif; font-size: 10pt; color: #333; line-height: 1.5; }
        .kop-surat { text-align: center; border-bottom: 3px double #000; padding-bottom: 10px; margin-bottom: 20px; }
        .kop-surat h2 { margin: 0; font-size: 16pt; text-transform: uppercase; }
        .kop-surat p { margin: 2px 0; font-size: 9pt; color: #666; }
        
        .judul-laporan { text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12pt; margin-bottom: 20px; text-decoration: underline; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table th { background-color: #f1f5f9; color: #475569; padding: 10px 5px; border: 1px solid #cbd5e1; font-size: 8pt; text-transform: uppercase; }
        table td { border: 1px solid #cbd5e1; padding: 8px 5px; vertical-align: middle; }
        
        .badge-status { padding: 3px 6px; border-radius: 4px; font-size: 7pt; font-weight: bold; }
        .text-center { text-align: center; }
        
        .footer { margin-top: 40px; }
        .ttd { float: right; width: 200px; text-align: center; }
    </style>
</head>
<body>
    <div class="kop-surat">
        <h2>Pemerintah Provinsi Jambi</h2>
        <h2>Dinas Tenaga Kerja dan Transmigrasi</h2>
        <p>Alamat: Jl. Gatot Subroto No. 123, Jambi | Email: disnakertrans@jambiprov.go.id</p>
    </div>

    <div class="judul-laporan">Laporan Rekapitulasi Data Transmigran</div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Kepala Keluarga</th>
                <th width="15%">Asal Daerah</th>
                <th width="25%">Lokasi Penempatan</th>
                <th width="10%">Tahun</th>
                <th width="10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transmigrans as $index => $item)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>
                    <strong>{{ $item->nama_kepala_keluarga }}</strong><br>
                    <small>{{ $item->jumlah_anggota }} Jiwa</small>
                </td>
                <td>{{ $item->asal_daerah }}</td>
                <td>
                    {{ $item->kabupaten->nama_kabupaten ?? '-' }}<br>
                    <small>UPTD: {{ $item->uptd->nama_uptd ?? 'Umum' }}</small>
                </td>
                <td class="text-center">{{ $item->tahun_penempatan }}</td>
                <td class="text-center">
                    <span class="badge-status">{{ $item->status }}</span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Data tidak ditemukan sesuai filter.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <div class="ttd">
            <p>Jambi, {{ date('d F Y') }}</p>
            <p>Petugas Administrasi,</p>
            <br><br><br>
            <p><strong>( ____________________ )</strong></p>
            <p>NIP. .........................</p>
        </div>
    </div>
</body>
</html>