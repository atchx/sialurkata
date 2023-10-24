@extends('dashboard.layouts.main')

@section('container')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            @if (session()->has('success'))
            <div class="alert alert-success fade show" role="alert">{{ session('success') }}</div>
            @endif
            <div class="card-header">Keputusan Gubernur Ranperda Tentang Perubahan APBD dan Ranperkada Tentang Penjabaran Perubahan APBD
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Kabupaten</th>
                        <th class="text-center">Tahun</th>
                        <th class="text-center">File</th>
                        @if (auth()->user()->roles == 'Admin')
                        <th class="text-center">Actions</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($keputusans as $keputusan)
                        <tr>
                            <td class="text-center text-muted">{{ $loop->iteration }}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{ $keputusan->users->name }}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">{{ $keputusan->tahun }}</td>
                            <td class="text-center">
                                @if ($keputusan->files == "")
                                <div class="badge badge-warning">Pending</div>
                                @else
                                <a href="{{ asset('storage/' . $keputusan->files) }}" class="btn btn-primary btn-sm" target="_blank">View</a>
                                @endif
                            </td>
                            @if (auth()->user()->roles == 'Admin')
                            <td class="text-center">
                                <a href="/dashboard/keputusanpapbs/{{ $keputusan->id }}/edit" class="btn btn-primary btn-sm">Upload</a>
                                
                                <form action="/dashboard/keputusanpapbs/{{ $keputusan->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" id="delete" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection