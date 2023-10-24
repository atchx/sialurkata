@extends('dashboard.layouts.main')

@section('container')
<div class="col-md-8">
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Tambah Laporan Realisasi</h5>
            <form method="post" action="/dashboard/reports" enctype="multipart/form-data" class="">
                @csrf
                <div class="position-relative form-group"><label for="tahun" class="">Tahun</label><input name="tahun" id="tahun" placeholder="Tahun" type="number" class="form-control" required></div>
                <div class="position-relative form-group"><label for="jenis" class="">Jenis</label><select name="jenis" id="jenis" class="form-control">
                    <option>APBD</option>
                    <option>PAPB</option>
                    <option>Pertanggung Jawab</option>
                </select></div>
                <div class="position-relative form-group"><label for="files" class="">File</label><input name="files" id="files" type="file" class="form-control-file" required>
                    <small class="form-text text-muted">File harus format PDF</small>
                </div>
                <button type="submit" class="mt-1 btn btn-primary">Submit</button>
                <a href="/dashboard/reports/" class="mt-1 btn btn-warning">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection