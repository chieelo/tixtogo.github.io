<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$title = "TIX-TO-GO!";
$current_page = basename($_SERVER['PHP_SELF']); // Gets the current page name
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        .gallery img {
            transition: transform 0.3s ease;
        }

        .gallery img:hover {
            transform: scale(1.05);
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
            min-width: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('https://scontent-hkg1-1.xx.fbcdn.net/v/t1.15752-9/410959416_1597650450771781_7408755687805912437_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeEjLKMiV2ItfaoVR0Rai2mpBSxY6riqcXEFLFjquKpxcYBWKlwhGL56qgwGKtC8n4eKoE7mvm59ruidHBRctv0y&_nc_ohc=YZdnwsMLz5cQ7kNvgHlVRMb&_nc_zt=23&_nc_ht=scontent-hkg1-1.xx&_nc_gid=AVbirsKJF1p4HSEP2tDQXsM&oh=03_Q7cD1QF9qhLKezKFOlYw_pK-2d05j29LgMlyDK_sVRiip2JuUw&oe=67469999'); 
            background-size: cover; 
            background-position: center; 
            color: white;
        }

        .header-container {
            height: 120px;
            display: flex;
            align-items: center; /* Center items vertically */
            padding: 0px; /* Add some padding */
            background: rgba(0, 0, 0, 0.7); /* Optional: Background color for header */
        }

        .header-logo {
            width: 50px; /* Adjust size as needed */
            height: auto; /* Maintain aspect ratio */
            margin-right: 20px; /* Space between logo and nav */
            margin-left: 20px;
        }

        .navbar {
            margin-left: auto; /* Align nav to the left */
            color: white;
            font-size: 1rem;
            text-transform: uppercase;
            font-weight: 700;
            list-style-type: none;
            padding: 0;
            display: flex; /* Use flexbox for nav items */
        }

        .navbar li {
            margin-right: 20px;
            transition: transform 0.3s ease;
        }

        .navbar li a {
            color: goldenrod; 
            text-decoration: none;
            padding: 10px 15px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .navbar li.active a {
            background-color: goldenrod;
            color: black;
            border-radius: 5px;
        }

        .navbar li:hover {
            transform: scale(1.1);
        }

        main {
            flex: 1; 
            padding: 20px;
            text-align: center; 
        }

        .fade-in {
            animation: fadeIn 1.5s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        footer {
            text-align: left; 
            padding: 7px;
            background: rgba(0, 0, 0, 0.3); 
            width: 100%;
            font-size: 1rem;
        }

        /* Modal Styles */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8); 
            padding: 20px;
            color: white;
            overflow: auto;
        }

        .modal-content {
            background-color: rgba(0, 0, 0, 0.9);
            margin: 10% auto; 
            padding: 50px;
            border: 2px solid #888;
            width: 1100px;
            max-width: 90%;
            max-height: 90vh;
            color: white;
            text-align: center;
        }

        .close {
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
            margin: -10px -10px 0 0;
        }

        .close:hover,
        .close:focus {
            color: goldenrod;
            text-decoration: none;
            cursor: pointer;
        }

    </style>
</head>
<body>

<header>
    <div class="header-container">
        <div class='logo'>
            <img src="https://scontent-hkg1-2.xx.fbcdn.net/v/t1.15752-9/462562062_1955578991581908_2370344541687667970_n.png?_nc_cat=103&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeGpKvnaG4bzoVIHzCBRRiOYity2O9zN_PiK3LY73M38-C12FHYsYrHwxmjHpHvggEBKEsSi6yEKG0bNEmNhxWZs&_nc_ohc=fd0o8elONz4Q7kNvgGZZPiN&_nc_zt=23&_nc_ht=scontent-hkg1-2.xx&_nc_gid=ATnTr5d5nKVfUHNt1XGjWpY&oh=03_Q7cD1QEiGkGNRihqbhkA1BlwgRsLaZK85nTfCgsIQE7TqurVEQ&oe=67469062" style="width: 120px; height: auto;" class="header-logo">
        </div>
        <div class='logo'>
            <p style="color: goldenrod; font-weight: bolder; font-size: 50px;
                text-decoration: none;
                padding: 10px 15px;
                transition: background-color 0.3s ease, color 0.3s ease;">
                TIX-TO-GO
            </p>            
        </div>
        <ul class="navbar">
            <li class="<?php echo ($current_page == 'cielo ver.php') ? 'active' : ''; ?>"><a href="index.php">Home</a></li>
            <li id="about-nav"><a href="#" id="about-btn">About</a></li>
            <li class="<?php echo ($current_page == 'services.php') ? 'active' : ''; ?>"><a href="#" id="services-btn">Services</a></li>
            <li id="contact-nav"><a href="#" id="contact-btn">Contact</a></li>
        </ul>
    </div>
