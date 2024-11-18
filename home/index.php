<?php
session_start();
require '../config/connection.php';
$conn = Connect();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Car Rental System</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>

    <header>
        <h1>Car Rental System</h1>
        <p>"Experience the freedom of the open road with our reliable car rental service. Choose from our wide selection
            of vehicles and enjoy a smooth, stress-free journey."</p>

    </header>

    <?php
    if (isset($_SESSION['login_agency'])) {
        ?>
        <nav>
            <ul>
                <li><a class="nav-bar" href="index.php">Home</a></li>
                <li><a class="nav-bar" href="#">Welcome
                        <?php echo $_SESSION['login_agency']; ?>
                    </a></li>

                <li><a class="nav-bar" href="../agency/addcar.php">Add Car</a></li>
                <li><a class="nav-bar" href="../agency/agencyview.php">View Booked Cars</a></li>

                <li><a class="nav-bar" href="about.php">About US</a></li>
                <li><a class="nav-bar" href="../config/logout.php">Logout</a></li>
            </ul>
        </nav>
        <?php
    } else if (isset($_SESSION['login_customer'])) {
        ?>
            <nav>
                <ul>
                    <li><a class="nav-bar" href="index.php">Home</a></li>
                    <li><a class="nav-bar" href="#">Welcome
                        <?php echo $_SESSION['login_customer']; ?>
                        </a></li>

                    <li><a class="nav-bar" href="../customer/prereturncar.php">Return Now</a></li>
                    <li><a class="nav-bar" href="../customer/mybookings.php"> My Bookings</a></li>

                    <li><a class="nav-bar" href="about.php">About US</a></li>
                    <li><a class="nav-bar" href="../config/logout.php">Logout</a></li>

                </ul>
            </nav>
        <?php
    } else {
        ?>
            <nav>
                <ul>
                    <li><a class="nav-bar" href="index.php">Home</a></li>
                    <li><a class="nav-bar" href="../agency/agency_login.php">Agency Login</a></li>
                    <li><a class="nav-bar" href="../customer/customer_login.php">Customer Login</a></li>
                    <li><a class="nav-bar" href="about.php">About US</a></li>
                </ul>
            </nav>
        <?php
    }
    ?>

    <section class="menu-content">
        <?php
        $sql1 = "SELECT * FROM cars WHERE car_available='yes'";
        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result1) > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $car_id = $row1["car_id"];
                $car_model = $row1["car_model"];
                $car_number = $row1["car_number"];
                $seating_cap = $row1["seating_cap"];
                $rent_per_day = $row1["rent_per_day"];
                $car_img = $row1["car_img"];
                ?>
                <div class="sub-menu">
                    <img src="<?php echo $row1['car_img']; ?>" alt="Car Image" width="250" height="150">



                    <h5><b>
                            <?php echo $car_model; ?>
                        </b></h5>
                    <h6>Car Number
                        <?php echo $car_number; ?>
                    </h6>
                    <h6>Seating Capacity:
                        <?php echo $seating_cap; ?>
                    </h6>
                    <h6>Rent Per Day:
                        <?php echo $rent_per_day; ?>
                    </h6>
                    <?php
                    if (isset($_SESSION['login_customer'])) {
                        ?>
                        <a href="../customer/booking.php?id=<?php echo $car_id; ?>" class="btn">Book Car</a>
                        <?php
                    } else {
                        ?>
                        <a href="../customer/customer_login.php" class="btn">Log In to Book</a>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
        } else {
            ?>
            <h1>Sorry, No cars available, Please check Later :(</h1>
            <?php
        }
        ?>
    </section>

    <footer>

        <div>
            <ul>
                <li><a class="footer" href="contact.php">Contact Us</a></li>
                <li><a class="footer" href="blog.php">Blog</a></li>
            </ul>
        </div>
        <div>
            <ul class="social-media">
                <li><a href="https://www.facebook.com/">Facebook<i
                            class="fab fa-facebook"></i></a>
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

</body>

</html>