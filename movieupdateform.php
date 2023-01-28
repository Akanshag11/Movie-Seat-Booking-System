<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
      body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-repeat: no-repeat;
    background-size: 100% 100%
}

.card {
    padding: 30px 40px;
    margin-top: 60px;
    margin-bottom: 60px;
    border: none !important;
    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
}

.blue-text {
    color: #00BCD4
}

.form-control-label {
    margin-bottom: 0
}

input,
textarea,
button {
    padding: 8px 15px;
    border-radius: 5px !important;
    margin: 5px 0px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    font-size: 18px !important;
    font-weight: 300
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #00BCD4;
    outline-width: 0;
    font-weight: 400
}

.btn-block {
    text-transform: uppercase;
    font-size: 15px !important;
    font-weight: 400;
    height: 43px;
    cursor: pointer
}

.btn-block:hover {
    color: #fff !important
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}
    </style>
  </head>
  <body>
    <?php include('admin_navbar.html'); ?>
    <?php
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="proj";
        $conn=mysqli_connect($servername, $username, $password, $dbname);
        $mov_id = $_POST['movietext'];

        $sql = "SELECT * FROM movie WHERE mov_id = '$mov_id'";
        $query = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($query)){
    ?>
    <div class="container-fluid px-1 py-5 mx-auto">
      <div class="row d-flex justify-content-center">
          <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
              
              <div class="card">
                  <h3 class="text-center mb-4">ADD MOVIE</h3>
                  <form class="form-card" method="POST" action="movie_update.php">
                      <input type="hidden" value="<?php echo $mov_id ?>" name="movid" />
                      <div class="row justify-content-between text-left">
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Movie Name<span class="text-danger"> *</span></label> <input type="text" id="mov_name" name="mov_name" placeholder="Enter Movie Name" value='<?php echo $row['mov_name'] ?>' required> </div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Language<span class="text-danger"> *</span></label> <input type="text" id="mov_lang" name="mov_lang" placeholder="Enter Language of Movie" value='<?php echo $row['mov_lang'] ?>' required> </div>
                      </div>
                      <div class="row justify-content-between text-left">
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Duration<span class="text-danger"> *</span></label> <input type="text" id="duration" name="duration" placeholder="Enter Duration of Movie" value='<?php echo $row['mov_duration'] ?>' required> </div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Director<span class="text-danger"> *</span></label> <input type="text" id="director" name="director" placeholder="Enter Director of Movie" value='<?php echo $row['mov_director'] ?>' required> </div>
                      </div>
                      <div class="row justify-content-between text-left">
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Release Date<span class="text-danger"> *</span></label> <input type="date" id="date" name="date" placeholder="Enter Release Date of Movie" value='<?php echo $row['release_date'] ?>' required> </div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">genre<span class="text-danger"> *</span></label> <input type="text" id="genre" name="genre" placeholder="Enter Genre of Movie" value='<?php echo $row['genre'] ?>' required> </div>
                      </div>
                      <div class="row justify-content-between text-left">
                          <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Movie Poster<span class="text-danger"> *</span></label> <input type="text" id="poster" name="poster" placeholder="Movie Poster Link" value='<?php echo $row['mov_img'] ?>' required> </div>
                      </div>
                      <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Movie Banner<span class="text-danger"> *</span></label> <input type="text" id="banner" name="banner" placeholder="Movie Banner Link" value='<?php echo $row['mov_banner'] ?>' required> </div>
                    </div>
                      <div class="row justify-content-center">
                          <div class="form-group col-sm-6 mt-3"> <button type="submit" name= "submit" class="btn-block btn-primary">Add</button> </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
    <?php
        
    }

    ?>
    
    <?php include('footer.html'); ?> 


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  </body>
</html>