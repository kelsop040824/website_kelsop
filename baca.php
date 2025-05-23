<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$file = 'tulisan_cinta.txt';
$isi = file_exists($file) ? file_get_contents($file) : 'belum ada longteks 😢';

// Jika tombol ditekan, redirect ke love.php
if (isset($_POST['lanjut'])) {
    header("Location: love.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>longteks buat cowo aku</title>
    <style>
        /* style sama seperti sebelumnya */
        body { background: #ffe6f0; font-family: sans-serif; padding: 50px; text-align: center; color: #b30059; }
        .box {
            background: white;
            border-radius: 15px;
            padding: 30px;
            max-width: 700px;
            margin: auto;
            box-shadow: 0 0 20px rgba(179, 0, 89, 0.2);
            font-size: 18px;
            white-space: pre-wrap;
        }
        .btn-next {
            margin-top: 30px;
            padding: 12px 25px;
            background: #b30059;
            color: white;
            border-radius: 10px;
            font-weight: bold;
            font-size: 18px;
            cursor: pointer;
            border: none;
        }
        .btn-next:hover {
            background: #ff3399;
        }
    </style>
</head>
<body>
    <h1>💕 pesan untuk ndoll</h1>
    <div class="box">
        <?= nl2br(htmlspecialchars($isi)) ?>
    </div>

    <form method="post">
        <button type="submit" name="lanjut" class="btn-next">lanjut ke halaman terakhir 💖</button>
    </form>
</body>
</html>
