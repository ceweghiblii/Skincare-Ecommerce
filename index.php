<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bliss</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.html"><img src="images/logo.png" alt="logo" width="125px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#philosophy">Philosophy</a></li>
                    <li><a href="#all-products">Products</a></li>                   
                    <li><a href="account.html">Log Out</a></li>
                    </ul>
                </nav>
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
            <div class="row">
                <div class="col-2">
                    <h1>Elevate Your <br> Skincare Routine!</h1>
                    <p>Bliss isn't about luck. It's about consistency. Consistent care and effort lead to a glowing complexion. Beauty will follow.</p>
                    <a href="#all-products" class="btn">Explore Now </a>
                </div>
                <div class="col-2">
                    <img src="images/image1.png">
                </div>
            </div>
        </div>
    </div>

    <!-- Feadtued Categories -->

    <div class="categories">
        <div class="small-container">
            <h2 class="title" id="philosophy">Philosophy</h2>
            <div class="row">
                <div class="col-3">
                    <img src="images/Group 21 (1).png">
                </div>
                <div class="col-3">
                    
                    <img src="images/Group 20.png">
                </div>
                <div class="col-3">
                    <img src="images/Group 22 (1).png">
                </div>
                
            </div>
        </div>
    </div>

    <!-- Featured Products -->

    <div class="small-container">
        <h2 class="title" id="all-products">All Products</h2>
        <div class="row">      
            <?php include 'showProduct.php'; ?>
        </div>
    </div>

    <!-- Offer -->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="images/exclusive.png" class="offer-img">
                </div>
                <div class="col-2">
                    <p>Exclusively Available on Bliss</p>
                    <h1>Cream co. Moisturizer</h1>
                    <small>Unlock radiant and hydrated skin with our Hydrating Glow Moisturizer. Specially formulated to provide deep hydration and a natural glow, this moisturizer is perfect for all skin types. Enriched with nourishing ingredients, it delivers a boost of moisture that lasts all day, leaving your skin feeling soft, smooth, and rejuvenated.<br></small>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial -->
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Bliss offers a comprehensive online shopping experience for skincare enthusiasts. From its user-friendly interface to its extensive product range, the website stands out as a go-to destination for high-quality skincare products.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="images/user-1.png">
                    <h3>Heri Digidaw</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Bliss's e-commerce website excels in providing a seamless and enjoyable shopping experience. Its combination of user-friendly navigation, appealing design, extensive product range, and excellent customer support makes it a top choice for skincare enthusiasts. </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="images/user-2.png">
                    <h3>Iwan Sayur</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>The checkout process is straightforward and secure, with multiple payment options available. The website uses advanced encryption to protect customer data, ensuring a safe shopping experience. </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="images/user-3.png">
                    <h3>Rusdi Kopling</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Brands -->



    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">

                <div class="footer-col-2">
                    <img src="images/logo-white.png">
                    <p>Our Purpose Is To Make a Bare and Beauty Skin.
                    </p>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2024 - Deandra Santoso</p>
        </div>
    </div>

    <!-- javascript -->

    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            }
            else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>

</body>

</html>