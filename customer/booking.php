<!DOCTYPE html>
<html>
<?php
include('../config/session_customer.php');
if (!isset($_SESSION['login_customer'])) {
    session_destroy();
    header("location: customer_login.php");
}
?>
<title>Book Car </title>
<link rel="stylesheet" href="../css/booking.css">

<head>

</head>

<body ng-app="">
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


    <div class="container" style="justify-content:center;">
        <h1 id="head">Book Your Cars Here</h1>
        <div class="main">
            <form class="form" action="booking_confirm.php" method="POST">

                <?php
                $car_id = $_GET["id"];
                $sql1 = "SELECT * FROM cars WHERE car_id = '$car_id'";
                $result1 = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result1)) {
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $car_model = $row1["car_model"];
                        $car_number = $row1["car_number"];
                        $seating_cap = $row1["seating_cap"];
                        $rent_per_day = $row1["rent_per_day"];
                    }
                }
                ?>

                <h5>Car Model:&nbsp; <b>
                <?php echo ($car_model); ?>
                </b></h5>
                <br>

                <h5>Car Number:&nbsp;<b>
                <?php echo ($car_number); ?>
                </b></h5>
                <br>

                <?php
                $_SESSION['car_number'] = $car_number
                ?>

                <h5> Seating capacity:&nbsp;<b>
                <?php echo ($seating_cap); ?>
                </b></h5>
                <br>

                <label>
                    <h5>Please fill number of days: </h5>
                </label>
                <br>

                <input type="number" name="no_of_days" required="">

                <?php $today = date("Y-m-d") ?>
                <label>
                    <h5>Start Date:</h5>
                </label>
                <input type="date" name="rent_start_date" min="<?php echo ($today); ?>" required="">
                &nbsp;

                <h5>Rent Per day: <?php echo ("Rs. " . $rent_per_day); ?></h5>

                <input type="hidden" name="hidden_carid" value="<?php echo $car_id; ?>">
                <br>
                <input type="submit" name="submit" value="Rent Now" class="submit">


                <h6><strong>Note:</strong> You will be charged with extra <span class="text-danger">Rs. 200</span> for each
                day after the due date ends.</h6>
            </form>


        </div>

    </div>

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