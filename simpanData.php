<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "haxexport_db";

header('Content-Type: application/json');

$conn = new mysqli($hostname, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Koneksi database gagal: ' . $conn->connect_error
    ]);
    exit;
}

// Periksa apakah request adalah POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'status' => 'error',
        'message' => 'Method tidak diizinkan'
    ]);
    exit;
}

// Tangkap dan sanitasi data dari form
$D_namaLengkap     = trim($_POST['namaLengkap'] ?? '');
$D_namaPerusahaan  = trim($_POST['namaPerusahaan'] ?? '');
$D_emailAddress    = trim($_POST['emailAddress'] ?? '');
$D_negara          = trim($_POST['negara'] ?? '');
$D_pesan           = trim($_POST['pesan'] ?? '');

// Validasi data
$errors = [];

if (empty($D_namaLengkap)) {
    $errors[] = 'Nama Lengkap wajib diisi';
}

if (empty($D_emailAddress)) {
    $errors[] = 'Email wajib diisi';
} elseif (!filter_var($D_emailAddress, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid';
}

if (empty($D_namaPerusahaan)) {
    $errors[] = 'Nama Perusahaan wajib diisi';
}

if (empty($D_negara)) {
    $errors[] = 'Negara wajib diisi';
}

if (empty($D_pesan)) {
    $errors[] = 'Pesan wajib diisi';
}

// Jika ada error validasi
if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => 'Data tidak valid',
        'errors' => $errors
    ]);
    exit;
}

// Buat prepared statement untuk keamanan
$sql = "INSERT INTO form_kontak (namaLengkap, namaPerusahaan, emailAddress, negara, pesan, tanggal_submit) VALUES (?, ?, ?, ?, ?, NOW())";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Prepare statement gagal: ' . $conn->error
    ]);
    exit;
}

// Parameter
$stmt->bind_param("sssss", $D_namaLengkap, $D_namaPerusahaan, $D_emailAddress, $D_negara, $D_pesan);

// Eksekusi query
if ($stmt->execute()) {
    http_response_code(200);
    echo json_encode([
        'status' => 'success',
        'message' => 'Data berhasil disimpan',
        'data' => [
            'id' => $conn->insert_id,
            'nama' => $D_namaLengkap,
            'email' => $D_emailAddress,
            'perusahaan' => $D_namaPerusahaan
        ]
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Gagal menyimpan data: ' . $stmt->error
    ]);
}

// Tutup statement dan connection
$stmt->close();
$conn->close();
?>