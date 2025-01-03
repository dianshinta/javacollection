@extends('layouts.app')

@section('content')
   <!-- Lupa Password Section -->
   <div class="lupapass" id="reset-password">
        <div class="form-section">
            <h2>Lupa Kata Sandi</h2>
            <form onsubmit="sendOTP(event)">
    <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Masukkan Email Anda" required>
    </div>
    <button type="submit">Kirim Kode OTP</button>
</form>

            <div class="link-group">
                Ingat Kata Sandi? <a href="login">Masuk</a>
            </div>
        </div>
    </div>

@endsection