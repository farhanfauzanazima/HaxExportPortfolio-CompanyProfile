// Fungsi Formulir Kontak
const contactForm = document.getElementById("contactForm");
const messageContainer = document.getElementById("messageContainer");

// Proses submit formulir kontak
contactForm.addEventListener("submit", function (e) {
  e.preventDefault();

  if (!validateForm()) { // Validasi formulir
    return;
  }

  const formData = new FormData(this); // Ambil data formulir
  const submitBtn = this.querySelector('button[type="submit"]'); // Tampilkan status loading
  const originalText = submitBtn.textContent;
  submitBtn.textContent = "Mengirim...";
  submitBtn.disabled = true;
  clearMessages(); // Bersihkan pesan sebelumnya

  fetch("simpanData.php", {
    method: "POST", // Kirim data
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        showMessage(
          "success",
          "Terima kasih! Pesan Anda telah berhasil dikirim. Tim CocoExport akan segera menghubungi Anda dalam 1x24 jam."
        );
        contactForm.reset();
      } else {
        showMessage(
          "error",
          data.message || "Terjadi kesalahan saat mengirim pesan."
        );
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      showMessage("error", "Terjadi kesalahan jaringan. Silakan coba lagi.");
    })
    .finally(() => {
      submitBtn.textContent = originalText; // Reset tombol
      submitBtn.disabled = false;
    });
});

// Fungsi validasi formulir
function validateForm() {
  const requiredFields = [
    "namaLengkap",
    "emailAddress",
    "namaPerusahaan",
    "negara",
    "pesan",
  ];

  for (let fieldName of requiredFields) {
    const field = document.getElementById(fieldName);
    if (!field.value || field.value.trim() === "") {
      showMessage("error", `Field ${getFieldLabel(fieldName)} harus diisi.`);
      field.focus();
      return false;
    }
  }

  // Validasi email
  const emailField = document.getElementById("emailAddress");
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(emailField.value)) {
    showMessage("error", "Format email tidak valid.");
    emailField.focus();
    return false;
  }

  return true;
}

// Fungsi bantuan untuk label field
function getFieldLabel(fieldName) {
  const labels = {
    namaLengkap: "Nama Lengkap",
    emailAddress: "Email Address",
    namaPerusahaan: "Nama Perusahaan",
    negara: "Negara",
    pesan: "Pesan",
  };
  return labels[fieldName] || fieldName;
}

// Fungsi untuk menampilkan pesan
function showMessage(type, message) {
  const alertClass = type === "success" ? "alert-success" : "alert-danger";
  const iconClass =
    type === "success" ? "fas fa-check-circle" : "fas fa-exclamation-triangle";

  const alertDiv = document.createElement("div");
  alertDiv.className = `alert ${alertClass} alert-dismissible fade show mb-4`;
  alertDiv.innerHTML = `
                <i class="${iconClass} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
  messageContainer.appendChild(alertDiv);
  alertDiv.scrollIntoView({
    behavior: "smooth", // Scroll ke pesan
    block: "center",
  });

  if (type === "success") {
    setTimeout(() => { // Otomatis hilang setelah 8 detik untuk pesan sukses
      if (alertDiv.parentNode) {
        alertDiv.remove();
      }
    }, 8000);
  }
}

// Fungsi untuk membersihkan pesan
function clearMessages() {
  messageContainer.innerHTML = "";
}

// Auto-resize textarea
const textarea = document.getElementById("pesan");
textarea.addEventListener("input", function () {
  this.style.height = "auto";
  this.style.height = this.scrollHeight + "px";
});
