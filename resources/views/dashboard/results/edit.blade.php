@extends('dashboard.layouts.main')

@section('container')
<div class="col-md-8">
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Balasan Hasil Tindak Lanjut</h5>
            <form method="post" action="/dashboard/results/{{ $result->id }}" enctype="multipart/form-data" class="">
                @method('put')
                @csrf
                <div class="position-relative form-group"><label for="tahun" class="">Tahun</label><input value="{{ $result->keputusans->tahun }}" name="tahun" id="tahun" placeholder="Tahun" type="number" class="form-control" required disabled></div>
                <div class="position-relative form-group"><label for="jenis" class="">Jenis</label><select name="jenis" id="jenis" class="form-control" disabled>
                    @if ($result->keputusans->jenis === "APBD")
                    <option selected>APBD</option>
                    <option>PAPB</option>
                    <option>Pertanggung Jawab</option>
                    @elseif ($result->keputusans->jenis === "PAPB")
                    <option>APBD</option>
                    <option selected>PAPB</option>
                    <option>Pertanggung Jawab</option>
                    @else
                    <option>APBD</option>
                    <option>PAPB</option>
                    <option selected>Pertanggung Jawab</option>
                    @endif
                </select></div>
                <div class="position-relative form-group"><a href="{{ asset('storage/' . $result->files) }}" class="mt-1 btn btn-info" target="_blank">Hasil Tindak Lanjut</a></div>
                <div class="position-relative form-group"><label for="balasan" class="">File Balasan</label><input name="balasan" id="balasan" type="file" class="form-control-file" required>
                    <small class="form-text text-muted">File harus format PDF</small>
                </div>
                <button type="submit" class="mt-1 btn btn-primary">Submit</button>
                <a href="/dashboard/results/" class="mt-1 btn btn-warning">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection