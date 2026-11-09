<?php
    $data = null;
    $error = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Mengambil data dari form
        $nama = trim($_POST["nama"] ?? "");
        $nim = trim($_POST["nim"] ?? "");
        $prodi = trim($_POST["prodi"] ?? "");
        $semesterInput = $_POST["semester"] ?? "";
        $email = trim($_POST["email"] ?? "");

        // Validasi nama
        if ($nama === "") {
            $error[] = "Nama wajib diisi.";
        }

        // Validasi NIM
        if ($nim === "") {
            $error[] = "NIM wajib diisi.";
        }

        // Validasi program studi
        if ($prodi === "") {
            $error[] = "Program studi wajib diisi.";
        }

        // Validasi email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error[] = "Format email tidak valid.";
        }

        // Validasi semester
        if (
            !ctype_digit((string)$semesterInput) ||
            (int)$semesterInput < 1 ||
            (int)$semesterInput > 14
        ) {
            $error[] = "Semester harus berupa angka 1–14.";
        }

        // Jika tidak ada kesalahan
        if (!$error) {

            $data = [
                "nama" => $nama,
                "nim" => $nim,
                "prodi" => $prodi,
                "semester" => (int)$semesterInput,
                "email" => $email
            ];
        }
    }
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Data Mahasiswa</title>
</head>

<body>

    <h2>Formulir Data Mahasiswa</h2>

    <form method="POST" action="">

        <label>Nama Mahasiswa:</label>
        <input type="text" name="nama" required>

        <br><br>

        <label>NIM:</label>
        <input type="text" name="nim" required>

        <br><br>

        <label>Program Studi:</label>
        <input type="text" name="prodi" required>

        <br><br>

        <label>Semester:</label>
        <input
            type="number"
            name="semester"
            min="1"
            max="14"
            required
        >

        <br><br>

        <label>Email:</label>
        <input type="email" name="email" required>

        <br><br>

        <button type="submit">Kirim Data</button>

        <button type="reset">Reset</button>

    </form>

    <?php if (!empty($error)): ?>

        <h3>Terjadi Kesalahan:</h3>

        <ul>
            <?php foreach ($error as $pesan): ?>
                <li>
                    <?= htmlspecialchars(
                        $pesan,
                        ENT_QUOTES,
                        "UTF-8"
                    ) ?>
                </li>
            <?php endforeach; ?>
        </ul>

    <?php endif; ?>


    <?php if ($data !== null): ?>

        <h3>Data Mahasiswa Berhasil Diterima</h3>

        <table border="1" cellpadding="8">

            <tr>
                <td>Nama</td>
                <td>
                    <?= htmlspecialchars($data["nama"], ENT_QUOTES, "UTF-8") ?>
                </td>
            </tr>

            <tr>
                <td>NIM</td>
                <td>
                    <?= htmlspecialchars($data["nim"], ENT_QUOTES, "UTF-8") ?>
                </td>
            </tr>

            <tr>
                <td>Program Studi</td>
                <td>
                    <?= htmlspecialchars($data["prodi"], ENT_QUOTES, "UTF-8") ?>
                </td>
            </tr>

            <tr>
                <td>Semester</td>
                <td>
                    <?= $data["semester"] ?>
                </td>
            </tr>

            <tr>
                <td>Email</td>
                <td>
                    <?= htmlspecialchars($data["email"], ENT_QUOTES, "UTF-8") ?>
                </td>
            </tr>

        </table>

    <?php endif; ?>

</body>
</html>