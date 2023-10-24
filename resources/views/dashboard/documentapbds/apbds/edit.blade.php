@extends('dashboard.layouts.main')

@section('container')
<div class="col-md-8">
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Upload File Dokumen RANPERDA TENTANG APBD DAN RANPERKADA TENTANG PENJABARAN APBD</h5>
            <form method="post" action="/dashboard/documentapbds/apbds/{{ $keputusan->id }}" enctype="multipart/form-data" class="">
                @method('put')
                @csrf
                
                <div class="position-relative form-group"><label for="name" class="">Nama Kabupaten</label><input value="{{ $keputusan->users->name }}" name="name" id="name" placeholder="Nama Kabupaten" type="input" class="form-control" disabled></div>
                <div class="position-relative form-group"><label for="tahun" class="">Tahun</label><input value="{{ $keputusan->tahun }}" name="tahun" id="tahun" placeholder="Tahun" type="text" class="form-control" disabled></div>
                <div class="position-relative form-group"><a href="/dashboard/keputusanapbds/{{ $keputusan->id }}" target="_blank" class="mt-1 btn btn-info">Lihat Dokumen</a></div>
                <div class="position-relative form-group"><label for="dokumen" class="">File</label><input name="dokumen" id="dokumen" type="file" class="form-control-file">
                    <small class="form-text text-muted">File harus format PDF/RAR/ZIP. Input kembali file, jika file kosong dan tombol submit diklik file sebelumnya akan dihapus</small>
                </div>
                
                <button type="submit" class="mt-1 btn btn-primary">Submit</button>
                <a href="/dashboard/documentapbds/{{ $keputusan->keputusan_id }}" class="mt-1 btn btn-warning">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection