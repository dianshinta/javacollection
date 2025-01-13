import { updateCharts } from '../demo/demo-supervisor.js';

document.addEventListener("DOMContentLoaded", () => {
    const optionMenu = document.querySelector(".selected-menu");
    const selectedBtn = document.querySelector(".selected-btn");
    const sBtnText = document.querySelector(".sBtn-text");
    const overlay = document.getElementById("overlay-cabang");

    let selectedCabang = "Cabang A"; // Default cabang

    // Fungsi untuk memuat data dari API dan memperbarui dropdown
    const fetchAndPopulateDropdown = async () => {
        try {
            const response = await fetch('/api/index-data'); // Ganti dengan URL API Anda
            const attendances = await response.json();
            
            // Ambil data cabang dari JSON
            const branches = attendances.map(attendance => attendance.nama); // Ambil nama cabang

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
                });
            });
        } catch (error) {
            console.error("Error fetching data:", error);
        }
    };

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
