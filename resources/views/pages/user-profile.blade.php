@extends('layouts.app')

@section('title', $user->full_name)

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-body text-center">
      <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('assets/default-user.png') }}" class="profile-img mb-3" alt="Profil">
      <h5>{{ $user->full_name }}</h5>
      <p class="text-muted">{{ $user->username }}</p>
      <p>{{ $user->bio }}</p>

      @auth
        @if (Auth::id() !== $user->id)
          @if ($isFollowingAccepted)
            <form action="{{ route('follow.destroy', $user->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger">Batalkan Pertemanan</button>
            </form>
          @elseif ($isPending)
            <button class="btn btn-sm btn-secondary" disabled>Permintaan Terkirim</button>
          @else
            <form action="{{ route('follow.store') }}" method="POST">
              @csrf
              <input type="hidden" name="following_id" value="{{ $user->id }}">
              <button class="btn btn-sm btn-outline-primary">Tambah Teman</button>
            </form>
          @endif
        @endif
      @endauth
    </div>
  </div>

  @if (!$user->is_private || $isFollowingAccepted)
    <div class="mt-4">
      <h5>Postingan {{ $user->full_name }}</h5>
      @forelse ($user->posts as $post)
        <div class="card post-card mb-2">
          <div class="card-body">
            <p>{!! $post->caption !!}</p>
            @foreach ($post->attachments as $attachment)
              <img src="{{ asset('storage/' . $attachment->storage_path) }}" class="img-fluid rounded" alt="Gambar Postingan">
            @endforeach
          </div>
        </div>
      @empty
        <p class="text-muted">Belum ada postingan.</p>
      @endforelse
    </div>
  @else
    <div class="mt-4 text-center text-muted">
      <em>Akun ini privat. Tambahkan sebagai teman untuk melihat postingan.</em>
    </div>
  @endif
</div>
@endsection
