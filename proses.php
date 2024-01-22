<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftaran</title>
    <style>
        body {
            background-color: #f0f0f0; /* Ganti warna background sesuai keinginan Anda */
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff; /* Ganti warna background sesuai keinginan Anda */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            color: #333; /* Ganti warna teks sesuai keinginan Anda */
        }

        p {
            margin: 10px 0;
            color: #555; /* Ganti warna teks sesuai keinginan Anda */
        }

        strong {
            font-weight: bold;
        }

        .button-container {
            margin-top: 20px;
        }

        .button-container a {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #3498db;
            color: #fff;
            border-radius: 5px;
        }

        .button-container a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validasi Nama
        if (empty($_POST["nama"])) {
            $errors[] = "Nama harus diisi";
        } else {
            $realName = $_POST["nama"];
        }

        // Validasi Stage Name
        if (empty($_POST["namapanggung"])) {
            $errors[] = "Stage Name harus diisi";
        } else {
            $stageName = $_POST["namapanggung"];
        }

        // Validasi Email
        if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email tidak valid";
        } else {
            $email = $_POST["email"];
        }

        // Validasi Nomor Telepon
        if (empty($_POST["telepon"]) || !preg_match("/^[0-9]+$/", $_POST["telepon"])) {
            $errors[] = "Nomor Telepon hanya boleh berisi angka";
        } else {
            $phoneNumber = $_POST["telepon"];
        }

        // Validasi Metode Pembayaran
        $allowedPaymentMethods = ["transfer_bank", "pulsa", "ewallet"];
        if (empty($_POST["metode_pembayaran"]) || !in_array($_POST["metode_pembayaran"], $allowedPaymentMethods)) {
            $errors[] = "Pilih metode pembayaran yang valid";
        } else {
            $paymentMethod = $_POST["metode_pembayaran"];
        }

        // Jika terdapat kesalahan, tampilkan pesan kesalahan
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo '<p style="color: red;">' . $error . '</p>';
            }
        } else {
            // Jika tidak ada kesalahan, tampilkan data yang telah diisi
            echo "<h2>Data Pendaftaran:</h2>";
            echo "<p><strong>Real Name:</strong> $realName</p>";
            echo "<p><strong>Stage Name:</strong> $stageName</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Nomor Telepon:</strong> $phoneNumber</p>";
            echo "<p><strong>Metode Pembayaran:</strong> $paymentMethod</p>";

            echo '<div class="button-container">';
            echo '<a href="no.html?namapanggung=' . urlencode($stageName) . '">Lihat Nomor Panggung</a>';
            echo '</div>';
        }
    } else {
        // Jika bukan metode POST, kembalikan ke halaman utama atau lakukan sesuai kebutuhan
        header("Location: no.html");
        exit();
    }
    ?>
</div>

</body>
</html>