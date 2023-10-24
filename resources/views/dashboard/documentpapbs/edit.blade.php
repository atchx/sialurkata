@extends('dashboard.layouts.main')

@section('container')
<div class="col-md-8">
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Dokumen RANPERDA TENTANG PERUBAHAN APBD DAN RANPERKADA TENTANG PENJABARAN PERUBAHAN APBD</h5>
            <form method="post" action="/dashboard/documentpapbs/{{ $document->id }}" enctype="multipart/form-data" class="">
                @method('put')
                @csrf
                @if (auth()->user()->roles == 'Admin')
                <div class="position-relative form-group"><label for="nomor" class="">No.</label><input value="{{ $document->nomor }}" name="nomor" id="nomor" placeholder="Nomor Urut" type="number" class="form-control" disabled></div>
                <div class="position-relative form-group"><label for="name" class="">Dokumen</label><input value="{{ $document->name }}" name="name" id="name" placeholder="Nama Dokumen" type="text" class="form-control" disabled></div>
                @if ($document->files != null)
                <div class="position-relative form-group"><a href="{{ asset('storage/' . $document->files) }}" class="mt-1 btn btn-info" target="_blank">Lihat Dokumen</a></div>
                @endif
                <div class="position-relative form-group"><label for="keterangan" class="">Keterangan</label><input value="{{ $document->keterangan }}" name="keterangan" id="keterangan" placeholder="Keterangan" type="text" class="form-control" required></div>
                @else
                <div class="position-relative form-group"><label for="nomor" class="">No.</label><input value="{{ $document->nomor }}" name="nomor" id="nomor" placeholder="Nomor Urut" type="number" class="form-control"></div>
                <div class="position-relative form-group"><label for="name" class="">Dokumen</label><input value="{{ $document->name }}" name="name" id="name" placeholder="Nama Dokumen" type="text" class="form-control" required></div>
                <div class="position-relative form-group"><label for="files" class="">File</label><input name="files" id="files" type="file" class="form-control-file">
                    <small class="form-text text-muted">File harus format PDF/RAR/ZIP. Input kembali file, jika file kosong dan tombol submit diklik file sebelumnya akan dihapus</small>
                </div>
                @endif
                <button type="submit" class="mt-1 btn btn-primary">Submit</button>
                <a href="/dashboard/documentpapbs/{{ $document->keputusan_id }}" class="mt-1 btn btn-warning">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection