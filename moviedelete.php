<?php
     $servername="localhost";
     $username="root";
     $password="";
     $dbname="proj";
     $mov1 = $_POST['movietext'];
     $mov = trim($mov1);
     $selmov = explode(" ", $mov);
     $no_of_movies = sizeof($selmov);
 
     $conn=mysqli_connect($servername, $username, $password, $dbname);

    for($i=0; $i<$no_of_movies; $i++){
        $sql="DELETE FROM movie WHERE mov_id = '$selmov[$i]'";
        mysqli_query($conn,$sql);
    }

    header("refresh:1;url=admin_movielist.php");
     

?>