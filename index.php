<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tiket Online Jakarta - Malaysia</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .form-box { width: 400px; border: 2px solid #000; padding: 20px; }
        .row { margin-bottom: 15px; }
        label { display: inline-block; width: 140px; }
        .result { margin-top: 20px; padding: 15px; border: 1px dashed #333; background: #f9f9f9; }
    </style>
</head>
<body>

<div class="form-box">
    <h3>Tiket Online Jakarta - Malaysia</h3>
    <form action="" method="POST">
        <div class="row">
            <label>Nama:</label>
            <input type="text" name="nama" required>
        </div>
        
        <div class="row">
            <label>Pilih Kode Pesawat:</label>
            <select name="kode_pesawat">
                <option value="GRD">GRD</option>
                <option value="GA">Garuda (GA)</option>
                <option value="QZ">AirAsia (QZ)</option>
            </select>
        </div>
        
        <div class="row">
            <label>Pilih Kelas:</label>
            <input type="radio" name="kelas" value="Eksekutif" required> Eksekutif<br>
            <span style="margin-left: 144px;"></span>
            <input type="radio" name="kelas" value="Bisnis"> Bisnis<br>
            <span style="margin-left: 144px;"></span>
            <input type="radio" name="kelas" value="Ekonomi"> Ekonomi
        </div>
        
        <div class="row">
            <label>Jumlah Tiket:</label>
            <select name="jumlah_tiket">
                <?php for($i=1; $i<=10; $i++): ?>
                    <option value="<?= $i; ?>"><?= $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>
        
        <div class="row">
            <button type="submit" name="simpan">SIMPAN</button>
            <button type="reset">BATAL</button>
        </div>
    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $kode_pesawat = $_POST['kode_pesawat'];
    $kelas = $_POST['kelas'];
    $jumlah_tiket = (int) $_POST['jumlah_tiket'];
    
    $harga = 0;
    if ($kelas == "Eksekutif") {
        $harga = 3500000;
    } elseif ($kelas == "Bisnis") {
        $harga = 2500000;
    } elseif ($kelas == "Ekonomi") {
        $harga = 1200000;
    }
    
    $total_bayar = $harga * $jumlah_tiket;
    
    echo "<div class='result'>";
    echo "<h4>Hasil Pemesanan:</h4>";
    echo "Nama: $nama <br>";
    echo "Kode Pesawat: $kode_pesawat <br>";
    echo "Kelas: $kelas <br>";
    echo "Jumlah Tiket: $jumlah_tiket <br>";
    echo "Harga Satuan: Rp " . number_format($harga, 0, ',', '.') . "<br>";
    echo "<strong>Total Bayar: Rp " . number_format($total_bayar, 0, ',', '.') . "</strong>";
    echo "</div>";
}
?>

</body>
</html>
