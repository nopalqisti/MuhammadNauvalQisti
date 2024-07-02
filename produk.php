<?php
error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "select admin_telp, admin_email, admin_address from db_admin where admin_id = 1");
$a = mysqli_fetch_object($kontak);
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

            <!-- new product-->
             <div class="container">
                <h3>Produk</h3>
                <div class="box">
                    <?php
                if($_GET['search'] != '' || $_GET['kat'] != ''){ 
                    $where = "and product_name like '%".$_GET['search']."%' and category_id like '%".$_GET['kat']."%' ";
                    }
                
                        $produk = mysqli_query($conn, "select * from tb_product where product_status = 0 $where
                         order by product_id");
                        if(mysqli_num_rows($produk) > 0){
                            while($p = mysqli_fetch_array($produk)){
                    ?>
                    <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
                            <div class="col-4">
                            <img src="produk/<?php echo $p['product_image'] ?>">
                            <p class="nama"><?php echo $p['product_name'] ?></p>
                            <p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
                    </div>
                    </a>
                    <?php }}else{ ?>
                            <p>Produk tidak ada</p>
                    <?php } ?>   
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