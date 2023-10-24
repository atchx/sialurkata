@extends('dashboard.layouts.main')

@section('container')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            @if (session()->has('success'))
            <div class="alert alert-success fade show" role="alert">{{ session('success') }}</div>
            @endif
            <div class="card-header">Hasil Tindak Lanjut
                @if (auth()->user()->roles == 'User')
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <div role="group" class="btn-group-sm btn-group">
                            <a href="/dashboard/results/create" class="btn-wide btn btn-success">Tambah Dokumen +</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Kabupaten</th>
                        <th class="text-center">Jenis</th>
                        <th class="text-center">Tahun</th>
                        <th class="text-center">Dokumen</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                        <tr>
                            <td class="text-center text-muted">{{ $result->id }}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{ $result->users->name }}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">{{ $result->keputusans->jenis }}</td>
                            <td class="text-center">{{ $result->keputusans->tahun }}</td>
                            <td class="text-center">
                                <a href="{{ asset('storage/' . $result->files) }}" class="btn btn-primary btn-sm" target="_blank">Hasil Tindak Lanjut</a>
                                @if ($result->balasan != "")
                                <a href="{{ asset('storage/' . $result->balasan) }}" class="btn btn-primary btn-sm" target="_blank">Balasan</a>
                                @endif
                            </td>
                            <td class="text-center">
                                @if (auth()->user()->roles == 'Admin')
                                @if ($result->balasan == "")
                                <a href="/dashboard/results/{{ $result->id }}/edit" class="btn btn-warning btn-sm">Kirim Balasan</a>
                                @endif
                                @endif
                                <form action="/dashboard/results/{{ $result->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" id="delete" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection