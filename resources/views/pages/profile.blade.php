@extends('layouts.app')

@section('title', 'profile')

@section('content')

<div class="container mt-4">
  <h4>Profil Saya</h4>
  <div class="card">
    <div class="card-body text-center">
      <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('assets/default-user.png') }}" class="profile-img mb-3" alt="Profil">
      <h5>{{ $user->full_name }}</h5>
      <p>{!! $user->username !!}</p>
      <p>{!! $user->bio !!}</p>
      <form action="{{ route('profile.edit') }}">
        <button class="btn btn-outline-primary">Edit Profil</button>
      </form>
    </div>
  </div>
</div>

@endsection