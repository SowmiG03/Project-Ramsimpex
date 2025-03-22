<footer class="footer bg-white border-top py-4">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo Section (Left) -->
            <div class="col-12 col-md-3 text-md-start text-center mb-3 mb-md-0">
                <a class="footer-brand text-decoration-none d-inline-flex align-items-center">
                    <div class="footer-navbar-brand d-flex align-items-center">
                        <img src="images/logo.png" alt="Logo" width="62" height="64" class="d-inline-block align-text-center me-2">
                        <span class="footer-glow">Rams Impex</span>
                    </div>
                </a>
            </div>

            <!-- About Section (Center) -->
            <div class="col-12 col-md-4 text-center mb-3 mb-md-0 ">
                <p class="footer-text">
                    <strong class="footer-highlight">RAMS IMPEX</strong> is dedicated to providing top-quality textiles for various needs. 
                    Our commitment to quality, sustainability, and craftsmanship makes us your go-to choice 
                    for reliable, innovative textile solutions across the globe.
                </p>
            </div>

            <!-- Quick Links Section (Center) -->
            <div class="col-6 col-md-2 text-center">
                <h5 class="footer-title">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="index.php" class="text-dark text-decoration-none">Home</a></li>
                    <li><a href="products.php" class="text-dark text-decoration-none">Products</a></li>
                    <li><a href="about.php" class="text-dark text-decoration-none">About</a></li>
                    <li><a href="contact.php" class="text-dark text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <!-- Follow Us Section (Right) -->
            <div class="col-6 col-md-2  text-center ">
                <h5 class="footer-title">Follow Us</h5>
                <ul class="list-unstyled d-inline-block">
                    <li><a href="#" class="footer-link">
                        <i class="fab fa-facebook me-2 footer-icon"></i>Facebook</a></li>
                    <li><a href="#" class="footer-link">
                        <i class="fab fa-twitter me-2 footer-icon"></i>Twitter</a></li>
                    <li><a href="#" class="footer-link">
                        <i class="fab fa-instagram me-2 footer-icon"></i>Instagram</a></li>
                </ul>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="text-center mt-3">
            <p class="mb-0 footer-copyright">&copy; 2024 Rams Impex. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<!-- Footer Specific CSS -->
<style>
    .footer {
        background-color: white;
        border-top: 1px solid #ddd;
    }
    .footer-navbar-brand {
        display: flex;
        align-items: center;
    }
    .footer-glow {
        font-weight: bold;
        color: #6b0ea5;
        text-shadow: 0px 0px 8px rgba(107, 14, 165, 0.8), 
                     0px 0px 12px rgba(107, 14, 165, 0.6);
        animation: glowEffect 1.5s infinite alternate;
        font-size: 22px;
    }
    @keyframes glowEffect {
        0% {
            text-shadow: 0px 0px 8px rgba(107, 14, 165, 0.8), 
                         0px 0px 12px rgba(107, 14, 165, 0.6);
        }
        100% {
            text-shadow: 0px 0px 12px rgba(107, 14, 165, 1), 
                         0px 0px 16px rgba(107, 14, 165, 0.8);
        }
    }
    .footer-text {
        line-height: 1.8;
        color: #333;
        max-width: 500px;
        margin: auto;
        text-align: justify; /* Justified Text Alignment */
        margin-bottom: 30px; /* Space between About and Quick Links */
    }
    .footer-highlight {
        color: #6b0ea5;
    }
    .footer-title {
        color: #6b0ea5;
    }

    .list-unstyled{
        margin-bottom: 60px;
    }
    .footer-link {
        text-decoration: none;
        color: #333;
        display: block;
    }
    .footer-link:hover {
        color: #6b0ea5;
    }
    .footer-icon {
        color: #6b0ea5;
    }
    .footer-copyright {
        color: #6b0ea5;
    }
    /* Margin adjustments for sections to maintain spacing */
   
</style>
