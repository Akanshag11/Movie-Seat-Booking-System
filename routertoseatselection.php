<?php
    session_start();
    $_SESSION['date'] = $_POST['date'];
    $_SESSION['theatreid'] = $_POST['theatreid'];
    $_SESSION['theatrename'] = $_POST['theatrename'];
    $_SESSION['time'] = $_POST['time'];
    $mov_id = $_SESSION['mov_id'];
    $th_id = $_POST['theatreid'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $selseats = array();
    $sql="SELECT * FROM booking WHERE mov_id = '$mov_id' AND th_id = '$th_id' AND show_date = '$date' AND show_time = '$time'";
    $query = $mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($query)){
        $selseats[] = $row['seat_id'];
    }
?>