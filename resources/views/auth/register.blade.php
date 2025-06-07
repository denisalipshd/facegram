@extends('layouts.auth')

@section('title', 'Register | Facegram')

@section('content')

<div class="container mt-5" style="max-width: 400px;">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4 class="text-center mb-4">Daftar Akun Facegram</h4>
      
      <form action="{{ route('prosesRegister') }}" method="POST">
        @csrf
        
        <div class="mb-3">
          <label for="full_name" class="form-label">Full Name</label>
          <input 
            type="text" 
            class="form-control @error('full_name') is-invalid @enderror" 
            id="full_name" 
            name="full_name" 
            value="{{ old('full_name') }}" 
            autofocus
          >
          @error('full_name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input 
            type="username" 
            class="form-control @error('username') is-invalid @enderror" 
            id="username" 
            name="username" 
            value="{{ old('username') }}"
          >
          @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
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
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Daftar</button>
      </form>

    </div>
  </div>
</div>

@endsection
