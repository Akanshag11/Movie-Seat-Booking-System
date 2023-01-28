<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title></title>
        <style type="text/css">
            
        </style>  
        <script type="text/javascript">
          function func(movie) {
          var x = document.getElementById('movietext');
          var y = movie.id;
          if(movie.checked){       
              x.value = y + ' ';
          }
          else{
              x.value =x.value.replace(y + ' ',"");
          }
          document.getElementById('movietext').value=x.value;
          }
        </script>
        
    </head>
    <body>
            
        <?php include('admin_navbar.html'); ?>  
        <br><br>
        <div class="row">
            <div class="col-4" style="position:absolute;">
                <div class="list-group">
                    <a href="admin_movielist.php" class="list-group-item list-group-item-action active" aria-current="true">
                        Movie List
                    </a>
                    <a href="admin_theatrelist.php" class="list-group-item list-group-item-action">Theatre List</a>
                    <a href="admin_customerlist.php" class="list-group-item list-group-item-action">Customer List</a>
                    <a href="admin_customerreservations.php" class="list-group-item list-group-item-action">Customer Reservations</a>
                </div>
            </div>
            <div class="col-4">
            </div>
            <div class="col-8">
            <button type="button" class="btn btn-success" onclick="window.location='admin_movielist.php';"> Go Back</button><br><br>
                
                <div class="list-group">
                    <?php
                        $servername="localhost";
                        $username="root";
                        $password="";
                        $dbname="proj";
                    
                        $conn=mysqli_connect($servername, $username, $password, $dbname);
            
                        $sql="SELECT * FROM movie";
                        $query=mysqli_query($conn,$sql);
                        $valid=mysqli_num_rows($query)>0;
             
                        if($valid){
                            while($row=mysqli_fetch_assoc($query)){

                    ?>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="radio" name="radio" id="<?php echo $row['mov_id'] ?>" onclick="func(this)">
                        <?php echo $row['mov_name']; ?>
                    </label>

                    <?php
                                }
                            }
                    ?> 
                </div>
                <br><br>
                <form action="movieupdateform.php" method="POST" style="text-align:center;">
                    <input type="text" id="movietext" name= "movietext" value='' />
                    <button type="submit" class="btn btn-success" name="continue"> Continue</button><br><br>
                </form>
            </div>
        </div>
        
        




        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>