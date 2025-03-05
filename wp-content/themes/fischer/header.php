<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fischer Chess Academy</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&family=Syne:wght@400..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body>
    <section class="fischer-nav">
        <div class="container">
            <div class="nav-items">
                <img src="/wp-content/themes/fischer/assets/images/header/fischer-logo-header.png" alt="fischer logo">
                <a href="/">HOME</a>
                <a href="/about-us/">ABOUT</a>
                <a href="/achievements/">ACHIEVEMENTS</a>
                <a href="/contact-us/">CONTACT US</a>
                <div class="resources-wrapper">
                    <p class="resources">RESOURCES</p>
                    <div class="resources-inner-wrapper">
                        <a href="/blog/">BLOG</a>
                        <!-- <hr /> -->
                        <!-- <a href="/blog/">PDF</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- mobile nav -->
    <section class="fischer-nav-mob">
        <div class="hamburger-menu">
            <div class="bar"></div>
        </div>

        <nav class="mobile-menu">
            <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="/about-us/">ABOUT</a></li>
                <li><a href="/achievements/">ACHIEVEMENTS</a></li>
                <li><a href="/contact-us/">CONTACT US</a></li>
                <li class="mob-resources">
                    <p>RESOURCES</p>
                    <div class="mob-resources-wrapper">
                        <a href="/blog/">BLOG</a>
                        <!-- <a href="/pdf/">PDF</a> -->
                    </div>
                </li>

            </ul>
        </nav>
    </section>