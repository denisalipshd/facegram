@extends('layouts.auth')

@section('title', 'Login | Facegram')

@section('content')

<div class="container mt-5" style="max-width: 400px;">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4 class="text-center mb-4">Masuk ke Facegram</h4>

      @if ($errors->has('email'))
          <div class="alert alert-danger">
            {{ $errors->first('email') }}
          </div>
      @endif

      <form action="{{ route('prosesLogin') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input 
            type="username" 
            class="form-control @error('username') is-invalid @enderror" 
            id="username" 
            name="username" 
            value="{{ old('username') }}"
            autofocus
          >
          @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Kata Sandi</label>
          <input 
            type="password" 
            class="form-control @error('password') is-invalid @enderror" 
            id="password" 
            name="password"
          >
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Masuk</button>
      </form>

    </div>
  </div>
</div>

@endsection
