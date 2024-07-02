<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $kategori = mysqli_query($conn, "select * from tb_category where category_id = '".$_GET['id']."' ");
    if(mysqli_num_rows($kategori) == 0){
        echo '<script>window.location="data-kategori.php"</script>';
    }    
    $kategori = mysqli_query($conn, "select * from tb_category where category_id = '".$_GET['id']."' ");
    $k = mysqli_fetch_object($kategori);
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
            <h3>Edit Data Kategori</h3>
            <div class="box">
               <form action="" method="POST">
                <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" value="<?php echo $k-> category_name ?>" required>
                <input type="submit" name="submit" value="submit" class="btn">
               </form>
               <?php
               if(isset($_POST['submit'])){

                $nama = ucwords($_POST['nama']);
                
                $update = mysqli_query($conn, "update tb_category set 
                                        category_name = '".$nama."' 
                                        where category_id = '".$k->category_id."' ");

                if($update){
                    echo '<script>alert("Edit data berhasil")</script>';
                    echo '<script>window.location="data-kategori.php"</script>';
                }else{
                    echo 'gagal'.mysqli_error($conn);
                }
                
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