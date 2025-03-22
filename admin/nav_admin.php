
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Brand Logo -->
        <div class="navbar-brand d-flex align-items-center wow animate__animated animate__pulse" data-wow-iteration="infinite">
            <img src="images/logo.png" alt="Logo" width="62" height="64" class="d-inline-block align-text-center">
            <span class="glow">Rams Impex</span>
        </div>

        <!-- Toggler Button for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <!-- Show when logged in -->
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    </li>
                <?php else: ?>
                    <!-- Show when not logged in -->
                    <ul class="navbar-nav ms-auto">
    <li class="nav-item">
        <a class="nav-link" href="adminlogin.php"><i class="bi bi-box-arrow-in-right"></i> Sign In</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="adminreg.php"><i class="bi bi-pencil-square"></i> Sign Up</a>
    </li>
</ul>

                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
