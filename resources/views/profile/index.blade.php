@extends('layouts.admin')

@section('main')

<div class="container mt-4">

<h2 class="mb-4">Profile Saya</h2>

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

<div class="card shadow-sm">

<div class="card-header">
Edit Profile
</div>

<div class="card-body">

<form action="{{ route('profile.update') }}" method="POST">

@csrf

<div class="row">

<div class="col-md-6">

<div class="mb-3">
<label>Nama</label>
<input type="text"
name="name"
class="form-control"
value="{{ $user->name }}"
required>
</div>

</div>

<div class="col-md-6">

<div class="mb-3">
<label>Email</label>
<input type="email"
name="email"
class="form-control"
value="{{ $user->email }}"
required>
</div>

</div>

</div>

<div class="mb-3">
<label>Password Baru</label>
<input type="password"
name="password"
class="form-control">

<small class="text-muted">
Kosongkan jika tidak ingin mengganti password
</small>
</div>

<button class="btn btn-primary">
Update Profile
</button>

</form>

</div>

</div>

</div>

@endsection