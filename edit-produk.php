<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $produk = mysqli_query($conn, "select * from tb_product where product_id ='".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
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
        <h1><a href="dasboard.php">Harmonimall</a></h1>
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
            <h3>Edit Data Produk</h3>
            <div class="box">
               <form action="" method="POST" enctype="multipart/form-data">
                <select class="input-control" name="kategori" required>
                    <option value="">--Pilih--</option>
                    <?php
                        $kategori = mysqli_query($conn, "select * from tb_category group by category_id desc");
                        while($r = mysqli_fetch_array($kategori)){
                    ?>
                    <option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id'] == $p->category_id )? 'selected':'' ?>><?php echo $r['category_name'] ?></option>
                    <?php } ?>
                </select>
                <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p->product_name ?>" required>
                <input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p->product_price ?>"  required>
                
                <img src="produk/<?php echo $p->product_image ?>" width="100px">
                <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
                <input type="file" name="gambar" class="input-control">
                <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->product_description?></textarea>
                <select class="input-control" name="status">
                    <option value="">--Pilih--</option>
                    <option value="" <?php echo ($p->product_status == 0)? 'selected':''; ?>>Aktif</option>
                    <option value="" <?php echo ($p->product_status == 1)? 'selected':''; ?>>Tidak Aktif</option>

                </select>
                <input type="submit" name="submit" value="submit" class="btn">
               </form>
               <?php
               if(isset($_POST['submit'])){

               }
               ?>
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