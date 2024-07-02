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
            <h3>Tambah Data Produk</h3>
            <div class="box">
               <form action="" method="POST" enctype="multipart/form-data">
                <select class="input-control" name="kategori" required>
                    <option value="">--Pilih--</option>
                    <?php
                        $kategori = mysqli_query($conn, "select * from tb_category group by category_id desc");
                        while($r = mysqli_fetch_array($kategori)){
                    ?>
                    <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
                    <?php } ?>
                </select>
                <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                <input type="file" name="gambar" class="input-control" required>
                <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                <select class="input-control" name="status">
                    <option value="">--Pilih--</option>
                    <option value="">Aktif</option>
                    <option value="">Tidak Aktif</option>

                </select>
                <input type="submit" name="submit" value="submit" class="btn">
               </form>
               <?php
               if(isset($_POST['submit'])){


                        // print_r($_FILES['gambar']);
                        //menampung inputan dari form
                        $kategori   = $_POST['kategori'];
                        $nama       = $_POST['nama'];
                        $harga      = $_POST['harga'];
                        $deskripsi  = $_POST['deskripsi'];
                        $status     = $_POST['status'];
                        

                        //menampung data file yang di upload
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        $newname = 'produk'.time().'.'.$type2;

                        //menampung data format file yang diizinkan
                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                        //validasi format file
                        if(!in_array($type2, $tipe_diizinkan)){
                            //jika format file tidak ada di dalam tipe diizinkan
                            echo '<script>("Format file tidak diizinkan")</script>';

                        }else{
                            //jika fromat file dengan yang ada didalam array tipe diizinkan
                            //proses upload file sekaligus insert ke database
                            echo 'berhasil upload';
                            move_uploaded_file($tmp_name, './produk/'.$newname);

                            $insert = mysqli_query($conn, "insert into tb_product values (
                                        null,
                                        '".$kategori."',
                                        '".$nama."',
                                        '".$harga."',
                                        '".$deskripsi."',
                                        '".$newname."',
                                        '".$status."',
                                        null
                                            ) ");
                            if($insert){
                                echo '<script>alerta("Tambah data berhasil)</script>';
                                echo '<script>window.location="data-produk.php"</script>';
                            }else{
                                echo 'gagal '.mysqli_error($conn);
                            }

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