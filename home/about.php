<?php
session_start();
require '../config/connection.php';
$conn = Connect();
?>

<!DOCTYPE html>
<html>

<head>
    <title>About Our Company</title>
    <link rel="stylesheet" href="../css/about.css">
</head>

<body>

    <header class="header">
    <header>
        <h1 style="color:#fff;">Car Rental System</h1>
        <p style="color:#fff;">"Experience the freedom of the open road with our reliable car rental service. Choose from our wide selection of vehicles and enjoy a smooth, stress-free journey."</p>
    </header>
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
                        </a>
                    </li>

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

    <h1>About Our Company</h1>




    <section>
    <h2 style="text-align:center;">Who We Are</h2>
    <p>Welcome to Car Booking, your trusted source for car rental services. We have been providing quality car rental solutions for years, ensuring a seamless and enjoyable travel experience for our customers.</p>
</section>

<section>
    <h2 style="text-align:center;">Our Mission</h2>
    <p>Our mission is to provide reliable and affordable car rental services to our customers. We strive to make your journeys comfortable, whether you're traveling for business or pleasure.</p>
</section>

<section>
    <h2 style="text-align:center;">Testimonials</h2>
    <div class="testimonial">
        <h4 style="text-align:center;">MAHESH-BABU</h4>
        <p>"I had a great experience with Car Booking. The car was in excellent condition, and the staff was very helpful!"</p>
    </div>
    <div class="testimonial">
        <h4 style="text-align:center;">SAI-KIRAN</h4>
        <p>"Car Booking made my trip hassle-free. I highly recommend their services!"</p>
    </div>
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
                <li ><a href="https://www.facebook.com/">Linkedin<i class="fab fa-facebook"></i></a>
                </li>
                <li><a href="https://x.com/">X<i class="fab fa-twitter"></i></a></li>
                <li><a href="https://www.instagram.com/">Instagram<i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
        <div>
            <p class="copyright" style="color:#fff;">&copy;
                <?php echo date("Y"); ?> Car rental System
            </p>
        </div>
    </footer>

</body>

</html>