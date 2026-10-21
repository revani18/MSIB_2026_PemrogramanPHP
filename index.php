<?php
$nama = "";
$email = "";
$nilai = "";
$status = "";
$submitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $nilai = $_POST["nilai"];
    $submitted = true;

    if ($nilai > 70) {
        $status = "Lulus";
    } elseif ($nilai < 70) {
        $status = "Remedial";
    } else {
        $status = "Nilai tepat 70 Lulus";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 1 - PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>FORMULIR NILAI UJIAN</h2>
            <p>Masukkan data diri dan nilai ujian untuk melihat hasil kelulusan.</p>
        </div>

        <form method="POST" action="">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Lengkap Anda..." value="<?php echo htmlspecialchars($nama); ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukan Email Anda...email@gmail.com" value="<?php echo htmlspecialchars($email); ?>" required>

            <label for="nilai">Nilai Ujian</label>
            <input type="number" id="nilai" name="nilai" placeholder="Masukkan Nilai Ujian Anda..." min="0" max="100" value="<?php echo htmlspecialchars((string)$nilai); ?>" required>

            <button type="submit">Periksa Hasil Ujian</button>
        </form>

        <?php if ($submitted) { ?>
            <div class="hasil">
                <h3>HASIL UJIAN</h3>

                <div class="detail">
                    <strong>Nama:</strong>
                    <?php echo htmlspecialchars($nama); ?>
                </div>

                <div class="detail">
                    <strong>Email:</strong>
                    <?php echo htmlspecialchars($email); ?>
                </div>

                <div class="detail">
                    <strong>Nilai Ujian:</strong>
                    <?php echo htmlspecialchars((string)$nilai); ?>
                </div>

                <div class="status <?php
                    if ($nilai > 70) {
                        echo 'lulus';
                    } elseif ($nilai < 70) {
                        echo 'remedial';
                    } else {
                        echo 'pas';
                    }
                ?>">
                    <p>Status Kelulusan</p>
                    <h4><?php echo $status; ?></h4>
                </div>
            </div>
        <?php } ?>

        <div class="footer">
            Revani - STTNF - Tugas1 - Pemrograman PHP
        </div>
    </div>

</body>
</html>