@extends('dashboard.layouts.main')

@section('container')
<div class="col-md-8">
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Upload Keputusan Gubernur RANPERDA TENTANG PERUBAHAN APBD DAN RANPERKADA TENTANG PENJABARAN PERUBAHAN APBD</h5>
            <form method="post" action="/dashboard/keputusanpapbs/{{ $keputusan->id }}" enctype="multipart/form-data" class="">
                @method('put')
                @csrf
                <div class="position-relative form-group"><label for="tahun" class="">Tahun</label><input value="{{ $keputusan->tahun }}" name="tahun" id="tahun" placeholder="Tahun" type="number" class="form-control" required disabled></div>
                <div class="position-relative form-group"><label for="jenis" class="">Jenis</label><input value="{{ $keputusan->jenis }}" name="jenis" id="jenis" placeholder="Jenis" type="input" class="form-control" required disabled></div>
                <div class="position-relative form-group"><label for="files" class="">File</label><input name="files" id="files" type="file" class="form-control-file" required>
                    <small class="form-text text-muted">File harus format PDF</small>
                </div>
                <button type="submit" class="mt-1 btn btn-primary">Submit</button>
                <a href="/dashboard/keputusanpapbs/" class="mt-1 btn btn-warning">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection