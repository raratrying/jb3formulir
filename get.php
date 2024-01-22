<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nomor Panggung</title>
    <style>
        body {
            background-color: #f0f0f0;
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
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            color: #333;
        }

        p {
            margin: 10px 0;
            color: #555;
        }

        strong {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Ambil data yang dikirimkan melalui form
        $stageName = $_GET["namapanggung"];
        $email = $_GET["email"];

        // Generate nomor panggung secara acak (misalnya, dari 1 hingga 100)
        $randomStageNumber = mt_rand(1, 100);

        // Tampilkan data yang telah diisi
        echo "<h2>Data Nomor Panggung:</h2>";
        echo "<p><strong>Stage Name:</strong> $stageName</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Nomor Panggung:</strong> $randomStageNumber</p>";
    } 
    ?>
</div>

</body>
</html>
