<table>
    <thead>
        <tr>
            <th colspan="16" style="text-align: center; font-weight: bold; font-size: 14px;">
                DAFTAR: UNIT PEMUKIMAN TRANSMIGRASI / DESA TRANSMIGRASI<br>
                YANG DISERAHKAN KE PEMERINTAH DAERAH
            </th>
        </tr>
        <tr>
            <th colspan="16"></th> </tr>

        <tr>
            <th rowspan="2" style="font-weight: bold; text-align: center; border: 1px solid #000;">NO</th>
            <th rowspan="2" style="font-weight: bold; text-align: center; border: 1px solid #000;">TAHUN PENYERAHAN</th>
            <th rowspan="2" style="font-weight: bold; text-align: center; border: 1px solid #000;">KABUPATEN</th>
            <th rowspan="2" style="font-weight: bold; text-align: center; border: 1px solid #000;">KECAMATAN</th>
            <th rowspan="2" style="font-weight: bold; text-align: center; border: 1px solid #000;">UPT/DESA TRANS</th>
            <th rowspan="2" style="font-weight: bold; text-align: center; border: 1px solid #000;">BULAN/TAHUN PENEMPATAN</th>
            <th colspan="2" style="font-weight: bold; text-align: center; border: 1px solid #000;">JUMLAH</th>
            <th colspan="2" style="font-weight: bold; text-align: center; border: 1px solid #000;">STATUS DESA</th>
            <th colspan="3" style="font-weight: bold; text-align: center; border: 1px solid #000;">DESA BARU</th>
            <th rowspan="2" style="font-weight: bold; text-align: center; border: 1px solid #000;">BERITA ACARA PENYERAHAN</th>
            <th rowspan="2" style="font-weight: bold; text-align: center; border: 1px solid #000;">POLA</th>
            <th rowspan="2" style="font-weight: bold; text-align: center; border: 1px solid #000;">PERMASALAHAN</th>
        </tr>
        <tr>
            <th style="font-weight: bold; text-align: center; border: 1px solid #000;">KK</th>
            <th style="font-weight: bold; text-align: center; border: 1px solid #000;">JIWA</th>
            <th style="font-weight: bold; text-align: center; border: 1px solid #000;">SEM</th>
            <th style="font-weight: bold; text-align: center; border: 1px solid #000;">DEF</th>
            <th style="font-weight: bold; text-align: center; border: 1px solid #000;">NAMA</th>
            <th style="font-weight: bold; text-align: center; border: 1px solid #000;">KK</th>
            <th style="font-weight: bold; text-align: center; border: 1px solid #000;">JIWA</th>
        </tr>
    </thead>
    <tbody>
        @php 
            $total_kk_awal = 0; $total_jiwa_awal = 0;
            $total_kk_baru = 0; $total_jiwa_baru = 0;
        @endphp

        @foreach($uptds as $i => $u)
            @php
                $total_kk_awal += $u->kk_awal; $total_jiwa_awal += $u->jiwa_awal;
                $total_kk_baru += $u->kk_baru; $total_jiwa_baru += $u->jiwa_baru;
            @endphp
            <tr>
                <td style="border: 1px solid #000; text-align: center;">{{ $i + 1 }}</td>
                <td style="border: 1px solid #000; text-align: center;">{{ $u->tahun_penyerahan }}</td>
                <td style="border: 1px solid #000;">{{ $u->kabupaten->nama_kabupaten ?? '-' }}</td>
                <td style="border: 1px solid #000;">{{ $u->kecamatan->nama_kecamatan ?? '-' }}</td>
                <td style="border: 1px solid #000;">{{ $u->nama_upt }}</td>
                <td style="border: 1px solid #000; text-align: center;">{{ $u->waktu_penempatan }}</td>
                
                <td style="border: 1px solid #000; text-align: center;">{{ $u->kk_awal }}</td>
                <td style="border: 1px solid #000; text-align: center;">{{ $u->jiwa_awal }}</td>
                
                <td style="border: 1px solid #000; text-align: center;">{{ $u->status_desa == 'SEM' ? 'V' : '' }}</td>
                <td style="border: 1px solid #000; text-align: center;">{{ $u->status_desa == 'DEF' ? 'V' : '' }}</td>
                
                <td style="border: 1px solid #000;">{{ $u->nama_desa_baru }}</td>
                <td style="border: 1px solid #000; text-align: center;">{{ $u->kk_baru }}</td>
                <td style="border: 1px solid #000; text-align: center;">{{ $u->jiwa_baru }}</td>
                
                <td style="border: 1px solid #000;">{{ $u->no_ba_penyerahan }}</td>
                <td style="border: 1px solid #000;">{{ $u->pola ?? '-' }}</td>
                <td style="border: 1px solid #000;">{{ $u->permasalahan ?? '-' }}</td>
            </tr>
        @endforeach

        <tr>
            <td colspan="6" style="border: 1px solid #000; text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="border: 1px solid #000; text-align: center; font-weight: bold;">{{ $total_kk_awal }}</td>
            <td style="border: 1px solid #000; text-align: center; font-weight: bold;">{{ $total_jiwa_awal }}</td>
            <td colspan="3" style="border: 1px solid #000;"></td>
            <td style="border: 1px solid #000; text-align: center; font-weight: bold;">{{ $total_kk_baru }}</td>
            <td style="border: 1px solid #000; text-align: center; font-weight: bold;">{{ $total_jiwa_baru }}</td>
            <td colspan="3" style="border: 1px solid #000;"></td>
        </tr>
    </tbody>
</table>