</header>

<main>
<!-- Image Slider Section -->
<br><br><br><br>
<div style="display: flex; align-items: center;">
    <div style="flex: 1;">
        
        <div class="slider-container">
            <div class="slider">
                <div class="slide fade">
                    <img src="https://scontent-hkg4-2.xx.fbcdn.net/v/t39.30808-6/450132676_991100496358093_2082755761892653295_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=f727a1&_nc_ohc=VlWAyl1r71EQ7kNvgHOmlPz&_nc_zt=23&_nc_ht=scontent-hkg4-2.xx&_nc_gid=AwbImMV_-g2bZmtu38aJZ25&oh=00_AYCgOqgrtyljaa8krtHAaX_pZezmv0MSgsFlsxSVN5S2zg&oe=6724C06B" alt="Event 1">
                    <p>Tatak Tamaraws 2024</p>
                </div>
                <div class="slide fade">
                    <img src="https://scontent-hkg4-2.xx.fbcdn.net/v/t39.30808-6/449726262_991132226354920_4170148921362242228_n.jpg?stp=dst-jpg_s417x417&_nc_cat=111&ccb=1-7&_nc_sid=f727a1&_nc_ohc=c13VYVlmJ6QQ7kNvgH0lkPA&_nc_zt=23&_nc_ht=scontent-hkg4-2.xx&_nc_gid=AX6-htSJzhFhbd4ZKYLZibV&oh=00_AYBoLZv6M3ZThqGp5vafboLsATBtXseJbu5_lj_eP76-kA&oe=6724E51E" alt="Event 2">
                    <p>Arthur Miguel</p>
                </div>
                <div class="slide fade">
                    <img src="https://scontent-hkg1-2.xx.fbcdn.net/v/t39.30808-6/449486398_991170389684437_3037110189261947423_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=f727a1&_nc_ohc=t5BCtNSMHnwQ7kNvgGXORiE&_nc_zt=23&_nc_ht=scontent-hkg1-2.xx&_nc_gid=A3jfb2N9TTyKsirs9cbHNr8&oh=00_AYC4PXvA5UIR0U_E89CFmcdrIT3gfiJrq29XlSK3-fkyWg&oe=6724BD58" alt="Event 3">
                    <p>Lola Amour</p>
                </div>
                <div class="slide fade">
                    <img src="https://scontent-hkg4-1.xx.fbcdn.net/v/t39.30808-6/454692010_1016312653836877_2350363466205443317_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=f727a1&_nc_ohc=EodZ00PFTXMQ7kNvgFl1-8I&_nc_zt=23&_nc_ht=scontent-hkg4-1.xx&_nc_gid=AIkKqfCfjkLRAdhbSL188at&oh=00_AYAPU4tjlu1XFN3mzTS_K2g49k77JD46pcVs8gjst2Tveg&oe=6724DD56" alt="Event 4">
                    <p>Fireworks Show</p>
                </div>
            </div>
            <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
            <button class="next" onclick="changeSlide(1)">&#10095;</button>
        </div>
    </div>

    <div style="flex: 1; text-align: left;">
        <section>
            <h1 class="fade-in" style="padding: 20px; font-size: 4rem; margin: 0; color: transparent; -webkit-text-stroke: 2px white; text-stroke: 2px white;">
                Your <br>Front Row <br>to Every Show!
            </h1>
            <p class="fade-in" style="font-size: 1rem; line-height: 0; margin-right: 0;"> &ensp;&ensp; WonderFriends</p>
        </section>
    </div>
</div>

<style>
    .slider-container {
        position: relative;
        width: 70%;
        max-width: 800px; /* Adjust as needed */
        margin: auto;
        overflow: hidden;
    }

    .slider {
        display: flex;
        transition: transform 0.5s ease;
    }

    .slide {
        min-width: 100%;
        box-sizing: border-box;
        text-align: center;
        background: rgba(0, 0, 0, 0.3);
    }

    .slide img {
        width: 100%; /* Make images responsive */
        height: auto;
        border-radius: 10px;
    }

    .prev, .next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        z-index: 10;
    }

    .prev {
        left: 10px;
    }

    .next {
        right: 10px;
    }
</style>

<script>
    let slideIndex = 0;

    function showSlides() {
        const slides = document.querySelectorAll(".slide");
        const totalSlides = slides.length;
        for (let i = 0; i < totalSlides; i++) {
            slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > totalSlides) {slideIndex = 1}    
        slides[slideIndex - 1].style.display = "block";  
        setTimeout(showSlides, 5000); // Change image every 5 seconds
    }

    function changeSlide(n) {
        slideIndex += n;
        const slides = document.querySelectorAll(".slide");
        const totalSlides = slides.length;
        if (slideIndex >= totalSlides) {slideIndex = 0;}
        if (slideIndex < 0) {slideIndex = totalSlides - 1;}
        for (let i = 0; i < totalSlides; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex].style.display = "block";
    }

    showSlides(); // Initialize the slideshow
