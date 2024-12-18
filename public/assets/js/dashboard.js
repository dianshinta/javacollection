document.addEventListener("DOMContentLoaded", () => {
    const optionMenu = document.querySelector(".selected-menu");
    const selectedBtn = document.querySelector(".selected-btn");
    const options = document.querySelectorAll(".option");
    const sBtnText = document.querySelector(".sBtn-text");
    const overlay = document.getElementById("overlay-cabang");
  
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
  
    // Menangani klik pada opsi
    options.forEach(option => {
      option.addEventListener("click", () => {
        const selectedOption = option.querySelector(".option-text").innerText;
        sBtnText.innerText = selectedOption;
  
        // Tutup dropdown dan hapus class "active"
        optionMenu.classList.remove("active");
        overlay.style.display = "none";
      });
    });
  
    // Tutup dropdown jika klik di luar elemen
    document.addEventListener("click", (e) => {
      if (!optionMenu.contains(e.target) && !overlay.contains(e.target)) {
        optionMenu.classList.remove("active");
        overlay.style.display = "none";
      }
    });
  });
  