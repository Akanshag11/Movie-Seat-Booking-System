<?php
    session_start();

    $servername="localhost";
    $username="root";
    $password="";
    $dbname="proj";
    $conn=mysqli_connect($servername, $username, $password, $dbname);   

    $mov_id = $_SESSION['mov_id'];
    $mov_name = $_SESSION['mov_name'];
    $date = $_SESSION['date'];
    $theatre_id = $_SESSION['theatreid'];
    $theatre_name = $_SESSION['theatrename'];
    $time = $_SESSION['time'];
    $cust_name = $_POST['cust_name'];
    $cust_email = $_POST['cust_email'];
    $cust_phno = $_POST['cust_phno'];
    $seats1 = $_POST['seats'];
    $seats = trim($seats1);
    $selseats = explode(" ", $seats);
    $no_of_seats = sizeof($selseats);
    $bill =0;
    $sql0 = "SELECT * FROM customer WHERE cust_name='$cust_name' AND email='$cust_email' AND phno='$cust_phno'";
    $query0 = mysqli_query($conn, $sql0);
    $valid0 = mysqli_num_rows($query0)==0;
    if($valid0){
        $sql1 = "INSERT INTO customer (cust_id, cust_name, email, phno)
        VALUES ('','$cust_name','$cust_email','$cust_phno')";

        mysqli_query($conn, $sql1);
    }

    $sql2 = "SELECT * FROM customer WHERE cust_name = '$cust_name' AND email='$cust_email' AND phno='$cust_phno'";
    $query1 = mysqli_query($conn, $sql2);
    $valid1 = mysqli_num_rows($query1)>0;

    if($valid1){
        while($row=mysqli_fetch_assoc($query1)){
            $cust_id = $row['cust_id'];
        }
    }

    $sql3 = "INSERT INTO reservations (res_id, cust_id, no_of_tickets)
    VALUES ('','$cust_id', '$no_of_seats')";

    mysqli_query($conn, $sql3);

    $sql4 = "SELECT * FROM reservations WHERE cust_id = '$cust_id'";
    $query2 = mysqli_query($conn, $sql4);
    $valid2 = mysqli_num_rows($query2)>0;

    if($valid2){
        while($row=mysqli_fetch_assoc($query2)){
            $res_id = $row['res_id'];
        }
    }

    for($i=0; $i < sizeof($selseats); $i++){
        $sql5 = "INSERT INTO booking (res_id, mov_id, th_id, show_date, show_time, seat_id)
        VALUES ('$res_id', '$mov_id', '$theatre_id', '$date', '$time', '$selseats[$i]') ";
        mysqli_query($conn,$sql5);
    }

    for($i=0; $i<sizeof($selseats); $i++){
        $sql6 = "SELECT * FROM seats WHERE seat_id= '$selseats[$i]'";
        $query3 = mysqli_query($conn, $sql6);
        $valid3 = mysqli_num_rows($query3)>0;
        if($valid3){
            while($row=mysqli_fetch_assoc($query3)){
                $seat_type = $row['seat_type'];
            }
        }
        if($seat_type == "gold"){
            $bill = $bill + 300;
        }
        else{
            $bill = $bill + 500;
        }
    }

    mysqli_close($conn);



    // header( "refresh:10;url=index.php" );
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title>Receipt</title>
	<style>
		.invoice-box {
			max-width: 800px;
			margin: auto;
			padding: 30px;
			border: 1px solid #eee;
			box-shadow: 0 0 10px rgba(0, 0, 0, .15);
			font-size: 16px;
			line-height: 24px;
			font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			color: #555;
		}

		.invoice-box table {
			width: 100%;
			line-height: inherit;
			text-align: left;
		}

		.invoice-box table td {
			padding: 5px;
			vertical-align: top;
		}

		.invoice-box table tr td:nth-child(2) {
			text-align: right;
		}

		.invoice-box table tr.top table td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.top table td.title {
			font-size: 45px;
			line-height: 45px;
			color: #333;
		}

		.invoice-box table tr.information table td {
			padding-bottom: 40px;
		}

		.invoice-box table tr.heading td {
			background: #eee;
			border-bottom: 1px solid #ddd;
			font-weight: bold;
		}

		.invoice-box table tr.details td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.item td {
			border-bottom: 1px solid #eee;
		}

		.invoice-box table tr.item.last td {
			border-bottom: none;
		}

		.invoice-box table tr.total td:nth-child(2) {
			border-top: 2px solid #eee;
			font-weight: bold;
		}

		@media only screen and (max-width: 600px) {
			.invoice-box table tr.top table td {
				width: 100%;
				display: block;
				text-align: center;
			}

			.invoice-box table tr.information table td {
				width: 100%;
				display: block;
				text-align: center;
			}
		}

		/** RTL **/
		.rtl {
			direction: rtl;
			font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		}

		.rtl table {
			text-align: right;
		}

		.rtl table tr td:nth-child(2) {
			text-align: left;
		}

		.footer-brand {
			overflow: hidden;
		}

		.footer-brand:before {
			content: "";
			display: block;
			position: relative;
			background: #aa964c;
			box-shadow: 0px 8px 0px rgba(0, 0, 0, 0.1);
		}

		.footer-brand .footer-heading {
			position: relative;
			/* top: 0vmax;
			left: 1vmax; */
			padding: 0;
			margin: 0;
			color: #fff;
			font-size: 1em;
			font-family: "Lobster", cursive;
			text-shadow: 2px 2px 0px #6e5a11, 4px 4px 0px #836d24, 6px 6px 0px #a88616,
				8px 8px 0px #b08909, 10px 10px 0px #ab995e;
		}
		.animate-bottom {
			position: relative;
			-webkit-animation-name: animatebottom;
			-webkit-animation-duration: 1s;
			animation-name: animatebottom;
			animation-duration: 1s
		}

		@-webkit-keyframes animatebottom {
		from { bottom:-100px; opacity:0 } 
		to { bottom:-50px; opacity:1 }
		}

		@keyframes animatebottom { 
		from{ bottom:-100px; opacity:0 } 
		to{ bottom:-50px; opacity:1 }
		}

	</style>
	<script>
		var myVar;

		function myFunction() {
		myVar = setTimeout(showPage, 3000);
		}

		function showPage() {
		document.getElementById("loader").style.display = "none";
		document.getElementById("content").style.display = "block";
		}
	</script>
