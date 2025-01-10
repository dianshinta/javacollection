@extends('layouts.app')

@section('content')
<div class="reset-password" style="display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; background-color: #fff2f2;">
    <div style="background: white; width: 100%; max-width: 500px; min-height: 400px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); border-radius: 8px; overflow: hidden; padding: 40px;">
        <h2 style="font-size: 28px; font-weight: bold; color: #000; text-align: center; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Reset Kata Sandi</h2>
        
        @if (session('status'))
            <div style="color: rgb(65, 138, 199); font-size: 14px; text-align: center; margin-bottom: 15px;">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <div style="margin-bottom: 15px;">
                <label for="email" style="font-size: 14px; color: #000;">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    placeholder="Masukkan Email Anda" 
                    style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; box-sizing: border-box;">
                @error('email')
                    <span style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 15px;">
                <label for="password" style="font-size: 14px; color: #000;">Kata Sandi Baru</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required 
                    placeholder="Masukkan Kata Sandi Baru" 
                    style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; box-sizing: border-box;">
                @error('password')
                    <span style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 15px;">
                <label for="password_confirmation" style="font-size: 14px; color: #000;">Konfirmasi Kata Sandi</label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    required 
                    placeholder="Konfirmasi Kata Sandi Baru" 
                    style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; box-sizing: border-box;">
                @error('password_confirmation')
                    <span style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>

            <button 
                type="submit" 
                style="width: 100%; padding: 12px; background-color: #7c0000; color: #fff; font-size: 16px; font-weight: bold; border: none; border-radius: 4px; cursor: pointer;">
                Reset Kata Sandi
            </button>
        </form>

        <div style="margin-top: 20px; text-align: center;">
            <a href="{{ route('login') }}" style="color: #000; font-size: 14px; text-decoration: none;">Kembali ke Halaman Login</a>
        </div>
    </div>
</div>
@endsection
