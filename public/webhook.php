<?php
// Secret token to secure your webhook (Opsional tapi disarankan)
// Masukkan token ini nanti di kolom "Secret" pada pengaturan Webhook GitHub
$secret = 'RAHASIA_PORTFOLIO_123'; 

// Cek method harus POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die('Method Not Allowed');
}

// (Opsional) Validasi Secret dari GitHub
$payload = file_get_contents('php://input');
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'] ?? '';

if ($signature) {
    $hash = 'sha1=' . hash_hmac('sha1', $payload, $secret);
    if (!hash_equals($hash, $signature)) {
        http_response_code(403);
        die('Forbidden: Invalid Signature');
    }
}

// Menjalankan command UAPI cPanel untuk update dan deploy dari remote
// Sesuaikan /home/mcfjohay/porto dengan path repository kamu di cPanel
$command = '/usr/local/cpanel/bin/uapi VersionControl update_repository repository_root=/home/mcfjohay/porto 2>&1';
exec($command, $output, $return_var);

// Log output untuk debugging
$log = date('Y-m-d H:i:s') . "\n";
$log .= "Return Code: " . $return_var . "\n";
$log .= "Output:\n" . implode("\n", $output) . "\n";
$log .= "-------------------------\n";
file_put_contents('webhook.log', $log, FILE_APPEND);

if ($return_var === 0) {
    echo "Deploy Berhasil!";
} else {
    http_response_code(500);
    echo "Deploy Gagal! Cek webhook.log";
}
