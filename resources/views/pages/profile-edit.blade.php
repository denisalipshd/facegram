@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

<div class="container mt-4">
  <h4>Edit Profil</h4>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3 text-center">
      <img id="preview" src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('assets/default-user.png') }}" 
           class="rounded-circle mb-2" width="100" height="100" style="object-fit: cover;">
      <input type="file" name="photo" class="form-control" accept="image/*" onchange="previewImage(event)">
    </div>

    <div class="mb-3">
      <label>Nama Lengkap</label>
      <input type="text" name="full_name" class="form-control" value="{{ old('full_name', $user->full_name) }}" required>
    </div>

    <div class="mb-3">
      <label>Username</label>
      <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
    </div>

    <div class="mb-3">
      <label>Bio</label>
      <textarea name="bio" class="form-control">{{ old('bio', $user->bio) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
  </form>
</div>


<script>
function previewImage(event) {
  const reader = new FileReader();
  reader.onload = function () {
    const output = document.getElementById('preview');
    output.src = reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection