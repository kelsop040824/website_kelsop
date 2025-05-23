<?php
session_start();

// Data user contoh
$users = [
    'sipa' => '143209',
    'kelpin' => '1119208',
    'kelsop' => '040824'
];

$message = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['user'] = $username;
        // Redirect ke baca.php
        header("Location: baca.php");
        exit;
    } else {
        $message = "sayang, username atau passwordnya salah. coba lagi ya... 😢";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Login Bucin</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #ffe6f0;
            color: #b30059;
            text-align: center;
            padding: 50px;
        }
        input[type=text], input[type=password] {
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #b30059;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #b30059;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-weight: bold;
        }
        button:hover {
            background-color: #ff3399;
        }
        .message {
            margin: 20px 0;
            font-size: 18px;
            font-weight: bold;
        }
        .logout {
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <h1>login 💕</h1>

    <?php if (isset($_SESSION['user'])): ?>
        <p class="message">Kamu sudah login sebagai <strong><?= htmlspecialchars($_SESSION['user']) ?></strong>.</p>
        <div class="logout">
            <a href="?logout=1" style="color:#b30059; font-weight:bold;">logout 💔</a>
        </div>
    <?php else: ?>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Masukkan username kamu sayang" required><br>
            <input type="password" name="password" placeholder="Masukkan password rahasiamu" required><br>
            <button type="submit" name="login">login 💘</button>
        </form>
        <?php if ($message): ?>
            <p class="message"><?= $message ?></p>
        <?php endif; ?>
    <?php endif; ?>

</body>
</html>
