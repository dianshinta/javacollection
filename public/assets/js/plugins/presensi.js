// Untuk memperbarui waktu pada card presensi
function updateTime() {
    const timeDisplay = document.getElementById('time-display');
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    timeDisplay.textContent = `${hours}:${minutes}`;
}

// Perbarui waktu setiap detik
setInterval(updateTime, 1000);

// Tampilkan waktu saat halaman dimuat
updateTime();