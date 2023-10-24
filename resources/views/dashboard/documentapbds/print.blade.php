<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Printing</title>
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css"/>
<style>
    @page { size: A4 }
    body{
        font-family: Calibri;
    }
    .rapat {
        line-height: 0;
    }
    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }
  
    table {
        border-collapse: collapse;
        width: 100%;
    }
  
    .table th {
        font-size: 11pt;
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
    }
  
    .table td {
        font-size: 11pt;
        padding: 3px 3px;
        border:1px solid #000000;
    }
  
    .text-center {
        text-align: center;
    }
    .text-left {
        text-align: left;
    }
    .text-right {
        text-align: right;
    }
    .float-left {
        float: left;
    }
    .float-right {
        float: right;
    }
    .kecil {
        font-size: 11pt;
    }
    .text-align {
        text-align: justify;
    }
    div {
        height: 125px;
        width: 35%;
    }
    .margin-left {
        margin-left: 50px;
    }
    .margin-right {
        margin-right: 50px;
    }
    .margin-top {
        margin-top: 150px;
    }
</style>
</head>
<body class="A4" onload="window.print();">
    <section class="sheet padding-10mm">
        <p class="text-center rapat"><strong>DOKUMEN KELENGKAPAN TATA CARA EVALUASI</strong></p>
        <p class="text-center rapat"><strong>RANPERDA TENTANG APBD dan RANOERKADA TENTANG PENJABARAN APBD</strong></p>

        <p class="text-left float-left rapat"><strong>KABUPATEN/KOTA : {{ $keputusan->users->name }}</strong></p>
        <p class="text-right float-right rapat"><strong>TAHUN ANGGARAN : {{ $keputusan->tahun }}</strong></p>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 3%;">No.</th>
                    <th style="width: 77%;">Dokumen</th>
                    <th style="width: 5%;">Ada</th>
                    <th style="width: 5%;">Tidak Ada</th>
                    <th style="width: 10%;">Ket</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                <tr>
                    <td class="text-center">{{ $document->nomor }}</td>
                    <td>{{ $document->name }}</td>
                    @if ($document->files != null)
                    <td class="text-center">&#10004;</td>
                    <td class="text-center">&nbsp;</td>
                    @else
                    <td class="text-center">&nbsp;</td>
                    <td class="text-center">&nbsp;</td>
                    @endif
                    <td>{{ $document->keterangan }}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        <p class="kecil text-align">&emsp;&emsp;&emsp;Dengan diterimanya Surat Saudara Nomor .............................. tanggal .............................. Perihal Permohonan Evaluasi Rancangan Perda tentang APBD dan Rancangan Peraturan Kepala Daerah tentang Penjabaran APBD Tahun Anggaran 2022 Kepada Gubernur Sumatera Utara yang diterima pada hari  .............................. tanggal .............................. <strong>dapat/tidak dapat</strong> diproses sesuai dengan ketentuan yang berlaku. Untuk itu agar dilampiri dengan kelengkapan berkas tersebut diatas dalam waktu yang tidak terlalu lama.</p>

        <p class="kecil">&emsp;&emsp;&emsp;Demikian untuk maklum.</p>
        <div class="float-left margin-left">
            <p class="text-center kecil">yang menerima</p>
            <br>
            <br>
            <p class="text-center kecil">(&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;)</p>
        </div>
        <div class="float-right margin-right">
            <p class="text-center kecil rapat">yang menyerahkan</p>
            <br>
            <br>
            <p class="text-center kecil">(&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;)</p>
        </div>
        <p class="text-center kecil margin-top rapat"><strong>Mengetahui,</strong></p>
        <p class="text-center kecil rapat">Kasubbid Bina Keuangan</p>
        <p class="text-center kecil rapat">Bidang bina Keuangan Daerah Kabupaten/Kota</p>
        <p class="text-center kecil rapat">BPKAD Provsu</p>
        <br>
        <br>
        <br>
        <p class="text-center kecil rapat"><strong>{{ auth()->user()->name }}</strong></p>
        <p class="text-center kecil rapat"><strong>NIP. {{ auth()->user()->nip }}</strong></p>
    </section>
</body>
</html>