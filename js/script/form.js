// Fungsionalitas untuk mengelola form kontak
const contactModal = new bootstrap.Modal(
  document.getElementById("contactModal")
);
const successModal = new bootstrap.Modal(
  document.getElementById("successModal")
);
const contactForm = document.getElementById("contactForm");

// Menangani kontak form submission dengan AJAX
contactForm.addEventListener("submit", function (e) {
  e.preventDefault();
  const formData = new FormData(this); // Ambil data dari form
  if (!validateForm()) {
    return;
  }

  // Show loading state
  const submitBtn = this.querySelector('button[type="submit"]');
  const originalText = submitBtn.textContent;
  submitBtn.textContent = "Mengirim...";
  submitBtn.disabled = true;

  // Send data using fetch API
  fetch("simpanData.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => {
      console.log("Server response:", data);
      contactModal.hide(); // Hide contact modal
      successModal.show(); // Show success modal
      contactForm.reset(); // Reset form
      submitBtn.textContent = originalText;
      submitBtn.disabled = false;
    })
    .catch((error) => {
      console.error("Error:", error);
      showError("Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.");
      submitBtn.textContent = originalText;
      submitBtn.disabled = false;
    });
});

// Fungsi form validation
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
      showError(
        `Field ${fieldName
          .replace(/([A-Z])/g, " $1")
          .toLowerCase()} harus diisi.`
      );
      field.focus();
      return false;
    }
  }

  // Validasi email format
  const emailField = document.getElementById("emailAddress");
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(emailField.value)) {
    showError("Format email tidak valid.");
    emailField.focus();
    return false;
  }

  return true;
}

// Menampilkan fungsi eror
function showError(message) {
  let existingAlert = document.querySelector(".alert-danger");
  if (existingAlert) {
    existingAlert.remove();
  }

  const alertDiv = document.createElement("div");
  alertDiv.className = "alert alert-danger alert-dismissible fade show";
  alertDiv.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
  contactForm.parentNode.insertBefore(alertDiv, contactForm);

  setTimeout(() => {
    if (alertDiv.parentNode) {
      alertDiv.remove();
    }
  }, 5000);
}

// Otomatis mengatur tinggi textarea
const textarea = document.getElementById("pesan");
textarea.addEventListener("input", function () {
  this.style.height = "auto";
  this.style.height = this.scrollHeight + "px";
});

// Fokus input effect
document.querySelectorAll(".form-control").forEach((input) => {
  input.addEventListener("focus", function () {
    this.parentNode.classList.add("focused");
  });

  input.addEventListener("blur", function () {
    if (this.value === "") {
      this.parentNode.classList.remove("focused");
    }
  });

  if (input.value !== "") {
    input.parentNode.classList.add("focused");
  }
});
