<?php
// File tempat menyimpan tulisan cinta
$file = 'tulisan_cinta.txt';
$message = '';

// Simpan tulisan kalau form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tulisan = $_POST['tulisan'] ?? '';
    if (file_put_contents($file, $tulisan)) {
        $message = "💖 Tulisanmu berhasil disimpan, siap dibaca dia!";
    } else {
        $message = "😢 Gagal menyimpan tulisan. Coba lagi ya.";
    }
}

// Ambil isi sekarang
$isi_sekarang = file_exists($file) ? file_get_contents($file) : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tulis Pesan Cinta</title>
    <style>
        body { background: #fff0f5; font-family: sans-serif; padding: 30px; text-align: center; color: #800040; }
        textarea { width: 90%; height: 300px; padding: 10px; font-size: 16px; border: 2px solid #800040; border-radius: 10px; }
        button { margin-top: 10px; padding: 10px 20px; background: #800040; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; }
        .message { margin: 20px 0; font-weight: bold; }
    </style>
</head>
<body>
    <h1>💌 Tulis Pesan Cinta Untuk Dia</h1>
    <?php if ($message): ?>
        <p class="message"><?= $message ?></p>
    <?php endif; ?>
    <form method="post">
        <textarea name="tulisan" placeholder="Tulis isi hatimu di sini..."><?= htmlspecialchars($isi_sekarang) ?></textarea><br>
        <button type="submit">Simpan Pesan</button>
    </form>
    <p><a href="baca.php" style="color:#800040; text-decoration: none;">➡️ Lihat Halaman Baca (untuk dia)</a></p>
</body>
</html>
