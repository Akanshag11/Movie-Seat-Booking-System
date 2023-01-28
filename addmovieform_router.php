<?php
        if(isset($_POST['submit'])){
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="proj";
            $conn=mysqli_connect($servername, $username, $password, $dbname);
            $mov_name = $_POST['mov_name'];
            $mov_lang = $_POST['mov_lang'];
            $mov_duration = $_POST['duration'];
            $mov_director = $_POST['director'];
            $release_date = date("Y-m-d", strtotime($_POST['date']));
            $genre = $_POST['genre'];
            $mov_img = $_POST['poster'];
            $mov_banner = $_POST['banner'];


            $sql="INSERT INTO movie (mov_id, mov_name, mov_lang, mov_duration, mov_director, release_date, genre, mov_img, mov_banner) VALUES ('','$mov_name', '$mov_lang', '$mov_duration', '$mov_director', '$release_date', '$genre', '$mov_img', '$mov_banner')";
            if(mysqli_query($conn,$sql)){
                echo "Movie Inserted Successfully";
                header("refresh:0;url=admin_movielist.php");
            }            
        }
   


    ?>