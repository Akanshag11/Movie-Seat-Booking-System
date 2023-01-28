<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title></title>
    </head>
    <body>
        <?php include('admin_navbar.html'); ?><br><br>
        <div class="row">
            <div class="col-4">
                <div class="list-group">
                    <a href="admin_movielist.php" class="list-group-item list-group-item-action">Movie List</a>
                    <a href="admin_theatrelist.php" class="list-group-item list-group-item-action">Theatre List</a>
                    <a href="admin_customerlist.php" class="list-group-item list-group-item-action">Customer List</a>
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                    Customer Reservations
                    </a>
                </div>
            </div>
            <div class="col-8">
                <button  class="btn btn-success">SORT BY NAME</button><br><br>
                <ul class="list-group">
                    <?php
                        $servername="localhost";
                        $username="root";
                        $password="";
                        $dbname="proj";
                    
                        $conn=mysqli_connect($servername, $username, $password, $dbname);
            
                        $sql="SELECT DISTINCT(b.res_id), c.cust_name, m.mov_name, t.th_name, b.show_date, b.show_time FROM booking b, reservations r, customer c, movie m, theatre t WHERE b.res_id=r.res_id AND r.cust_id = c.cust_id AND b.th_id = t.th_id AND b.mov_id = m.mov_id ORDER BY b.res_id";
                        $query=mysqli_query($conn,$sql);
                        $valid=mysqli_num_rows($query)>0;
            
                        if($valid){
                            while($row=mysqli_fetch_assoc($query)){

                    ?>
                    <li class="list-group-item">
                        <b><?php echo $row['res_id'] ?></b><br>
                        <?php echo $row['cust_name'] ?><br>
                        <?php echo $row['mov_name'] ?><br>
                        <?php echo $row['th_name'] ?><br>
                        <?php echo $row['show_date'] ?><br>
                        <?php echo $row['show_time'] ?><br>
                        <?php
                            $sql1 = "SELECT seat_id FROM booking WHERE res_id = '$row[res_id]'";
                            $query1=mysqli_query($conn,$sql1);
                            $valid1=mysqli_num_rows($query1)>0;
                
                            if($valid1){
                                while($row1=mysqli_fetch_assoc($query1)){
                            
                        ?>
                        <?php echo $row1['seat_id'] ?>&nbsp;
                        <?php
                            }
                        }
                        ?>
                                                
                    </li>
                </ul>
                <?php
                            }
                        }
                ?>
            </div>
        </div>





        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>