<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CocoExport - Kontak</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style/style.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="index.php">
                <img src="image/logoHaxGrup.png" alt="CocoExport Logo" width="50" height="50"
                    class="me-2">
                <u><i>PT. Hax Trade Export</i></u> | HaxExpot
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" href="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tentangKami.php">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produk.php">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="kontak.php">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bagian pertama -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 fw-bold mb-4">Selamat Datang di CocoExport</h1>
                    <p class="lead mb-4">
                        Mitra terpercaya untuk produk turunan kelapa berkualitas tinggi. Kami berkomitmen pada sumber
                        berkelanjutan dan pengiriman global.
                    </p>
                    <button class="btn btn-dark btn-lg contact-trigger" data-bs-toggle="modal"
                        href="#contactModal">
                        Hubungi Kami
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Bagian ke dua -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Produk Berkualitas</h5>
                            <p class="card-text">Kami menyediakan produk kelapa terbaik dengan standar internasional.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pelayanan Terpercaya</h5>
                            <p class="card-text">Tim profesional kami siap melayani kebutuhan ekspor Anda dengan
                                terpercaya.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jangkauan Global</h5>
                            <p class="card-text">Produk kami telah diekspor ke lebih dari 50 negara di seluruh dunia.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bagian modal pop up untuk form kontak -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body px-5 pb-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-dark">Kontak Kami</h2>
                    </div>

                    <!-- Isi form kontak -->
                    <form id="contactForm" class="contact-form" method="POST" action="simpanData.php">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="namaLengkap" class="form-label fw-bold text-dark">Nama Lengkap</label>
                                <input
                                    type="text"
                                    class="form-control form-control-lg"
                                    id="namaLengkap"
                                    name="namaLengkap"
                                    placeholder="Masukkan nama lengkap"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="emailAddress" class="form-label fw-bold text-dark">Email Address</label>
                                <input
                                    type="email"
                                    class="form-control form-control-lg"
                                    id="emailAddress"
                                    name="emailAddress"
                                    placeholder="Masukkan email"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="namaPerusahaan" class="form-label fw-bold text-dark">Nama Perusahaan</label>
                                <input
                                    type="text"
                                    class="form-control form-control-lg"
                                    id="namaPerusahaan"
                                    name="namaPerusahaan"
                                    placeholder="Masukkan nama perusahaan"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="negara" class="form-label fw-bold text-dark">Negara</label>
                                <input
                                    type="text"
                                    class="form-control form-control-lg"
                                    id="negara"
                                    name="negara"
                                    placeholder="Masukkan negara"
                                    required>
                            </div>
                            <div class="col-12">
                                <label for="pesan" class="form-label fw-bold text-dark">Pesan</label>
                                <textarea
                                    class="form-control form-control-lg"
                                    id="pesan"
                                    name="pesan"
                                    rows="6"
                                    placeholder="Tulis pesan Anda di sini..."
                                    required></textarea>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-dark btn-lg px-5 py-3 fw-bold">
                                    Kirim Pesan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian sukses dari modal pop up -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <div class="success-icon mb-3">
                        <svg width="64" height="64" fill="currentColor" class="text-success" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.061L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                        </svg>
                    </div>
                    <h3 class="fw-bold mb-3">Pesan Terkirim!</h3>
                    <p class="mb-4">Terima kasih telah menghubungi kami. Tim CocoExport akan segera merespons pesan Anda dalam 1x24 jam.</p>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="fw-bold">CocoExport</h5>
                    <p class="mb-0">Ekspor produk kelapa berkualitas tinggi ke seluruh dunia.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">&copy; 2025 CocoExport. All rights reserved.</p>
                    <div class="mt-2">
                        <a href="#" class="text-white me-3">Privacy Policy</a>
                        <a href="#" class="text-white">Terms of Service</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script/form.js"></script>
</body>
</html>