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
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('https://scontent.fmnl3-2.fna.fbcdn.net/v/t39.30808-6/449480841_991183609683115_7655680931208077031_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=f727a1&_nc_ohc=-clMBu6fFQQQ7kNvgFGSd8U&_nc_zt=23&_nc_ht=scontent.fmnl3-2.fna&_nc_gid=AR9JE13b9VnpBwOmCvhj2cM&oh=00_AYAjggoDSjfS6JGTZOp8JrqFI6gt-p7AxsCYCj2Tk_GcXg&oe=671D8736'); 
            background-size: cover; 
            background-position: center; 
            color: white;
        }

        header {
            background: rgba(0, 0, 0, 0.7); 
            text-align: right; 
            padding: 20px 0;
        }

        .navbar {
            margin-left: auto;
            color: white;
            font-size: 1rem;
            text-transform: uppercase;
            font-weight: 700;
            list-style-type: none;
            padding: 0;
        }

        .no-hover nav ul li a:hover {
            background-color: inherit; /* Keeps the background unchanged */
            color: inherit; /* Keeps the color unchanged */
        }

        nav ul {
            padding: 0;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
            transition: transform 0.3s ease;
        }

        nav ul li:hover,
        nav ul li.active {
            transform: scale(1.1);
        }

        nav ul li a {
            color: goldenrod; 
            text-decoration: none;
            padding: 10px 15px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        nav ul li.active a {
            background-color: goldenrod;
            color: black;
            border-radius: 5px;
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
            z-index: 10; /* Ensure modals are on top */
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
    <nav class="fade-in">
        <ul class="navbar">
            <li class="<?php echo ($current_page == 'cielo ver.php') ? 'active' : ''; ?>"><a href="cielo ver.php">Home</a></li>
            <li id="about-nav"><a href="#" id="about-btn">About</a></li>
            <li class="<?php echo ($current_page == 'services.php') ? 'active' : ''; ?>"><a href="services.php">Services</a></li>
            <li id="contact-nav"><a href="#" id="contact-btn">Contact</a></li>
        </ul>
    </nav>
</header>

<main>
    <div style="display: flex; justify-content: left; align-items: center; height: 70vh; text-align: left;">
        <section>
            <p class="fade-in" style="font-size: 1rem; line-height: 0; margin: 0;">WonderFriends</p>
            <h1 class="fade-in" style="padding: 20px; font-size: 5.7rem; margin: 0;">Your <br>Front Row <br>to Every Show!</h1>
            <h1 class="fade-in" style="padding: 20px; font-size: 3rem; margin: 0;">///////////////////////////////////////////////////</h1>
        </section>
    </div>
</main>

<!-- About Modal -->
<div id="aboutSection" class="modal">
    <div class="modal-content fade-in">
        <span class="close">&times;</span>
        <h2 style="color: orange;">About Tix-to-Go</h2>
        <p>Tix-to-Go is a convenient and flexible ticket booking system that allows users to book tickets for various events and shows, anywhere at any time. <br> It’s designed to make the ticket-purchasing experience smooth and hassle-free.</p>
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
var contactModal = document.getElementById("contactSection");

var aboutBtn = document.getElementById("about-btn");
var contactBtn = document.getElementById("contact-btn");

var aboutNav = document.getElementById("about-nav");
var contactNav = document.getElementById("contact-nav");
var homeNav = document.getElementById("home-nav"); // Add home-nav if needed

// Ito yung nagsasara ng link/modal <span>
var span = document.getElementsByClassName("close");

aboutBtn.onclick = function() {
    aboutModal.style.display = "block";
    aboutNav.classList.add("active"); // Add active class to About menu
    contactNav.classList.remove("active"); // Ensure Contact is not active
    document.body.classList.add("no-hover"); // Disable hover for all links
}

contactBtn.onclick = function() {
    contactModal.style.display = "block";
    contactNav.classList.add("active"); // Add active class to Contact menu
    aboutNav.classList.remove("active"); // Ensure About is not active
    document.body.classList.add("no-hover"); // Disable hover for all links
}

/* Loop sa close button (x) and nagset sa onclick events para maclose yung modal */
for (var i = 0; i < span.length; i++) {
    span[i].onclick = function() {
        aboutModal.style.display = "none"; // Close About modal
        contactModal.style.display = "none"; // Close Contact modal
        aboutNav.classList.remove("active"); // Remove active class from About
        contactNav.classList.remove("active"); // Remove active class from Contact
        document.body.classList.remove("no-hover"); // Re-enable hover effect for all links
    }
}

</script>

<footer>
    <p class="fade-in">&copy; <?php echo date("Y"); ?> Tix-To-Go Website. All rights reserved.</p>
</footer>

</body>
</html>
