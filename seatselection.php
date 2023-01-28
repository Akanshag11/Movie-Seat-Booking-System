<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title></title>
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

      $servername="localhost";
      $username="root";
      $password="";
      $dbname="proj";
  
      $conn=mysqli_connect($servername, $username, $password, $dbname);

      $sql="SELECT * FROM booking WHERE mov_id = '$mov_id' AND th_id = '$th_id' AND show_date = '$date' AND show_time = '$time'";
      $query = mysqli_query($conn, $sql);
      while($row=mysqli_fetch_assoc($query)){
          $selseats[] = $row['seat_id'];
      }

  ?>

  <style type="text/css">
    .mainkamain{
      background:#2B3148;
      width:80%;
      }
    .main {
      max-width: 30%;
    }

    .screen {
      width: 200%;
      height: 80px;
      background-color: #fff;
      margin-left:-50%;
      border-top-right-radius:100%;
      border-top-left-radius:100%;
      box-shadow: 0 3px 12px rgba(255, 255, 255, 0.7);
      transform: rotateX(-45deg);
    }


    ol {
      list-style: none;
      padding:2px;
      margin-left:-35%;
    }

    .seats {
      display: flex;
      flex-direction: row;
      flex-wrap: nowrap;
      justify-content: flex-start;
    }

    .seat {
      display: flex;
      flex: 0 0 14%;
      padding: 5px;
      position: relative;
    }
    .seat:nth-of-type(3) {
      margin-right: 14%;
    }
    .seat:nth-last-of-type(3) {
      margin-left: 14%;
    }

    .seat input[type=checkbox] {
      background-color: #777777;
      position:relative;
      opacity: 0;
    }
    .seat input[type=checkbox]:checked + label {
      background: #7CFF00;
      animation-name: rubberBand;
      animation-duration: 300ms;
      animation-fill-mode: both;
    }
    .seat input[type=checkbox]:disabled + label {
      background: #FF0000;
      text-indent: -9999px;
      overflow: hidden;
    }
    .seat input[type=checkbox]:disabled + label:after {
      content: "X";
      text-indent: 0;
      position: absolute;
      left: 50%;
      transform: translate(-50%, 0%);
    }
    .seat input[type=checkbox]:disabled + label:hover {
      box-shadow: none;
      cursor: not-allowed;
    }
    .seat label {
      display: block;
      position: relative;
      width: 100%;
      text-align: center;
      font-size: 18px;
      font-weight: bold;
      line-height: 1.5rem;
      padding: 4px 0;
      background:#D3DECA;
      animation-duration: 300ms;
      animation-fill-mode: both;
    }
    .seat label:before {
      content: "";
      position: absolute;
      width: 75%;
      height: 75%;
      top: 1px;
      left: 50%;
      transform: translate(-50%, 0%);
      background: rgba(255, 255, 255, 0.4);
      border-radius: 3px;
    }
    .seat label:hover {
      cursor: pointer;
      box-shadow: 0 0 0px 2px #5C6AFF;
    }
    @keyframes rubberBand {
      0% {

        transform: scale3d(1, 1, 1);
      }
      30% {

        transform: scale3d(1.25, 0.75, 1);
      }
      40% {

        transform: scale3d(0.75, 1.25, 1);
      }
      50% {

        transform: scale3d(1.15, 0.85, 1);
      }
      65% {

        transform: scale3d(0.95, 1.05, 1);
      }
      75% {

        transform: scale3d(1.05, 0.95, 1);
      }
      100% {
      
        transform: scale3d(1, 1, 1);
      }
    }
    .rubberBand {
      animation-name: rubberBand;
    }
    #checkout {
      margin-left: 37.5%;
      margin-right: 37.5%;
      width: 25%;
    }
    input[readonly] {
      cursor : default;
    } 
  </style>
  <script type="text/javascript">
    function func(seat) {
      var x = document.getElementById('seats');
      var y = seat.id;
      if(seat.checked){       
        x.value +=y + ' ';
      }
      else{
        x.value =x.value.replace(y + ' ',"");
      }
      document.getElementById('seats').value=x.value;
    }
  </script>
