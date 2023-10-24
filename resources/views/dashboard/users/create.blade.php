@extends('dashboard.layouts.main')

@section('container')
<div class="col-md-8">
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Tambah User</h5>
            <form method="post" action="/dashboard/users" class="">
                @csrf
                <div class="position-relative form-group"><label for="name" class="">Name</label><input name="name" id="name" placeholder="Name" type="input" class="form-control" required autofocus></div>
                <div class="position-relative form-group"><label for="nip" class="">NIP</label><input name="nip" id="nip" placeholder="NIP" type="number" class="form-control" required>
                    <small class="form-text text-muted">Isi NIP dengan nilai '0' untuk Akun Kabupaten</small>
                </div>
                <div class="position-relative form-group"><label for="username" class="">Username</label><input name="username" id="username" placeholder="Username" type="input" class="form-control" required></div>
                <div class="position-relative form-group"><label for="password" class="">Password</label><input name="password" id="password" placeholder="Password" type="password" class="form-control" required></div>
                <div class="position-relative form-group"><label for="roles" class="">Roles</label><select name="roles" id="roles" class="form-control">
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select></div>
                <button type="submit" class="mt-1 btn btn-primary">Submit</button>
                <a href="/dashboard/users/" class="mt-1 btn btn-warning">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection