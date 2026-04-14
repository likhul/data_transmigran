<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cetak Laporan UPTD</title>
    <style>
        /* Pengaturan Kertas dan Margin */
        @page { margin: 20px; }
        body { 
            font-family: Arial, Helvetica, sans-serif; 
            font-size: 8px; /* Diperkecil agar 14 kolom muat di A4 */
            color: #000;
        }
        
        /* Judul Laporan */
        .judul { 
            text-align: center; 
            font-weight: bold; 
            font-size: 11px; 
            margin-bottom: 15px; 
            line-height: 1.3;
        }

        /* Tabel Utama */
        table { 
            width: 100%; 
            border-collapse: collapse; 
        }
        th, td { 
            border: 1px solid black; 
            padding: 4px; 
            text-align: center; 
            vertical-align: middle; 
            word-wrap: break-word;
        }
        
        /* Pewarnaan Header seperti dokumen negara */
        th { background-color: #e5e7eb; font-weight: bold; }
        
        /* Custom Alignment untuk teks panjang */
        .text-left { text-align: left; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        
        /* Footer Tabel untuk Jumlah */
        .row-jumlah td { font-weight: bold; }
    </style>
</head>
<body>

    <div class="judul">
        DAFTAR: UNIT PEMUKIMAN TRANSMIGRASI / DESA TRANSMIGRASI<br>
        YANG DISERAHKAN KE PEMERINTAH DAERAH
    </div>

    <table>
        <thead>
            <tr>
                <th rowspan="2" width="2%">NO</th>
                <th rowspan="2" width="5%">TAHUN<br>PENYERAHAN</th>
                <th rowspan="2" width="8%">KABUPATEN</th>
                <th rowspan="2" width="8%">KECAMATAN</th>
                <th rowspan="2" width="9%">UPT/<br>DESA TRANS</th>
                <th rowspan="2" width="7%">BULAN/TAHUN<br>PENEMPATAN</th>
                <th colspan="2">JUMLAH</th>
                <th colspan="2">STATUS DESA</th>
                <th colspan="3">DESA BARU</th>
                <th rowspan="2" width="9%">BERITA ACARA<br>PENYERAHAN</th>
                <th rowspan="2" width="3%">POLA</th>
                <th rowspan="2" width="10%">PERMASALAHAN</th>
            </tr>
            <tr>
                <th width="4%">KK</th>
                <th width="4%">JIWA</th>
                <th width="3%">SEM</th>
                <th width="3%">DEF</th>
                <th width="8%">NAMA</th>
                <th width="4%">KK</th>
                <th width="4%">JIWA</th>
            </tr>
        </thead>
        <tbody>
            @php 
                // Deklarasi variabel untuk menghitung Total (JUMLAH) di paling bawah
                $total_kk_awal = 0;
                $total_jiwa_awal = 0;
                $total_kk_baru = 0;
                $total_jiwa_baru = 0;
            @endphp

            @foreach($uptds as $i => $u)
                @php
                    // Akumulasi penjumlahan
                    $total_kk_awal += $u->kk_awal;
                    $total_jiwa_awal += $u->jiwa_awal;
                    $total_kk_baru += $u->kk_baru;
                    $total_jiwa_baru += $u->jiwa_baru;
                @endphp
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $u->tahun_penyerahan }}</td>
                    <td class="text-left">{{ $u->kabupaten->nama_kabupaten ?? '-' }}</td>
                    <td class="text-left">{{ $u->kecamatan->nama_kecamatan ?? '-' }}</td>
                    <td class="text-left">{{ $u->nama_upt }}</td>
                    
                    <td>{{ $u->waktu_penempatan }}</td>
                    <td>{{ number_format($u->kk_awal, 0, ',', '.') }}</td>
                    <td>{{ number_format($u->jiwa_awal, 0, ',', '.') }}</td>
                    
                    <td>{{ $u->status_desa == 'SEM' ? 'V' : '' }}</td>
                    <td>{{ $u->status_desa == 'DEF' ? 'V' : '' }}</td>
                    
                    <td class="text-left">{{ $u->nama_desa_baru }}</td>
                    <td>{{ number_format($u->kk_baru, 0, ',', '.') }}</td>
                    <td>{{ number_format($u->jiwa_baru, 0, ',', '.') }}</td>
                    
                    <td class="text-left">{{ $u->no_ba_penyerahan }}</td>
                    <td>{{ $u->pola ?? '-' }}</td>
                    <td class="text-left">{{ $u->permasalahan ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="row-jumlah">
                <td colspan="6" class="text-center">JUMLAH</td>
                <td>{{ number_format($total_kk_awal, 0, ',', '.') }}</td>
                <td>{{ number_format($total_jiwa_awal, 0, ',', '.') }}</td>
                <td colspan="3" style="background-color: #f9fafb;"></td>
                <td>{{ number_format($total_kk_baru, 0, ',', '.') }}</td>
                <td>{{ number_format($total_jiwa_baru, 0, ',', '.') }}</td>
                <td colspan="3" style="background-color: #f9fafb;"></td>
            </tr>
        </tfoot>
    </table>

</body>
</html>