</head>

<body>
  
  <?php include('navbar.html'); ?>

  <form method="post" action="ticket.php">
    <!-- <div class="input-group input-group-lg my-3 ">
        <span class="input-group-text" id="inputGroup-sizing-lg">Enter your Name**:</span>
        <input type="text" name="cust_name" class="form-control" aria-label="Sizing example input"
            aria-describedby="inputGroup-sizing-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg">Email**:</span>
        <input type="text" name="cust_email" class="form-control" aria-label="Sizing example input"
            aria-describedby="inputGroup-sizing-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg">Phone Number**:</span>
        <input type="text" name="cust_phno" class="form-control" aria-label="Sizing example input"
            aria-describedby="inputGroup-sizing-lg">
    </div> -->
    <div class="col-md-7 col-lg-8 mx-auto">
        <h1 class="my-3">Enter Your Details</h1>
          <div class="row g-3">
            <div class="col-12">
              <label for="firstName" class="form-label">Full name <span class="text-muted">*</span></label>
              <input type="text" class="form-control" name="cust_name" id="firstName" placeholder="" value="" required>
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">*</span></label>
              <input type="text" class="form-control" name="cust_email" id="email" placeholder="you@example.com" required>
            </div>
            <div class="col-12">
              <label for="phno" class="form-label">Phone Number <span class="text-muted">*</span></label>
              <input type="text" class="form-control" name="cust_phno" id="phno" placeholder="" required>
            </div>
      </div>
    </div>
    <br><br>
    <center>
    <div class="mainkamain my-4">
    <div class="main"><br><br>
    <div class="screen">
        
    </div><br>
    <ol class="mainol">
      <b style="color:#fff;">GOLD (₹300):</b>
        <li class="row row--1">
        <ol class="seats" type="A">
            <li class="seat">
            <input type="checkbox" id="1A" name="gold" onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="1A") echo "disabled" ?>/>
            <label for="1A">1A</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="1B" name="gold" onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="1B") echo "disabled" ?> />
            <label for="1B">1B</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="1C" name="gold" onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="1C") echo "disabled" ?>/>
            <label for="1C">1C</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="1D" name="gold" onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="1D") echo "disabled" ?>/>
            <label for="1D">1D</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="1E" name="gold" onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="1E") echo "disabled" ?>/>
            <label for="1E">1E</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="1F" name="gold" onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="1F") echo "disabled" ?>/>
            <label for="1F">1F</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="1G" name="gold" onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="1G") echo "disabled" ?>/>
            <label for="1G">1G</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="1H" name="gold" onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="1H") echo "disabled" ?>/>
            <label for="1H">1H</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="1I" name="gold" onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="1I") echo "disabled" ?>/>
            <label for="1I">1I</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="1J" name="gold" onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="1J") echo "disabled" ?>/>
            <label for="1J">1J</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="1K" name="gold" onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="1K") echo "disabled" ?>/>
            <label for="1K">1K</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="1L" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="1L") echo "disabled" ?>/>
            <label for="1L">1L</label>
            </li>        
        </ol>
        </li>
        <li class="row row--2">
        <ol class="seats" type="A">
            <li class="seat">
            <input type="checkbox" id="2A" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="2A") echo "disabled" ?>/>
            <label for="2A">2A</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="2B" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="2B") echo "disabled" ?>/>
            <label for="2B">2B</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="2C" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="2C") echo "disabled" ?> />
            <label for="2C">2C</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="2D"  name="gold" onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="2D") echo "disabled" ?>/>
            <label for="2D">2D</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="2E" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="2E") echo "disabled" ?>/>
            <label for="2E">2E</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="2F" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="2F") echo "disabled" ?>/>
            <label for="2F">2F</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="2G"  name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="2G") echo "disabled" ?>/>
            <label for="2G">2G</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="2H"  name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="2H") echo "disabled" ?>/>
            <label for="2H">2H</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="2I"  name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="2I") echo "disabled" ?>/>
            <label for="2I">2I</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="2J" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="2J") echo "disabled" ?>/>
            <label for="2J">2J</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="2K" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="2K") echo "disabled" ?>/>
            <label for="2K">2K</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="2L" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="2L") echo "disabled" ?>/>
            <label for="2L">2L</label>
            </li>
        </ol>
        </li>
        <li class="row row--3">
        <ol class="seats" type="A">
            <li class="seat">
            <input type="checkbox" id="3A" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="3A") echo "disabled" ?>/>
            <label for="3A">3A</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="3B" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="3B") echo "disabled" ?>/>
            <label for="3B">3B</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="3C" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="3C") echo "disabled" ?>/>
            <label for="3C">3C</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="3D" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="3D") echo "disabled" ?>/>
            <label for="3D">3D</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="3E" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="3E") echo "disabled" ?>/>
            <label for="3E">3E</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="3F" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="3F") echo "disabled" ?>/>
            <label for="3F">3F</label>
            </li>
        <li class="seat">
            <input type="checkbox" id="3G" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="3G") echo "disabled" ?>/>
            <label for="3G">3G</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="3H" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="3H") echo "disabled" ?>/>
            <label for="3H">3H</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="3I" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="3I") echo "disabled" ?> />
            <label for="3I">3I</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="3J" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="3J") echo "disabled" ?>/>
            <label for="3J">3J</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="3K" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="3K") echo "disabled" ?>/>
            <label for="3K">3K</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="3L" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="3L") echo "disabled" ?>/>
            <label for="3L">3L</label>
            </li>
        </ol>
        </li>
        <li class="row row--4">
        <ol class="seats" type="A">
            <li class="seat">
            <input type="checkbox" id="4A" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="4A") echo "disabled" ?>/>
            <label for="4A">4A</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="4B" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="4B") echo "disabled" ?>/>
            <label for="4B">4B</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="4C" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="4C") echo "disabled" ?>/>
            <label for="4C">4C</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="4D" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="4D") echo "disabled" ?>/>
            <label for="4D">4D</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="4E" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="4E") echo "disabled" ?>/>
            <label for="4E">4E</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="4F" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="4F") echo "disabled" ?>/>
            <label for="4F">4F</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="4G" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="4G") echo "disabled" ?>/>
            <label for="4G">4G</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="4H" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="4H") echo "disabled" ?>/>
            <label for="4H">4H</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="4I" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="4I") echo "disabled" ?>/>
            <label for="4I">4I</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="4J" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="4J") echo "disabled" ?>/>
            <label for="4J">4J</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="4K" /name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="4K") echo "disabled" ?>/>
            <label for="4K">4K</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="4L" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="4L") echo "disabled" ?>/>
            <label for="4L">4L</label>
            </li>
        </ol>
        </li>
        <li class="row row--5">
        <ol class="seats" type="A">
            <li class="seat">
            <input type="checkbox" id="5A" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="5A") echo "disabled" ?>/>
            <label for="5A">5A</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="5B" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="5B") echo "disabled" ?>/>
            <label for="5B">5B</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="5C" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="5C") echo "disabled" ?>/>
            <label for="5C">5C</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="5D" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="5D") echo "disabled" ?>/>
            <label for="5D">5D</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="5E" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="5E") echo "disabled" ?>/>
            <label for="5E">5E</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="5F" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="5F") echo "disabled" ?>/>
            <label for="5F">5F</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="5G" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="5G") echo "disabled" ?>/>
            <label for="5G">5G</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="5H" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="5H") echo "disabled" ?>/>
            <label for="5H">5H</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="5I" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="5I") echo "disabled" ?>/>
            <label for="5I">5I</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="5J" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="5J") echo "disabled" ?>/>
            <label for="5J">5J</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="5K" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="5K") echo "disabled" ?>/>
            <label for="5K">5K</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="5L" name="gold"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="5L") echo "disabled" ?>/>
            <label for="5L">5L</label>
            </li>
        </ol>
        </li>
        <b style="color:#fff;">PLATINUM (₹500):</b>
        <li class="row row--6">
        <ol class="seats" type="A">
            <li class="seat">
            <input type="checkbox" id="6A" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="6A") echo "disabled" ?>/>
            <label for="6A">6A</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="6B" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="6B") echo "disabled" ?>/>
            <label for="6B">6B</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="6C" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="6C") echo "disabled" ?>/>
            <label for="6C">6C</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="6D" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="6D") echo "disabled" ?>/>
            <label for="6D">6D</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="6E" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="6E") echo "disabled" ?>/>
            <label for="6E">6E</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="6F" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="6F") echo "disabled" ?>/>
            <label for="6F">6F</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="6G" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="6G") echo "disabled" ?>/>
            <label for="6G">6G</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="6H" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="6H") echo "disabled" ?>/>
            <label for="6H">6H</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="6I" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="6I") echo "disabled" ?>/>
            <label for="6I">6I</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="6J" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="6J") echo "disabled" ?>/>
            <label for="6J">6J</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="6K" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="6K") echo "disabled" ?>/>
            <label for="6K">6K</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="6L" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="6L") echo "disabled" ?>/>
            <label for="6L">6L</label>
            </li>

        </ol>
        </li>
        <li class="row row--7">
        <ol class="seats" type="A">
            <li class="seat">
            <input type="checkbox" id="7A" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="7A") echo "disabled" ?>/>
            <label for="7A">7A</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="7B" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="7B") echo "disabled" ?>/>
            <label for="7B">7B</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="7C" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="7C") echo "disabled" ?>/>
            <label for="7C">7C</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="7D" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="7D") echo "disabled" ?>/>
            <label for="7D">7D</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="7E" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="7E") echo "disabled" ?>/>
            <label for="7E">7E</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="7F" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="7F") echo "disabled" ?>/>
            <label for="7F">7F</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="7G" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="7G") echo "disabled" ?>/>
            <label for="7G">7G</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="7H" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="7H") echo "disabled" ?>/>
            <label for="7H">7H</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="7I" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="7I") echo "disabled" ?>/>
            <label for="7I">7I</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="7J" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="7J") echo "disabled" ?>/>
            <label for="7J">7J</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="7K" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="7K") echo "disabled" ?>/>
            <label for="7K">7K</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="7L" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="7L") echo "disabled" ?>/>
            <label for="7L">7L</label>
            </li>
        </ol>
        </li>
        <li class="row row--8">
        <ol class="seats" type="A">
            <li class="seat">
            <input type="checkbox" id="8A" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="8A") echo "disabled" ?>/>
            <label for="8A">8A</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="8B" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="8B") echo "disabled" ?>/>
            <label for="8B">8B</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="8C" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="8C") echo "disabled" ?>/>
            <label for="8C">8C</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="8D" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="8D") echo "disabled" ?>/>
            <label for="8D">8D</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="8E" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="8E") echo "disabled" ?>/>
            <label for="8E">8E</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="8F" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="8F") echo "disabled" ?>/>
            <label for="8F">8F</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="8G" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="8G") echo "disabled" ?>/>
            <label for="8G">8G</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="8H" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="8H") echo "disabled" ?>/>
            <label for="8H">8H</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="8I" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="8I") echo "disabled" ?>/>
            <label for="8I">8I</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="8J" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="8J") echo "disabled" ?>/>
            <label for="8J">8J</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="8K" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="8K") echo "disabled" ?>/>
            <label for="8K">8K</label>
            </li>
            <li class="seat">
            <input type="checkbox" id="8L" name="platinum"  onclick="func(this);" <?php for($i=0; $i<sizeof($selseats); $i++) if($selseats[$i]=="8L") echo "disabled" ?>/>
            <label for="8L">8L</label>
            </li>
        </ol>
        </li>
    </ol>
    </div>
    <br><br><br>

    </div><br>
    </center>
    <div class="text-center" id="checkout">
        <!-- <input type="textbox" name="seats" id="seats" value=""/> -->
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon0">Selected Seats</span>
          <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon0" name="seats" id="seats" value=""  onkeydown="return false;" style="caret-color: transparent !important; cursor:default;" required />
        </div>          
        <br>
        <button class="w-50 btn btn-danger btn-lg mt-3" type="submit">Continue to checkout</button>
    </div><br><BR><BR>


    <?php include('footer.html'); ?>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"></script>


</body>

</html>