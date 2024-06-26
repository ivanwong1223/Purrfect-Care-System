<?php
    session_start();
    if(isset($_SESSION["customerID"])){
        include("conn.php");
    }else {
        echo "<script>alert('Please Login!');window.location.href='CustomerLogin.php';</script>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="icon" href="images/Dog_Cat_Logo.png" type="image/jpg" sizes="50x50">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <link rel = "stylesheet" href = "customer_homepage_css.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
    </head>
    <body>
    <?php
    include("conn.php");
    $con = mysqli_connect("localhost","root","","purrfect_care");
    $query = "SELECT serviceName FROM main_services WHERE mainServiceID > 6";
    $result5 = mysqli_query($con, $query);
    $hiddenNumber = 7;
    ?>

    <nav class="navbar navbar-expand-lg bg-light">
            
            <div class="container">
                <a class="navbar-brand" href="#">
                <img src="images/Dog_Cat_Logo.png" alt="logo" width="50" height="50">
                </a>
            </div>
            <span class="navbar-brand mb-0 h1">Purrfect Care</span>
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="customer_homepage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="customer_view_appointment.php">View Appointment</a>
                            </li>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Additional Services
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                while ($row = mysqli_fetch_assoc($result5)) {
                                    $serviceName = $row['serviceName'];
                                    echo '<li><a class="dropdown-item" href="book_appointment.php?hidden_number=' . $hiddenNumber . '">' . $serviceName . '</a></li>';
                                    $hiddenNumber++; 
                                }
                                ?>
                            </ul>    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            My Profile
                            </a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="Manage_Profile_Page.html">View & Edit My Profile</a></li>
                            
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="managerLogout.php">Logout</a></li>

                        </ul>
                    </ul>
                </div>
                <form class="d-flex" role="search" method="post" action="search_result.php">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <div class="desc">
            <br>
            <h1><b>Welcome to Purrfect Care!</b></h1>
            <h4>Provide trusted pet care services.</h4>
            <br>
            <div class="service_desc">
                <br>
                <h1><b>Services for every pets</b></h1>
                <div class="grooming">
                    <img src="images/grooming.png" class="img" alt="Grooming" id="floatLeft">
                    <h2><b>Pet Grooming</b></h2>
                    <p>Various pet grooming services provided include bathing, brushing, hair trimming or clipping, nail trimming, ear cleaning, teeth cleaning, and gland expression.</p>
                    <a href="grooming_services.php"><button class="servicebtn">Book A Grooming Appointment</button></a>
                </div>
                <div class="boarding">
                    <img src="images/boarding.png" class="img" alt="Boarding" id="floatRight">
                    <h2><b>Pet Boarding</b></h2>
                    <p>Provides temporary housing and care for pets when you are away.</p>
                    <a href="boarding_services.php"><button class="servicebtn">Book For Pet Boarding Service</button></a>
                </div>
                <div class="vet">
                    <img src="images/vet.png" class="img" alt="Veterinary" id="floatLeft">
                    <h2><b>Veterinary</b></h2>
                    <p>Provides diagnosis, treatment, and prevention of diseases, injuries, and disorders for your pet.</p>
                    <a href="veterinary_services.php"><button class="servicebtn">Book For Pet Veterinary</button></a>
                </div>
            </div>
            <div class="abt_us">
                <img src="images/abt_us.png" class="aboutUs" alt="About_us" id="floatRight">
                <h1><b>About Us</b></h1>
                <p>
                    Welcome to PurrfectCare, where we believe that pets are family. 
                    We are a team of passionate pet lovers who are dedicated to providing exceptional care for your furry companions. 
                    Our mission is to create a safe, nurturing, and fun environment where your pets can thrive.
                </p>
                <p>
                    We offer a wide range of services, including veterinary, pet boarding, and pet grooming. 
                    Our team of experienced and certified pet care professionals is dedicated to ensuring that your pets receive 
                    the highest level of care and attention. We understand that every pet has unique needs and personalities, 
                    which is why we tailor our services to meet their individual needs.
                </p>
                <p>
                    At PurrfectCare, we pride ourselves on our commitment to excellence. Our team is passionate about animals 
                    and is always looking for ways to improve our services. We treat your pets as if they were our own, and we 
                    look forward to becoming your trusted pet care partner. <b>Thank you for choosing PurrfectCare!</b>
                </p>
            </div>
        
            <footer>
                <h1>Contact Us</h1>
                <img src="images/whatsapp_icon.png" class="icon"> 012-3456789 <tab>
                <img src = "images/Instagram_icon.png" class = "icon"> purrfect_care <tab>
                <img src = "images/fb_icon.png" class = "icon"> Purrfect Care My 
            </footer>
        </div>
    </body>
</html>