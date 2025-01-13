@extends('layouts.app')

@section('content')
    <!-- Login Section -->
    <div class="container" id="login">
        <div class="form-section">
            <h2>Selamat datang</h2>

            <!-- Tampilkan pesan sukses atau error dari session -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf <!-- Token CSRF untuk Laravel -->

                <div class="input-group">
                    <label for="nip">NIP</label>
                    <input type="text" id="nip" name="nip" placeholder="Masukkan NIP Pengguna" required>
                    <!-- Pesan error untuk field NIP -->
                    @error('nip')
                        <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Kata Sandi" required>
                    <!-- Pesan error untuk field Password -->
                    @error('password')
                        <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit">Masuk</button>
            </form>

            <div class="link-group">
                <a href="resetpassword">Lupa Kata Sandi?</a>
            </div>
            <div class="link-group">
                Belum punya akun? <a href="register">Daftar</a>
            </div>
        </div>
        <div class="image-section"></div>
    </div>

    <script>
        function showLogin() {
            document.getElementById('login').style.display = 'flex';
            document.getElementById('register').style.display = 'none';
            document.getElementById('forgot-password').style.display = 'none';
        }

        function showRegister() {
            document.getElementById('login').style.display = 'none';
            document.getElementById('register').style.display = 'flex';
            document.getElementById('forgot-password').style.display = 'none';
        }

        function showForgotPassword() {
            document.getElementById('login').style.display = 'none';
            document.getElementById('register').style.display = 'none';
            document.getElementById('forgot-password').style.display = 'flex';
        }

        function sendOTP(event) {
            event.preventDefault();
            alert('Kode OTP berhasil dikirim ke email Anda!');
        }
    </script>
@endsection
