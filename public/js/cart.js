
  document.addEventListener("DOMContentLoaded", function() {
    const options = document.querySelectorAll(".option");

    options.forEach(option => {
      option.addEventListener("click", function() {
        // Hapus .active dari semua option
        options.forEach(opt => opt.classList.remove("active"));
        
        // Tambah .active ke option yang diklik
        this.classList.add("active");
      });
    });
  });

