<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harmonimall</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <!--header-->
    <header>
        <div class="container">
        <h1><a href="dasboard.php">Kategori</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard<a></li>
                <li><a href="profil.php">Profil<a></li>
                <li><a href="data-kategori.php">Data Kategori<a></li>
                <li><a href="data-produk.php">Data Produk<a></li>
                <li><a href="keluar.php">Keluar<a></li>
            </ul>
        </div>  
    </header>
    
    <!-- content -->
     <div class="selection">
        <div class="container">
            <h3>Data Produk</h3>
            <div class="box">
                <p><a href="tambah-produk.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $produk = mysqli_query($conn, "select * from tb_product left join tb_category using (category_id) order by product_id desc");
                        if(mysqli_num_rows($produk) > 0){
                        while($row = mysqli_fetch_array($produk)){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td><?php echo $row['product_name'] ?></td>
                            <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                            <td><?php echo $row['product_description'] ?></td>
                            <td> <a href="produk/<?php echo $row['product_image'] ?>"><img src="produk/<?php echo $row['product_image'] ?>" width="50px"></a></td>
                            <td><?php echo ($row['product_status'] == 0)? 'Aktif':'Tidak Aktif'; ?></td>
                            <td>
                                <a href="edit-produk.php?id=<?php echo $row['product_id']?>">Edit</a> || <a href="proses-hapus.php?idp=<?php echo $row['product_id']?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                            <td colspan="8">Tidak ada data</td>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- footer -->
     <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Harmonimall.</small>
        </div>
     </footer>
</body>
</html>