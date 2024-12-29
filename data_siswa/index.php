<?php
session_start();
include 'connect.php';
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $usia = $_POST['usia'];

    $query = "INSERT INTO mahasiswa (nim, nama, prodi, usia) VALUES ('$nim', '$nama', '$prodi', '$usia')";
    if(mysqli_query($connect, $query)){
        echo "Data berhasil ditambahkan";        
    } else {
        echo "Error" . mysqli_error($connect);
    }
}
$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Data Mahasiswa</title>
</head>
<body>
    <div class="container">
        <h1>Form Data Mahasiswa</h1>
        <form method="post">
            <div class="form-group">
                <label>NIM:</label>
                <input type="number" name="nim" required><br><br>
            </div>
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" required><br><br>
            </div>
            <div class="form-group">
                <label>Program Studi:</label>
                <input type="text" name="prodi" required><br><br>
            </div>
            <div class="form-group">
                <label>Usia:</label>
                <input type="number" name="usia" required><br><br>
            </div>
            <button type="submit">Tambah data</button>
        </form>
    </div>

    <h2>Daftar Mahasiswa</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Usia</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nim']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['prodi']; ?></td>
                    <td><?php echo $row['usia']; ?></td>
                </tr>
                <?php endwhile; ?>
        </tbody>
    </table>

    <br>
    <p align="center">Sudah selesai <a href="logout.php">Logout</a><p>
</body>
</html>