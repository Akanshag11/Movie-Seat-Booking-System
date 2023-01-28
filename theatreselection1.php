<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title></title>
  <style type="text/css">
    .but {
      background-color: white;
      margin-right: 20px;
      margin-left: 20px;
      margin-bottom: 2px;

      padding: 14px;
      border: 2px solid rgb(65, 192, 65);
      border-radius: 12px;
      font-size: 14px;
      color: rgb(75, 161, 75);
      transition-duration: 0.4s;
      box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.2), 0 3px 3px 0 rgba(0, 0, 0, 0.19);
      transition-duration: 0.4s;

    }

    .but:hover {
      background-color: rgb(65, 192, 65);
      color: rgb(255, 255, 255);
      box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.19);

    }

    .divs {
      background-color: white;
      color: black;
      font-size: 20px;
      margin-left: 33px;
      margin-top: 17px;
      padding-top: 10px;
      padding-left: 20px;

    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script type="text/javascript">
    function func(time,theatreid,theatrename) {
      document.getElementById('time').value = time;
      document.getElementById('theatreid').value = theatreid;
      document.getElementById('theatrename').value = theatrename;
      
    }
    function link1() {
      var date="2021-01-24";
      document.getElementById('date').value = date;
    }
    function link2() {
      var date="2021-01-25";
      document.getElementById('date').value = date;
    }
    function link3() {
      var date="2021-01-26";
      document.getElementById('date').value = date;
    }
  </script>
</head>

<body>
  <?php

        session_start();
        $_SESSION['mov_name'] = $_POST['id'];

  ?>

  <?php include('navbar.html'); ?>
    <center>
    <h1> THEATRE SELECTION</h1>
    </center>


  <div class="row">
    <div class="col-4">
      <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list"
          href="#list-home" role="tab" aria-controls="list-home" onclick="link1()">24th January</a>
        <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list"
          href="#list-profile" role="tab" aria-controls="list-profile" onclick="link2()">25th January</a>
        <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list"
          href="#list-messages" role="tab" aria-controls="list-messages" onclick="link3()">26th January</a>
      </div>
    </div>
    <div class="col-8">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
          <div id="theatres">
            <div id="divs" class="divs">
              <?php 
                $servername="localhost";
                $username="root";
                $password="";
                $dbname="proj";
        
                $conn=mysqli_connect($servername, $username, $password, $dbname);
        
                $sql="SELECT * FROM theatre";
                $query=mysqli_query($conn,$sql);
                $valid=mysqli_num_rows($query)>0;
        
                if($valid){
                  while($row=mysqli_fetch_assoc($query)){
              ?>
              <hr>
              <p id="1">

                <?php echo $row['th_name'] ?>
                <button class="but" type="submit" value="10:00AM" id="<?php echo $row['th_id'] ?>" name="<?php echo $row['th_name'] ?>" onclick="func(this.value,this.id,this.name)"><b>10:00AM</b></button>
                <button class="but" type="submit" value="14:30PM" id="<?php echo $row['th_id'] ?>" name="<?php echo $row['th_name'] ?>" onclick="func(this.value,this.id,this.name)"><b>14:30PM</b></button>
                <button class="but" type="submit" value="19:00PM" id="<?php echo $row['th_id'] ?>" name="<?php echo $row['th_name'] ?>" onclick="func(this.value,this.id,this.name)"><b>19:00PM</b></button>

              </p>
              <?php
        
                  }
                }
              ?>
              <hr>
            </div>

          </div>
        </div>
        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
          <div id="theatres">
            <div id="divs" class="divs">
              <?php 
                $servername="localhost";
                $username="root";
                $password="";
                $dbname="proj";
        
                $conn=mysqli_connect($servername, $username, $password, $dbname);
        
                $sql="SELECT * FROM theatre";
                $query=mysqli_query($conn,$sql);
                $valid=mysqli_num_rows($query)>0;
        
                if($valid){
                  while($row=mysqli_fetch_assoc($query)){
              ?>
              <hr>
              <p id="1">

                <?php echo $row['th_name'] ?>
                <button class="but" type="submit" value="10:00AM" id="<?php echo $row['th_id'] ?>" name="<?php echo $row['th_name'] ?>" onclick="func(this.value,this.id,this.name)"><b>10:00AM</b></button>
                <button class="but" type="submit" value="14:30PM" id="<?php echo $row['th_id'] ?>" name="<?php echo $row['th_name'] ?>" onclick="func(this.value,this.id,this.name)"><b>14:30PM</b></button>
                <button class="but" type="submit" value="19:00PM" id="<?php echo $row['th_id'] ?>" name="<?php echo $row['th_name'] ?>" onclick="func(this.value,this.id,this.name)"><b>19:00PM</b></button>

              </p>
              <?php
        
                  }
                }
              ?>
              <hr>
            </div>

          </div>
        </div>
        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
          <div id="theatres">
            <div id="divs" class="divs">
              <?php 
                $servername="localhost";
                $username="root";
                $password="";
                $dbname="proj";
        
                $conn=mysqli_connect($servername, $username, $password, $dbname);
        
                $sql="SELECT * FROM theatre";
                $query=mysqli_query($conn,$sql);
                $valid=mysqli_num_rows($query)>0;
        
                if($valid){
                  while($row=mysqli_fetch_assoc($query)){
              ?>
              <hr>
              <p id="1">

                <?php echo $row['th_name'] ?>
                <button class="but" type="submit" value="10:00AM" id="<?php echo $row['th_id'] ?>" name="<?php echo $row['th_name'] ?>" onclick="func(this.value,this.id,this.name)"><b>10:00AM</b></button>
                <button class="but" type="submit" value="14:30PM" id="<?php echo $row['th_id'] ?>" name="<?php echo $row['th_name'] ?>" onclick="func(this.value,this.id,this.name)"><b>14:30PM</b></button>
                <button class="but" type="submit" value="19:00PM" id="<?php echo $row['th_id'] ?>" name="<?php echo $row['th_name'] ?>" onclick="func(this.value,this.id,this.name)"><b>19:00PM</b></button>

              </p>
              <?php
        
                  }
                }
              ?>
              <hr>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <center>
  <form action="seatselection.php" method="post">
    <input type="textbox" id="date" name="date" value='2021-01-24'/>
    <input type="textbox" id="theatreid" name="theatreid" value=''/>
    <input type="textbox" id="theatrename" name="theatrename" value=''/>
    <input type="textbox" id="time" name="time" value=''/>
    <button class="btn-danger" type="submit" name="submit">Continue</button>
  </form>
</center>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
</body>

</html>