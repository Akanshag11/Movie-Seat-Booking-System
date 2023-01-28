<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="proj";
    $conn=mysqli_connect($servername, $username, $password, $dbname);
    $mov_id = $_POST['movid'];
    $mov_name = $_POST['mov_name'];
    $mov_lang = $_POST['mov_lang'];
    $mov_duration = $_POST['duration'];
    $mov_director = $_POST['director'];
    $release_date = date("Y-m-d", strtotime($_POST['date']));
    $genre = $_POST['genre'];
    $mov_img = $_POST['poster'];
    $mov_banner = $_POST['banner'];

    $sql = "UPDATE movie set mov_name='$mov_name' ,mov_lang='$mov_lang', mov_duration='$mov_duration', mov_director='$mov_director', release_date='$release_date', genre='$genre' , mov_img='$mov_img' , mov_banner='$mov_banner' WHERE mov_id='$mov_id'";
    mysqli_query($conn, $sql);

    header("refresh:0;url=admin_movielist.php");


?>