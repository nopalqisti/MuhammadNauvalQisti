<?php
error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "select admin_telp, admin_email, admin_address from db_admin where admin_id = 1");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "select * from tb_product where product_id = '".$_GET['id']."' ");
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
        <h1><a href="index.php">Harmonimall</a></h1>
            <ul>
                <li><a href="produk.php">Produk<a></li>
            </ul>
        </div>  
    </header>

    <!-- search -->
    <div class="search">
        <div clas="countainer">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

<!-- product detail -->
<div class="selection">
    <div class="container">
    <h3>Detail Produk</h3>
        <div class="box">
            <div class="col-2">
                <img src="produk/<?php echo $p->product_image ?>" width="100%">
            </div>
            <div class="col-2">
                <h3><?php echo $p->product_name ?></h3>
                <h4> Rp. <?php echo number_format($p->product_price) ?></h4>
                <p>Deskripsi :</p>
                <?php echo $p->product_description ?>
                <p><a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Hai, saya tertarik dengan produk ini">Hubungi via whatsapp </a></p>
            </div>
        </div>
    </div>
</div>


             <!-- footer -->
              <div class="footer">
                <div class="container">
                    <h4>Alamat</h4>
                    <p><?php echo $a->admin_address ?></p>

                    <h4>Email</h4>
                    <p><?php echo $a->admin_email ?></p>

                    <h4>No. Hp</h4>
                    <p><?php echo $a->admin_telp ?></p>
                    <small>Copyright &copy; 2024 - Harmonimall</small>
                </div>
              </div>
    </body> 
</html>