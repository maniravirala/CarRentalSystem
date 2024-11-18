<!DOCTYPE html>
<html>
<?php 
session_start();
require '../config/connection.php';
$conn = Connect();
?>
<head>
<title>My Booking</title>
<link rel="stylesheet" href="../css/mybooking.css">
</head>
<body id="page-top">
<header>
        <h1>Car Rental System</h1>
        <p>"Experience the freedom of the open road with our reliable car rental service. Choose from our wide selection of vehicles and enjoy a smooth, stress-free journey."</p>

    </header>

    <?php
    if (isset($_SESSION['login_agency'])) {
    ?>
        <nav>
            <ul>
                <li><a class="nav-bar" href="../agency/index.php">Home</a></li>
                <li><a class="nav-bar"  href="#">Welcome <?php echo $_SESSION['login_agency']; ?></a></li>

                        <li><a class="nav-bar"  href="../agency/addcar.php">Add Car</a></li>
                        <li><a class="nav-bar"  href="../agency/agencyview.php">View Booked Cars</a></li>

                <li><a class="nav-bar"  href="../home/about.php">About US</a></li>
                <li><a class="nav-bar"  href="../config/logout.php">Logout</a></li>
            </ul>
        </nav>
    <?php
    } else if (isset($_SESSION['login_customer'])) {
    ?>
<nav>
                <ul>
                <li><a class="nav-bar"  href="../home/index.php">Home</a></li>
                <li><a class="nav-bar"  href="#">Welcome <?php echo $_SESSION['login_customer']; ?></a></li>

                        <li><a class="nav-bar"  href="../customer/prereturncar.php">Return Now</a></li>
                        <li><a class="nav-bar"  href="../customer/mybookings.php"> My Bookings</a></li>

                <li><a class="nav-bar"  href="../home/about.php">About US</a></li>
                <li><a class="nav-bar"  href="../config/logout.php">Logout</a></li>


            </ul>
    </nav>
    <?php
    } else {
    ?>
        <nav>
            <ul>
                <li><a class="nav-bar"  href="../home/index.php">Home</a></li>
                <li><a class="nav-bar"  href="../agency/agency_login.php">Agency Login</a></li>
                <li><a class="nav-bar"  href="customer_login.php">Customer Login</a></li>
                <li><a class="nav-bar"  href="../home/about.php">About US</a></li>
            </ul>
        </nav>
    <?php
    }
    ?>
 
<?php 
// isset($_SESSION['login_customer']);
$login_customer=$_SESSION['login_customer']; 


$sql1 = "SELECT * FROM rentedcar rc, cars c
         WHERE rc.customer_username = '$login_customer' AND c.car_id=rc.car_id AND rc.return_status='R'";

$result1 = $conn->query($sql1);


    if (mysqli_num_rows($result1) > 0) {
?>
<div class="container">
      <div class="jumbotron">
        <h1 class="text-center">Your all previous Bookings</h1>
        <p class="text-center"> Hope you enjoyed our service </p>
      </div>
    </div>

    <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
<table class="table table-striped">
  <thead class="thead-dark">
<tr>
<th width="15%">Car Number</th>
<th width="15%">Car Model</th>
<th width="15%">Start Date</th>
<th width="15%">End Date</th>
<th width="15%">Number of Days</th>
</tr>
</thead>
<?php
        while($row = mysqli_fetch_assoc($result1)) {
?>
<tr>
<td><?php echo $row["car_number"]; ?></td>
<td><?php echo $row["car_model"]; ?></td>
<td><?php echo $row["start_date"] ?></td>
<td><?php echo $row["end_date"]; ?></td>
<td><?php echo $row["no_of_days"]; ?> </td>
<!-- <td>Rs.  <?php echo $row["total_amount"]; ?></td> -->
</tr>
<?php        } ?>
                </table>
                </div> 
        <?php } else {
            ?>
        <div class="container">
      <div class="jumbotron">
        <h1 class="text-center">You have not previously rented any cars till now!</h1>
        <!-- <p class="text-center"> Please rent cars in order to view your data here. </p> -->
      </div>
    </div>

            <?php
        } ?>   

</body>
<footer>

<div>
    <ul>
        <li><a class="footer" href="contact.php">Contact Us</a></li>
        <li><a class="footer" href="blog.php">Blog</a></li>
    </ul>
</div>
<div>
    <ul class="social-media">
        <li ><a href="https://www.facebook.com/">Facebook<i class="fab fa-facebook"></i></a>
        </li>
        <li><a href="https://x.com/">X<i class="fab fa-twitter"></i></a></li>
        <li><a href="https://www.instagram.com/">Instagram<i class="fab fa-instagram"></i></a></li>
    </ul>
</div>
<div>
    <p class="copyright">&copy;
        <?php echo date("Y"); ?> Car rental System
    </p>
</div>
</footer>
</html>