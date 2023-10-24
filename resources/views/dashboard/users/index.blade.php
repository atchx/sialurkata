@extends('dashboard.layouts.main')

@section('container')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            @if (session()->has('success'))
            <div class="alert alert-success fade show" role="alert">{{ session('success') }}</div>
            @endif
            <div class="card-header">Users
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <a href="/dashboard/users/create" class="btn-wide btn btn-success">Tambah Akun +</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Name</th>
                        <th class="text-center">NIP</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Roles</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="text-center text-muted">{{ $user->id }}</td>
                        <td>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading">{{ $user->name }}</div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">{{ $user->nip }}</td>
                        <td class="text-center">{{ $user->username }}</td>
                        <td class="text-center">
                        @if ( $user->roles === "Admin")
                            <div class="badge badge-info">Admin</div>
                        @else
                            <div class="badge badge-warning">User</div>
                        @endif
                        </td>
                        <td class="text-center">
                            <a href="/dashboard/users/{{ $user->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                            <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
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