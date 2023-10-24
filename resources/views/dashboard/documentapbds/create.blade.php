@extends('dashboard.layouts.main')

@section('container')
<div class="col-md-8">
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Tambah Dokumen RANPERDA TENTANG APBD DAN RANPERKADA TENTANG PENJABARAN APBD</h5>
            <form method="post" action="/dashboard/documentapbds" enctype="multipart/form-data" class="">
                @csrf
                <div class="position-relative form-group"><label for="tahun" class="">Tahun</label><input name="tahun" id="tahun" placeholder="Tahun" type="number" class="form-control" required></div>
                <div class="position-relative form-group"><label for="nomor" class="">No.</label><input name="nomor" id="nomor" placeholder="Nomor Urut" type="number" class="form-control"></div>
                <div class="position-relative form-group"><label for="name" class="">Dokumen</label>
                    <select class="form-control" id="name" name="name" required>
                        <option>Dokumen Evaluasi</option>
                        <option>Rancangan Peraturan Daerah Tentang APBD beserta Lampirannya terdiri dari :</option>
                        <option>a. Ringkasan APBD yang diklasifikasikan menurut kelompok dan jenis pendapatan , belanja , dan pembiayaan;</option>
                        <option>b. Ringkasan APBD menurut urusan Pemerintah Daerah dan Organisasi;</option>
                        <option>c. Rincian APBD menurut urusan Pemerintahan Daerah, Organisasi, Program, Kegiatan, Sub Kegiatan, Akun, Kelompok, Jenis Pendapatan, Belanja dan Pembiayaan;</option>
                        <option>d. Rekapitulasi Belanja Daerah dan Kesesuaian Menurut Urusan Pemerintahan Daerah, Organisasi, Program , Kegiatan , Sub Kegiatan;</option>
                        <option>e. Rekapitulasi Belanja Daerah Untuk Keselarasan dan Keterpaduan Urusan Pemerintahan Daerah dan Fungsi Dalam Kerangka Pengelolaan Keuangan Negara;</option>
                        <option>f. Daftar Jumlah Pegawai Per Golongan dan Per Jabatan;</option>
                        <option>g. Daftar Piutang Daerah;</option>
                        <option>h. Daftar Penyertaan Modal Daerah dan Investasi Daerah Lainnya;</option>
                        <option>i. Daftar Perkiraan Penambahan dan Pengurangan Aset Tetap Daerah;</option>
                        <option>j. Daftar Perkiraan Penambahan dan Pengurangan Aset Lain-lain;</option>
                        <option>k. Daftar Sub Kegiatan Tahun Anggaran Sebelumnya Yang Belum Diselesaikan dan Dianggarkan Kembali Dalam Tahun Anggaran Yang Direncanakan;</option>
                        <option>l. Daftar Dana Cadangan; dan</option>
                        <option>m. Daftar Pinjaman Daerah.</option>
                        <option>Rancangan Peraturan Kepala Daerah tentang Penjabaran APBD beserta Lampirannya terdiri dari:</option>
                        <option>a. Ringkasan Penjabaran APBD yang diklasifikasikan menurut kelompok dan jenis Objek dan Rincian Objek Pendapatan , Belanja , dan Pembiayaan;</option>
                        <option>b. Penjabaran APBD Menurut Urusan Pemerintahan Daerah, Organisasi, Program, Kegiatan, Sub Kegiatan, Akun, Kelompok, Jenis Objek, Rincian Objek Pendapatan, Belanja dan Pembiayaan;</option>
                        <option>c. Daftar Nama Penerima, Alamat Penerima dan Besaran Hibah;</option>
                        <option>d. Daftar Nama Penerima, Alamat Penerima dan Besaran Bantuan Sosial;</option>
                        <option>e. Daftar Nama Penerima, Alamat Penerima dan Besaran Bantuan Keuangan Bersifat Umum dan Bersifat Khusus;</option>
                        <option>f. Daftar Nama Penerima, Alamat Penerima dan Besaran Belanja Bagi Hasil;</option>
                        <option>g. Rincian dana otonomi khusus menurut urusan Pemerintah Daerah, Organisasi, Program, Kegiatan, Sub Kegiatan, Akun, Kelompok, Jenis Objek, dan Rincian Objek Pendapatan, Belanja dan Pembiayaan;</option>
                        <option>h. Rincian DBH-SDA Pertambangan Minyak Bumi dan Pertambangan Gas Alam/Tambahan BDH Minyak dan Gas Bumi*) Menurut Urusan Pemerintah Daerah, Organisasi, Program, Kegiatan, Sub Kegiatan, Akun, Kelompok, Jenis, Objek dan Rincian Objek Pendapatan, Belanja dan Pembiyaan;</option>
                        <option>i. Rincian Dana Tambahan Infrastruktur Menurut Urusan Pemerintah Daerah, Organisasi, Program , Kegiatan, Sub Kegiatan, Akun, Kelompok, Jenis, Objek dan Rincian Objek Pendapatan, Belanja dan Pembiayaan;</option>
                        <option>j. Sinkronisasi Kebijakan Pemerintah Provinsi/Kabupaten/Kota pada Daerah Perbatasan Dalam Rancangan Perda tentang APBD dan Rancangan Perkada tentang Penjabaran APBD Dengan Program Prioritas Perbatasan Negara</option>
                        <option>Rancangan Kerja Pembangunan Daerah (RKPD)</option>
                        <option>KUA, dan PPAS yang disepakati antara Bupati/Wali Kota dan DPRD Kabupaten/Kota</option>
                        <option>Dokuen lainnya, antara lain:</option>
                        <option>a. Surat Kepala Daerah Perihal Permohonan Evaluasi Rancangan Perda tentang APBD dan Rancangan Peraturan Kepala Daerah tentang Penjabaran APBD Kepala Gubernur;</option>
                        <option>Nomor   :</option>
                        <option>Tanggal :</option>
                        <option>b. Surat Kepala Daerah Perihal Penyampaian Rancangan KUA dan Rancangan PPAS kepada;</option>
                        <option>Nomor   :</option>
                        <option>Tanggal :</option>
                        <option>c. Nota Kesepakatan KUA dan PPAS;</option>
                        <option>Nomor   :</option>
                        <option>KUA                     PPAS</option>
                        <option>Tanggal :</option>
                        <option>d. Surat Kepala Daerah Perihal Penyampaian Rancangan Perda Kabupaten/Kota tentang APBD kepada DPRD;</option>
                        <option>Nomor   :</option>
                        <option>Tanggal :</option>
                        <option>e. Persetujuan Bersama antara Bupati/Wali Kota dan DPRD terhadap Rancangan Perda Kabupaten/Kota tentang APBD;</option>
                        <option>Nomor   :</option>
                        <option>Tanggal :</option>
                        <option>f. RPJMD;</option>
                        <option>g. Risalah Rapat;</option>
                        <option>h. Nota Keuangan;</option>
                        <option>i. Pengantar Nota Keuangan;</option>
                        <option>j. Tabel Tahapan dan Jadwal Proses Penyusunan APBD;</option>
                        <option>k. Daftar Sinkronisasi Kebijakan Pemerintahan Daerah Kabupaten/Kota dengan Kebijakan Pemerintahan Provinsi;</option>
                        <option>l. Tabel Konsistensi Program kegiatan, dan Sub Kegiatan pada RPJMD, RKPD, KUA, PPAS, dan RAPBD;</option>
                        <option>m. Tabel Format Perhitungan Alokasi Fungsi Pendidikan;</option>
                        <option>n. Tabel Format Perhitungan Alokasi Anggaran Kesehatan;</option>
                        <option>o. Tabel Alokasi Belanja Daerah Dalam Rangka Pemenuhan Standar Pelayanan Minimal; dan</option>
                        <option>p. Dokumen Pendukung Lainnya Sesuai Kebutuhan Evaluasi (RKA)</option>
                        <option>Dokumen Tambahan</option>
                        <option>Soft Copy Peraturan Daerah tentang APBD dan P APBD TA. 2021</option>
                        <option>Soft Copy Peraturan Kepala Daerah tentang Penjabaran APBD & P APBD TA. 2021</option>
                        <option>Soft Copy Rancangan Peraturan Daerah tentang APBD TA. 2022</option>
                        <option>Soft Copy Rancangan peraturan Kepala Daerah tentang Penjabaran APBD TA. 2022</option>
                        <option>Sudah Mengupload Semua Dokumen di SIPD</option>
                        <option>Menyampaikan Berita Acara atas Penambahan Program/Kegiatan/Sub kegiatan baru diluar RKPD</option>
                        <option>Batas Evaluasi</option>
                    </select>
                </div>
                <div class="position-relative form-group"><label for="files" class="">File</label><input name="files" id="files" type="file" class="form-control-file">
                    <small class="form-text text-muted">File harus format PDF/RAR/ZIP</small>
                </div>
                <button type="submit" class="mt-1 btn btn-primary">Submit</button>
                <a href="/dashboard/documentapbds/" class="mt-1 btn btn-warning">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection