<?php
    if(isset($_POST['back'])){
        header( "refresh:0;url=index.php" );
    }
    else if(isset($_POST['proceed'])){
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="proj";
        $admin_name = $_POST['admin_name'];
        $pass = $_POST['password'];

        $conn=mysqli_connect($servername, $username, $password, $dbname);

        $sql = "SELECT * FROM admin WHERE admin_username = 'admin'";

        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($query)){
            if($admin_name == $row['admin_username']){
                if($pass == $row['admin_password'] ){
                    header( "refresh:2;url=admin_movielist.php" );
                }
                else{
                    echo '<script>alert("invalid password")</script>';
                    header( "refresh:2;url=admin_login.php" );
                }
            }
            else{
                echo '<script>alert("invalid Details")</script>';
                header( "refresh:2;url=admin_login.php" );
            }
        }
    }
    




?>