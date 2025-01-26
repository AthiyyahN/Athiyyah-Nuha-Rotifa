<?php
session_start();

// Konfigurasi username dan password
$valid_username = "user";
$valid_password = "password";

// Proses login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        $error_message = "Username atau password salah!";
    }
}

// Proses logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio & Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background:rgb(240, 82, 9);
            color: white;
            padding: 10px;
            text-align: center;
        }
        header marquee {
            font-size: 24px;
            font-weight: bold;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
        h1 {
            text-align: center;
        }
        h2 {
            text-align: center;
            margin-top: 50px;
        }
        .login-form, .portfolio {
            margin-top: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
        }
        input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px;
            background: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .portfolio {
            margin-top: 20px;
        }
        .portfolio img {
            max-width: 150px;
            height: auto;
            border-radius: 50%;
            margin-bottom: 15px;
        }
        .portfolio .item {
            margin: 10px 0;
            padding: 10px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .portfolio .item p {
            font-size: 16px;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <header>
        <marquee>Welcome to My Portfolio Website!</marquee>
    </header>

    <div class="container">
        <?php if (!isset($_SESSION['username'])): ?>
            <!-- Halaman Login -->
            <h2>Login</h2>
            <?php if (isset($error_message)): ?>
                <p class="error"><?= $error_message; ?></p>
            <?php endif; ?>
            <form action="index.php" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <button type="submit" name="login">Login</button>
            </form>
        <?php else: ?>
            <!-- Halaman Portfolio -->
            <h1>Athiyyah Nuha Rotifa</h1>
            <h2>About Me</h2>
            <div class="portfolio">
                <!-- Foto Profil -->
                <img src="Formal.jpg" alt="Profile Picture">
                
                <!-- Deskripsi -->
                <p>Saya merupakan mahasiswa aktif jurusan sistem informasi, Fakultas ilmu komputer, Universitas Sriwijaya. Saya pernah terlibat aktif dalam organisasi jurusan, yaitu Himpunan Mahasiswa Sistem Informasi UNSRI atau disingkat menjadi HIMSI. Dengan pengalamam saya di Himsi, saya melewati proses yang membuat saya lebih berkembang terutama dalam bidang sosialisasi, mengasah public speaking dan Mengurus aktif sosial media untuk menyebarkan berbagai informamsi terutama untuk mahasiswa sistem informasi.</p>
                
                <!-- Kontak -->
                <div class="item">
                    <h3>Contact Information</h3>
                    <p>Email: Athiyyah@gmail.com</p>
                    <p>Phone: 081367551759</p>
                </div>
            </div>
            <a href="index.php?logout=true">Logout</a>
        <?php endif; ?>
    </div>

</body>
</html>
