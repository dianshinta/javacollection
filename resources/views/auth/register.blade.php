@extends('layouts.app')

@section('content')

 <!-- Registrasi Section -->
    <div class="container" id="register">
        <div class="form-section">
            <h2>Daftar Akun Baru</h2>
            <form id="register-form" method="POST" action="{{ url('/api/register') }}">
            @csrf <!-- Token CSRF untuk Laravel -->

            <div class="input-group">
                <label for="nip">NIP</label>
                <input type="text" id="nip" name="nip" placeholder="Masukkan NIP Anda" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan Email Anda" required>
            </div>
            <div class="input-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="Buat Kata Sandi" required>
            </div>
            <div class="input-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan Anda" required>
            </div>
            <button type="submit">Daftar</button>
        </form>

            <div class="link-group">
                Sudah punya akun? <a href="/login" >Masuk</a>
            </div>
        </div>
        <div class="image-section"></div>
    </div>

    <script>
  // Mengambil CSRF token dari meta tag
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Ambil data dari form
const nip = document.getElementById('nip').value;
const email = document.getElementById('email').value;
const password = document.getElementById('password').value;
const jabatan = document.getElementById('jabatan').value;

// Kirim request menggunakan fetch
fetch('/api/register', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,  // Jika menggunakan CSRF
    },
    body: JSON.stringify({
        nip: nip,
        email: email,
        password: password,
        jabatan: jabatan,
    })
})
.then(response => response.json())
.then(data => {
    console.log(data);  // Untuk debug, pastikan melihat response
    if (data.message) {
        window.location.href = '/login';  // Redirect ke halaman login
    }
})
.catch(error => console.error('Error:', error));

</script>
@endsection