</script>
<br><br><br>
</main>


<!-- About Modal -->
<div id="aboutSection" class="modal">
    <div class="modal-content fade-in">
        <span class="close">&times;</span>
        <h2 style="color: orange;">About Tix-to-Go</h2>
        <p>Tix-to-Go is a convenient and flexible ticket booking system that allows users to book tickets for various events and shows, anywhere at any time. <br> It’s designed to make the ticket-purchasing experience smooth and hassle-free.</p>
    </div>
</div>

<!-- Services Modal -->
<div id="servicesSection" class="modal">
    <div class="modal-content fade-in">
        <span class="close">&times;</span>
        <h2 style="color: orange; font-weight: bold;">Services Offer</h2>
        
        <h4 style=" color: white; font-weight: bold;">TIME-EFFICIENT BOOKING</h4>
        <p style="text-align: justify; color: white;">Tix-to-go allows you to maximize your time with its built-in time-efficient design. It processes your booking as soon as you secure that slot. With us, time is not a problem.</p>
        
        <h4 style=" color: white; font-weight: bold;">HASSLE-FREE RESERVATION</h4>
        <p style="text-align: justify; color: white;">Without having to traverse long face-to-face queues, you no longer have to surrender your blood, sweat, and tears. In no time and without hassle, you can meet your idols!</p>
        
        <h4 style=" color: white; font-weight: bold;">USER ACCOUNTS</h4>
        <p style="text-align: justify; color: white;">Tix-to-go allows you to create an account that could track your previous and current bookings. It provides easier access to previous records and concert updates.</p>
        
        <h4 style=" color: white; font-weight: bold;">SECURE PAYMENT TRANSFERS</h4>
        <p style="text-align: justify; color: white;">Secure payment options using various methods, including credit/debit cards, e-wallets, and other online payment systems.</p>
    </div>
</div>

<!-- Contact Modal -->
<div id="contactSection" class="modal">
    <div class="modal-content fade-in">
        <span class="close">&times;</span>
        <h2 style="color: orange;">Contact Information</h2>
        <p>Tel: +63 (2) 1234-5678 | +63 907 240 9017</p>
        <p>Email: <a href="mailto:wonderfriends@tix-to-go.com" style="color: goldenrod;">wonderfriends@tix-to-go.com</a></p>
    </div>
</div>

<script>
    var aboutModal = document.getElementById("aboutSection");
    var servicesModal = document.getElementById("servicesSection");
    var contactModal = document.getElementById("contactSection");

    var aboutBtn = document.getElementById("about-btn");
    var servicesBtn = document.getElementById("services-btn");
    var contactBtn = document.getElementById("contact-btn");

    var aboutNav = document.getElementById("about-nav");
    var servicesNav = document.getElementById("services-nav");
    var contactNav = document.getElementById("contact-nav");

    var span = document.getElementsByClassName("close");

    aboutBtn.onclick = function() {
        aboutModal.style.display = "block";
        aboutNav.classList.add("active");
        contactNav.classList.remove("active");
        servicesNav.classList.remove("active");
        document.body.classList.add("no-hover");
    }

    servicesBtn.onclick = function() {
        servicesModal.style.display = "block";
        servicesNav.classList.add("active");
        aboutNav.classList.remove("active");
        contactNav.classList.remove("active");
        document.body.classList.add("no-hover");
    }

    contactBtn.onclick = function() {
        contactModal.style.display = "block";
        contactNav.classList.add("active");
        aboutNav.classList.remove("active");
        servicesNav.classList.remove("active");
        document.body.classList.add("no-hover");
    }

    for (var i = 0; i < span.length; i++) {
        span[i].onclick = function() {
            aboutModal.style.display = "none";
            servicesModal.style.display = "none";
            contactModal.style.display = "none";
            aboutNav.classList.remove("active");
            servicesNav.classList.remove("active");
            contactNav.classList.remove("active");
            document.body.classList.remove("no-hover");
        }
    }

    window.onclick = function(event) {
        if (event.target == aboutModal || event.target == servicesModal || event.target == contactModal) {
            aboutModal.style.display = "none";
            servicesModal.style.display = "none";
            contactModal.style.display = "none";
            aboutNav.classList.remove("active");
            servicesNav.classList.remove("active");
            contactNav.classList.remove("active");
            document.body.classList.remove("no-hover");
        }
    }
</script>

<footer>
    <p class="fade-in">&copy; <?php echo date("Y"); ?> Tix-To-Go Website. All rights reserved.</p>
</footer>

</body>
</html>
