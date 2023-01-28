<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Show</title>
  <style type="text/css">
    .card{
      box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
      transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
      cursor: hand;
    }

    .card:hover{
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
    }

    
  </style>

</head>

<body>
  <?php include('navbar.html');?>

  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img
          src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/a58a7719-0dcf-4e0b-b7bb-d2b725dbbb8e/deu7no3-75f2aea5-d668-4ddd-8d73-9203f8b3004f.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2E1OGE3NzE5LTBkY2YtNGUwYi1iN2JiLWQyYjcyNWRiYmI4ZVwvZGV1N25vMy03NWYyYWVhNS1kNjY4LTRkZGQtOGQ3My05MjAzZjhiMzAwNGYucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.mGJeERKLIjquFjWiKP7nqZfaLFv9d4WT40Y-xQqErRo"
          height="650" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://static.toiimg.com/photo/80495408.jpeg" height="650" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://www.bollywoodhungama.com/wp-content/uploads/2017/09/83cover-banner.jpg" height="650"
          class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <br>
  <h1 style="text-align: center;">Now Showing</h1>

  <center>
  <div class="album py-5" style="background:#E7E9EB;">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5">

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
        <form action="theatreselection.php" method=post>
          <div class="col">
            <div class="card shadow-sm" style="border-radius: 4%; width:80%">
              <img class="bd-placeholder-img card-img-top" width="100%" height="400" src="<?php echo $row['mov_img'] ?>"
                aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"
                style=" height:400px; border-top-left-radius:4%; border-top-right-radius: 4%;">

              <div class="card-body">

                <div class="d-grid gap-1">
                  <center><b><?php echo ucwords($row['mov_name']) ?></b></center>
                  <input type='hidden' name='movid' value="<?php echo $row['mov_id'] ?>">
                  <input type='hidden' name='movname' value="<?php echo $row['mov_name'] ?>">
                  <button class="btn btn-danger" type="submit" name="submit">Book Now</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        <?php
            
          }
        }
        ?>


      </div>
    </div>
      </center>
    <?php include('footer.html'); ?>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"></script>


</body>

</html>