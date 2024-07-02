<?php
    session_start();
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
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat datang <?php echo $_SESSION['admin_global']->admin_name ?> di Harmonimall</h4>
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