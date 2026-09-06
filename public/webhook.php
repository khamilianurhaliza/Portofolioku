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

try {
    // Cek apakah exec() didisable di server ini
    if (!function_exists('exec')) {
        throw new Exception("Fungsi exec() didisable oleh server (shared hosting).");
    }

    // Menjalankan perintah GIT PULL secara manual
    // Pastikan path repository di bawah ini sesuai
    $repo_path = '/home/mcfjohay/porto';
    $deploy_path = '/home/mcfjohay/public_html';
    
    $command = "cd {$repo_path} && git pull origin main 2>&1";
    exec($command, $output, $return_var);

    // Jika git pull berhasil (return 0) atau already up to date, lanjutkan copy (deploy)
    if ($return_var === 0) {
        $output[] = "Git pull sukses. Mengeksekusi deploy (hanya folder public)...";
        // Hanya menyalin isi dari folder 'public' ke 'public_html'
        // Mengeksklusikan file app, config, rute agar tidak bisa diakses langsung via web
        $deploy_cmd = "cp -R {$repo_path}/public/* {$deploy_path}/ 2>&1";
        exec($deploy_cmd, $deploy_out, $deploy_var);
        
        $output = array_merge($output, $deploy_out);
        $return_var = $deploy_var; // Mengambil status dari copy
    }

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
} catch (Exception $e) {
    http_response_code(500);
    $errorMsg = "Error: " . $e->getMessage() . "\n";
    file_put_contents('webhook.log', date('Y-m-d H:i:s') . " - " . $errorMsg, FILE_APPEND);
    echo $errorMsg;
}
