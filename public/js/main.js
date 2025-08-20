// Duplicate testimoni
const wrapper = document.querySelector(".testimonial-wrapper");
wrapper.innerHTML += wrapper.innerHTML;

const navToggle = document.getElementById("nav-toggle");
const navClose = document.getElementById("nav-close");
const navMenu = document.getElementById("nav-menu");

// Menu show
function toggleClick() {
    navMenu.classList.add("active");
}

// Menu close
function closeClick() {
    navMenu.classList.remove("active");
}

// Menu close saat salah satu menu di klik
const navLink = document.querySelectorAll(".nav-link");
const linkAction = () => {
    navMenu.classList.remove("active");
};
navLink.forEach((n) => n.addEventListener("click", linkAction));

// Animasi Menu Active
const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll(".nav-link");

window.addEventListener("scroll", () => {
    let current = "";

    sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.offsetHeight;

        if (scrollY >= sectionTop - sectionHeight / 3) {
            current = section.getAttribute("id");
        }
    });

    navLinks.forEach((link) => {
        link.classList.remove("active");
        if (link.getAttribute("href") === "#" + current) {
            link.classList.add("active");
        }
    });
});

// Validasi form
const form = document.getElementById("contact-form");
const errorMsg = document.getElementById("error-msg");

const nameInput = document.getElementById("nama");
const emailInput = document.getElementById("email");
const messageInput = document.getElementById("pesan");

[nameInput, emailInput, messageInput].forEach((input) => {
    input.addEventListener("input", () => {
        errorMsg.textContent = "";
    });
});

form.addEventListener("submit", function (e) {
    e.preventDefault();

    const name = nameInput.value.trim();
    const email = emailInput.value.trim();
    const message = messageInput.value.trim();

    // Validasi sederhana
    if (name === "" || email === "" || message === "") {
        errorMsg.textContent = "Semua kolom wajib diisi!";

        if (name === "") {
            nameInput.focus();
        } else if (email === "") {
            emailInput.focus();
        } else if (message === "") {
            messageInput.focus();
        }

        return;
    }

    // Kirim ke WhatsApp
    const nomorWhatsapp = "6282115559500";
    const teks = `Halo, saya ${name}.%0A Email saya: ${email}.%0A ${message}`;
    const url = `https://wa.me/${nomorWhatsapp}?text=${teks}`;

    // Validasi email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        errorMsg.textContent = "Format email tidak valid!";
        email.focus();
        return;
    }

    // Buka WhatsApp di tab baru
    window.open(url, "_blank");

    // Jika semua valid
    errorMsg.textContent = ""; // hapus pesan error
    alert("Form berhasil dikirim!");
    form.reset(); // reset isi form
});

// Validasi Input Email Footer
document
    .getElementById("submit-subs")
    .addEventListener("click", function (event) {
        event.preventDefault();
        const emailInput = document.getElementById("email-input");
        const errorText = document.getElementById("email-error");
        const email = emailInput.value.trim();

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email === "") {
            errorText.textContent = "Email tidak boleh kosong.";
            errorText.style.display = "block";
            emailInput.focus();
        } else if (!emailRegex.test(email)) {
            errorText.textContent = "Format email tidak valid.";
            errorText.style.display = "block";
            emailInput.focus();
        } else {
            errorText.style.display = "none";
            alert("Terima kasih telah subscribe dengan email: " + email);
            emailInput.value = "";
        }
    });
