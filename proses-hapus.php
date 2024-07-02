<?php

    include 'db.php';

    if(isset($_GET['idk'])){
        $delete = mysqli_query($conn, "delete from tb_category where category_id= '".$_GET['idk']."' ");
        echo '<script>window.location="data-kategori.php"</script>';
    }

    if(isset($_GET['idp'])){
        $produk = mysqli_query($conn, "select product_image from tb_product where product_id = '".$_GET['idp']."' ");
        $p = mysqli_fetch_object($produk);

        unlink('./produk/'.$p->product_image);

        $delete = mysqli_query($conn, "delete from tb_product where product_id = '".$_GET['idp']."' ");
        echo '<script>window.location="data-produk.php"</script>';
    }

?>