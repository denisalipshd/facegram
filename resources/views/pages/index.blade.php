@extends('layouts.app')

@section('title', 'Facegram')

@section('content')

<!-- Konten Utama -->
<div class="container mt-4">
  <div class="row">

    <!-- Sidebar Kiri -->
    <div class="col-lg-3 d-none d-lg-block">
      <div class="card sidebar-card">
        <div class="card-body text-center">
          <img src="assets/profile.jpg" alt="Profil" class="profile-img mb-2">
          <h5 class="card-title">John Doe</h5>
          <p class="text-muted">@johndoe</p>
          <a href="#" class="btn btn-sm btn-outline-primary">Lihat Profil</a>
        </div>
      </div>
    </div>

    <!-- Feed Tengah -->
    <div class="col-lg-6">
     <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="mb-2 d-flex align-items-center">
                    <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('assets/default-user.png') }}" alt="Profil" class="profile-img me-2">
                    <textarea name="caption" class="form-control @error('caption')
                        is-invalid
                    @enderror" rows="2" placeholder="Apa yang anda pikirkan?">{{ old('caption') }}</textarea>
                    @error('caption')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
               </div>
               <div class="mb-2">
                    <input type="file" name="images[]" multiple class="form-control @error('images.*')
                        is-invalid
                    @enderror">
                    @error('images.*')
                        {{ $message }}
                    @enderror
               </div>
               <button type="submit" class="btn btn-primary w-100">Posting</button>
            </form>
        </div>
     </div>
      <!-- Postingan 1 -->
      @foreach ($posts as $post)
      <div class="card post-card mb-2">
        <div class="card-body">
          <div class="d-flex mb-3">
            <img src="{{ $post->user->photo ? asset('storage/' . $post->user->photo) : asset('assets/default-user.png') }}" alt="Profil" class="profile-img me-2">
            <div class="d-flex flex-column">
              <a href="{{ route('users.show', $post->id) }}" class="mb-0" style="text-decoration: none; color:black;">{{ $post->user->full_name }}</a>
              <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
            </div>
          </div>
          <p>{!! $post->caption !!}</p>
          @foreach ($post->attachments as $attachment)
            <img src="{{ asset('storage/' . $attachment->storage_path) }}" class="img-fluid rounded" alt="Gambar Postingan">
          @endforeach
          <div class="mt-2">
            <button class="btn btn-sm btn-outline-danger">❤️ Suka</button>
            <button class="btn btn-sm btn-outline-secondary">💬 Komentar</button>
            <small class="text-muted" style="float: right;">👁️ <span class="view-count">0</span> kali dilihat</small>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Sidebar Kanan -->
    <div class="col-lg-3 d-none d-lg-block">
      <div class="card sidebar-card">
        <div class="card-body">
          <h5 class="card-title">Orang yang Mungkin Anda Kenal</h5>
          <ul class="list-unstyled">
            @foreach ($suggestedUsers as $suggested)
            <li class="mb-3 d-flex align-items-center">
              <img src="{{ $suggested->photo ? asset('storage/'. $suggested->photo) : asset('assets/default-user.png') }}" class="profile-img me-2" alt="Teman">
              <div>
                <a href="{{ route('users.show', $suggested->id) }}"><strong>{{ $suggested->full_name }}</strong></a><br />
                <form action="{{ route('follow.store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="following_id" value="{{ $suggested->id }}">
                  <button class="btn btn-sm btn-outline-success mt-1">Tambah Teman</button>
                </form>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection