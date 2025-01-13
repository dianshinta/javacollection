import { updateCharts } from '../demo/demo-manajer.js';

document.addEventListener("DOMContentLoaded", async () => {
    const optionMenu = document.querySelector(".selected-menu");
    const selectedBtn = document.querySelector(".selected-btn");
    const sBtnText = document.querySelector(".sBtn-text");
    const overlay = document.getElementById("overlay-cabang");

    let selectedCabang = ""; // Tidak ada default cabang; nilai akan diambil dari API.

    // Fungsi untuk memuat data dari API dan memperbarui dropdown
    const fetchAndPopulateDropdown = async () => {
        try {
            const response = await fetch('/api/index-data'); // Ganti dengan URL API Anda
            const attendances = await response.json();

            // Ambil data cabang dari JSON
            const branches = attendances.map(attendance => attendance.nama); // Ambil nama cabang

            if (branches.length > 0) {
                // Tetapkan cabang pertama dari data API sebagai default
                selectedCabang = branches[0];
                
                // Perbarui teks pada elemen .sBtn-text dengan nilai cabang pertama
                sBtnText.innerText = selectedCabang;
            }

            // Kosongkan dropdown sebelumnya
            const dropdown = document.querySelector(".overlay .options");
            dropdown.innerHTML = "";

            // Buat opsi baru berdasarkan data cabang
            branches.forEach((branch, index) => {
                const listItem = document.createElement('li');
                listItem.classList.add('option');
                if (index === 0) listItem.setAttribute('id', 'option-first');
                if (index === branches.length - 1) listItem.setAttribute('id', 'option-last');

                const span = document.createElement('span');
                span.classList.add('option-text');
                span.textContent = branch; // Gunakan nama cabang dari data JSON

                listItem.appendChild(span);
                dropdown.appendChild(listItem);

                // Tambahkan event listener untuk opsi
                listItem.addEventListener("click", async () => {
                    const selectedOption = span.textContent;
                    sBtnText.innerText = selectedOption;
                    selectedCabang = selectedOption;

                    // Tutup dropdown dan hapus class "active"
                    optionMenu.classList.remove("active");
                    overlay.style.display = "none";

                    // Memperbarui grafik sesuai cabang yang dipilih
                    await updateCharts(selectedCabang);

                    // Panggil fetchData dan processData untuk memuat ulang tabel
                    const data = await fetchData(selectedCabang);
                    processData(data);
                });
            });

            // Panggil fetchData dan processData untuk memuat data awal
            await updateCharts(selectedCabang);
            
            const initialData = await fetchData(selectedCabang);
            processData(initialData);
        } catch (error) {
            console.error("Error fetching data:", error);
        }
    };

    async function fetchData(selectedCabang) {
        try {
            const response = await fetch(`/api/riwayat-data?toko=${encodeURIComponent(selectedCabang)}`);
            const rawText = await response.text();

            // Cari bagian JSON di respons dan buang teks tambahan
            const jsonStartIndex = rawText.indexOf('[['); // Posisi di mana JSON dimulai
            if (jsonStartIndex === -1) throw new Error('JSON tidak ditemukan dalam respons API');

            const jsonString = rawText.substring(jsonStartIndex); // Ambil bagian JSON
            const data = JSON.parse(jsonString); // Parse JSON yang valid

            return data;
        } catch (error) {
            console.error('Gagal memuat data:', error);
            return []; // Kembalikan array kosong jika gagal
        }
    }    

    // Fungsi untuk menentukan kelas CSS berdasarkan status
    function getBadgeClass(status) {
        switch ((status || 'none').toLowerCase()) {
            case 'hadir':
                return 'badge badge-success'; // Kelas untuk status "Hadir"
            case 'terlambat':
                return 'badge badge-warning'; // Kelas untuk status "Terlambat"
            case 'tidak hadir':
                return 'badge badge-danger'; // Kelas untuk status "Tidak Hadir"
            default:
                return 'badge badge-secondary'; // Default kelas
        }
    }

    // Fungsi untuk memproses dan menampilkan data ke tabel
    function processData(data) {
        // Rata array jika data terbungkus dalam array tambahan
        const flatData = data.flat();

        // Ambil elemen body tabel
        const tableBody = document.getElementById('data-table-body');
        tableBody.innerHTML = ''; // Kosongkan isi tabel

        // Iterasi data dan buat baris tabel
        flatData.forEach(item => {
            // Fallback nilai jika properti undefined
            const nama = item.nama || 'none';
            const status = item.status || 'none';
            const waktu = item.waktu || 'none';

            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${nama}</td>
                <td><span class="${getBadgeClass(status)}">${status}</span></td>
                <td>${waktu}</td>
            `;
            tableBody.appendChild(row);
        });
    }

    // Menangani klik pada tombol dropdown
    selectedBtn.addEventListener("click", () => {
        const isActive = optionMenu.classList.contains("active");

        // Toggle class "active" pada .selected-menu
        if (isActive) {
            optionMenu.classList.remove("active");
            overlay.style.display = "none";
        } else {
            optionMenu.classList.add("active");
            overlay.style.display = "block";
        }
    });

    // Tutup dropdown jika klik di luar elemen
    document.addEventListener("click", (e) => {
        if (!optionMenu.contains(e.target) && !overlay.contains(e.target)) {
            optionMenu.classList.remove("active");
            overlay.style.display = "none";
        }
    });

    // Memuat dropdown awal dan grafik awal
    fetchAndPopulateDropdown();
    updateCharts(selectedCabang);
});

// Array nama bulan dalam Bahasa Indonesia
const monthNames = [
    "Januari", "Februari", "Maret", "April", "Mei", "Juni",
    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
];

// Ambil nama bulan saat ini
const currentMonth = monthNames[new Date().getMonth()];

// Update teks elemen dengan ID 'currentMonth'
document.getElementById("currentMonth").textContent = currentMonth;
