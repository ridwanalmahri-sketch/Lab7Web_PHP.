<!DOCTYPE html>
<html lang="id">
        <head>
            <meta charset="UTF-8">
            <title>Praktikum PHP</title>
        </head>
                    <body>

                                <h1>Lab 7 Web Menggunakan PHP</h1>

                                <?php
                                    echo "<p>PHP berhasil dijalankan.</p>";
                                    echo "<p>Waktu server: " . date("d-m-Y H:i:s") . "</p>";
                                ?>

                            <h2>
                                <p> Latihan 2 </p>
                            </h2>
                            <?php
                                $nama = "Ridwan";
                                $tugas = 85;
                                $uts = 78;
                                $uas = 90;

                                $nilaiAkhir = ($tugas * 0.30)
                                            + ($uts * 0.30)
                                            + ($uas * 0.40);

                                if ($nilaiAkhir >= 85) {
                                    $predikat = "A";
                                } elseif ($nilaiAkhir >= 75) {
                                    $predikat = "B";
                                } elseif ($nilaiAkhir >= 60) {
                                    $predikat = "C";
                                } else {
                                    $predikat = "D";
                                }

                                echo "Nama: " . htmlspecialchars($nama) . "<br>";
                                echo "Nilai akhir: " . number_format($nilaiAkhir, 2) . "<br>";
                                echo "Predikat: " . $predikat;
                            ?>


                            <h2>
                                <p> Latihan 3 </p>
                            </h2>

                            <?php
                                $mahasiswa = [
                                    "Cecep",
                                    "Ujang",
                                    "Ipul",
                                    "Asep",
                                    "Agus",
                                    "Gagap",
                                    "Epoy"
                                ];

                                echo "<h3>Daftar Mahasiswa</h3>";
                                echo "<ol>";

                                foreach ($mahasiswa as $nama) {
                                    echo "<li>" . htmlspecialchars($nama) . "</li>";
                                }

                                echo "</ol>";
                            ?>

                              <h2>
                                <p> Latihan 4 </p>
                            </h2>
                            <?php
                                function hitungDiskon($harga, $persen) {
                                    $potongan = $harga * ($persen / 100);

                                    return $harga - $potongan;
                                }

                                $hargaAkhir = hitungDiskon(150000, 10);

                                echo "Harga awal: Rp150.000<br>";
                                echo "Diskon: 10%<br>";

                                echo "Harga setelah diskon: Rp"
                                    . number_format($hargaAkhir, 0, ",", ".");
                            ?>

                             <h2>
                                <p> Latihan 5 </p>
                            </h2>
                            <!DOCTYPE html>
                            <html lang="id">
                            <head>
                                <meta charset="UTF-8">
                                <title>Form GET</title>
                            </head>
                            <body>

                                <h2>Pencarian Kata Kunci</h2>

                                <form method="GET" action="">
                                    <label for="kata">Kata kunci:</label>

                                    <input
                                        id="kata"
                                        name="kata"
                                        type="text"
                                    >

                                    <button type="submit">Cari</button>
                                </form>

                                <?php
                                    if (isset($_GET["kata"])) {
                                        $kata = trim($_GET["kata"]);

                                        echo "<p>Kata kunci: "
                                            . htmlspecialchars(
                                                $kata,
                                                ENT_QUOTES,
                                                "UTF-8"
                                            )
                                            . "</p>";
                                    }
                                ?>

                             <h2>
                                <p> Latihan 6 </p>
                            </h2>

                            <!DOCTYPE html>
                            <html lang="id">
                            <head>
                                <meta charset="UTF-8">
                                <title>Form POST</title>
                            </head>
                            <body>

                                <h2>Form Data Mahasiswa</h2>

                                <form method="POST" action="">

                                    <label for="nama">Nama:</label>
                                    <input
                                        id="nama"
                                        name="nama"
                                        type="text"
                                        required
                                    >

                                    <br><br>

                                    <label for="prodi">Program Studi:</label>
                                    <input
                                        id="prodi"
                                        name="prodi"
                                        type="text"
                                        required
                                    >

                                    <br><br>

                                    <button type="submit" name="kirim">
                                        Kirim Data
                                        <button type="reset">Reset</button>
                                    </button>

                                </form>
                                <?php
                                    if ($_SERVER["REQUEST_METHOD"] === "POST") {

                                        $nama = trim($_POST["nama"] ?? "");
                                        $prodi = trim($_POST["prodi"] ?? "");

                                        if ($nama === "" || $prodi === "") {

                                            echo "<p>Semua kolom wajib diisi.</p>";

                                        } else {

                                            echo "<h3>Data diterima</h3>";

                                            echo "Nama: "
                                                . htmlspecialchars(
                                                    $nama,
                                                    ENT_QUOTES,
                                                    "UTF-8"
                                                )
                                                . "<br>";

                                            echo "Program Studi: "
                                                . htmlspecialchars(
                                                    $prodi,
                                                    ENT_QUOTES,
                                                    "UTF-8"
                                                );
                                        }
                                    }
                                ?>

                            <h2>
                                <p> Latihan 7 </p>
                            </h2>
                            <?php
                                $error = "";
                                $hasil = null;

                                if ($_SERVER["REQUEST_METHOD"] === "POST") {

                                    $barang = trim($_POST["barang"] ?? "");
                                    $hargaInput = $_POST["harga"] ?? "";
                                    $jumlahInput = $_POST["jumlah"] ?? "";

                                    if (
                                        $barang === "" ||
                                        !is_numeric($hargaInput) ||
                                        !ctype_digit((string)$jumlahInput) ||
                                        (float)$hargaInput < 0 ||
                                        (int)$jumlahInput < 1
                                    ) {
                                        $error = "Periksa kembali nama barang, harga, dan jumlah.";

                                    } else {

                                        $harga = (float)$hargaInput;
                                        $jumlah = (int)$jumlahInput;

                                        $subtotal = $harga * $jumlah;

                                        $hasil = [
                                            "barang" => $barang,
                                            "harga" => $harga,
                                            "jumlah" => $jumlah,
                                            "subtotal" => $subtotal
                                        ];
                                    }
                                }
                            ?>

                            <!DOCTYPE html>
                            <html lang="id">
                            <head>
                                <meta charset="UTF-8">
                                <title>Pengolahan Data Barang</title>
                            </head>
                            <body>

                                <h2>Form Transaksi Barang</h2>

                                <form method="POST">

                                    <label>Nama Barang:</label>
                                    <input name="barang" required>

                                    <br><br>

                                    <label>Harga:</label>
                                    <input
                                        name="harga"
                                        type="number"
                                        min="0"
                                        step="0.01"
                                        required
                                    >

                                    <br><br>

                                    <label>Jumlah:</label>
                                    <input
                                        name="jumlah"
                                        type="number"
                                        min="1"
                                        step="1"
                                        required
                                    >

                                    <br><br>

                                    <button type="submit">Hitung</button>

                                </form>

                                <?php
                                    if ($error !== "") {

                                        echo "<p>"
                                            . htmlspecialchars($error)
                                            . "</p>";

                                    } elseif ($hasil !== null) {

                                        echo "<h3>Ringkasan Transaksi</h3>";

                                        echo "Barang: "
                                            . htmlspecialchars($hasil["barang"])
                                            . "<br>";

                                        echo "Harga: Rp"
                                            . number_format($hasil["harga"], 0, ",", ".")
                                            . "<br>";

                                        echo "Jumlah: "
                                            . $hasil["jumlah"]
                                            . "<br>";

                                        echo "Subtotal: Rp"
                                            . number_format($hasil["subtotal"], 0, ",", ".");
                                    }
                                ?>

                             </body>
                        </html>
                    </body>
                </html>
            </body>
        </html>
    </body>
</html>