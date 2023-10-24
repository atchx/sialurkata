@extends('dashboard.layouts.main')

@section('container')
<div class="col-md-8">
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Tambah Dokumen RANPERDA TENTANG PERTANGGUNGJAWABAN PELAKSANAAN APBD DAN RANPERKADA TENTANG PENJABARAN PERTANGGUNGJAWABAN APBD</h5>
            <form method="post" action="/dashboard/documentpjs" enctype="multipart/form-data" class="">
                @csrf
                <div class="position-relative form-group"><label for="tahun" class="">Tahun</label><input name="tahun" id="tahun" placeholder="Tahun" type="number" class="form-control" required></div>
                <div class="position-relative form-group"><label for="nomor" class="">No.</label><input name="nomor" id="nomor" placeholder="Nomor Urut" type="number" class="form-control"></div>
                <div class="position-relative form-group"><label for="name" class="">Dokumen</label><input name="name" id="name" placeholder="Nama Dokumen" type="text" class="form-control" required></div>
                <div class="position-relative form-group"><label for="files" class="">File</label><input name="files" id="files" type="file" class="form-control-file">
                    <small class="form-text text-muted">File harus format PDF/RAR/ZIP</small>
                </div>
                <button type="submit" class="mt-1 btn btn-primary">Submit</button>
                <a href="/dashboard/documentpjs/" class="mt-1 btn btn-warning">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection