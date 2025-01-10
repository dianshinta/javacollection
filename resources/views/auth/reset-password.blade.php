@extends('layouts.app')

@section('content')
<div class="reset-password" style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #fff2f2;">
    <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 400px; width: 100%;">
        <h2 style="text-align: center; margin-bottom: 20px; color: #500606;">Reset Kata Sandi</h2>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Token Reset -->
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <!-- Input Email -->
            <div class="input-group" style="margin-bottom: 15px;">
                <label for="email" style="display: block; margin-bottom: 5px; color: #444;">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    placeholder="Masukkan Email Anda" 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
                @error('email')
                    <span class="error" style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>

            <!-- Input Password Baru -->
            <div class="input-group" style="margin-bottom: 15px;">
                <label for="password" style="display: block; margin-bottom: 5px; color: #444;">Kata Sandi Baru</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required 
                    placeholder="Masukkan Kata Sandi Baru" 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
                @error('password')
                    <span class="error" style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="input-group" style="margin-bottom: 15px;">
                <label for="password_confirmation" style="display: block; margin-bottom: 5px; color: #444;">Konfirmasi Kata Sandi</label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    required 
                    placeholder="Konfirmasi Kata Sandi Baru" 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
                @error('password_confirmation')
                    <span class="error" style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tombol Reset -->
            <button 
                type="submit" 
                style="width: 100%; padding: 10px; background-color: #500606; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Reset Kata Sandi
            </button>
        </form>

        <div class="link-group" style="margin-top: 20px; text-align: center;">
            <a href="{{ route('login') }}" style="color: #500606; text-decoration: none;">Ingat Kata Sandi? Masuk</a>
        </div>
    </div>
</div>
@endsection