</head>

<body onload="myFunction()" style="margin:0;">

	<div id="loader">
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;margin-top:40px" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
		<rect fill="#e15b64" x="15" y="15" width="30" height="30" rx="3" ry="3">
		<animate attributeName="x" dur="2s" repeatCount="indefinite" keyTimes="0;0.083;0.25;0.333;0.5;0.583;0.75;0.833;1" values="15;55;55;55;55;15;15;15;15" begin="-1.8333333333333333s"></animate>
		<animate attributeName="y" dur="2s" repeatCount="indefinite" keyTimes="0;0.083;0.25;0.333;0.5;0.583;0.75;0.833;1" values="15;55;55;55;55;15;15;15;15" begin="-1.3333333333333333s"></animate>
		</rect><rect fill="#f8b26a" x="15" y="15" width="30" height="30" rx="3" ry="3">
		<animate attributeName="x" dur="2s" repeatCount="indefinite" keyTimes="0;0.083;0.25;0.333;0.5;0.583;0.75;0.833;1" values="15;55;55;55;55;15;15;15;15" begin="-1.1666666666666667s"></animate>
		<animate attributeName="y" dur="2s" repeatCount="indefinite" keyTimes="0;0.083;0.25;0.333;0.5;0.583;0.75;0.833;1" values="15;55;55;55;55;15;15;15;15" begin="-0.6666666666666666s"></animate>
		</rect><rect fill="#abbd81" x="15" y="15" width="30" height="30" rx="3" ry="3">
		<animate attributeName="x" dur="2s" repeatCount="indefinite" keyTimes="0;0.083;0.25;0.333;0.5;0.583;0.75;0.833;1" values="15;55;55;55;55;15;15;15;15" begin="-0.5s"></animate>
		<animate attributeName="y" dur="2s" repeatCount="indefinite" keyTimes="0;0.083;0.25;0.333;0.5;0.583;0.75;0.833;1" values="15;55;55;55;55;15;15;15;15" begin="0s"></animate>
		</rect>
	</svg>
	</div>
 
	<div class="container animate-bottom" id="content" style="display:none;bottom:-50px">
		<div class="invoice-box" style="">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="mainlogo.png" width="50%">
								</td>
								<td>
									Invoice #: <?php echo $res_id; ?><br>
									
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									<br>
									<br>
								</td>

								<td>
									<b><?php echo $cust_name; ?></b><br>
									<?php echo $cust_phno; ?><br>
									<?php echo $cust_email; ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>
						Payment Status
					</td>

					<td>
						Check #
					</td>
				</tr>

				<tr class="details">
					<td>
						Success
					</td>

					<td>
						<?php echo '₹ ' . $bill; ?>
					</td>
				</tr>

				<tr class="heading">
					<td>
						Movie Details
					</td>

					<td>
						Info
					</td>
				</tr>

				<tr class="item">
					<td>
						Movie Name
					</td>

					<td>
						<?php echo $mov_name; ?>
					</td>
				</tr>

				<tr class="item">
					<td>
						Movie Date
					</td>

					<td>
						<?php echo $date; ?>
					</td>
				</tr>
				<tr class="item">
					<td>
						Movie Time
					</td>

					<td>
						<?php echo $time; ?>
					</td>
				</tr>

				<tr class="item">
					<td>
						Theatre 
					</td>

					<td>
						<?php echo $theatre_name; ?> </td>
				</tr>

				<tr class="item last">
					<td>
						Seats Booked
					</td>

					<td>
						<?php echo $seats; ?>
					</td>
				</tr>

				<tr class="total">
					<td></td>

					<td>
						₹ <?php echo $bill; ?>
					</td>
				</tr>

			</table>

		</div>
		
		<div style="max-width: 300px; margin:auto; padding: 30px;">
			<input type="button" class="btn btn-danger" onClick="window.print()" value="Print Recipt!" />
			<a type="button" class="btn btn-success" href='index.php'>Home-Page</a>
		</div>
	</div>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
