
<!DOCTYPE html>
<html lang="en">
<head>
    <title>BooksAgain</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/appointment-app/public/css/normalize.css">
    <link rel="stylesheet" href="/appointment-app/public/icomoon/icomoon.css">
    <link rel="stylesheet" href="/appointment-app/public/css/vendor.css">
    <link rel="stylesheet" href="/appointment-app/public/style.css">
</head>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">
<div id="header-wrap">
    <div class="top-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="social-links">
                        <ul>
                            <li><a href="#"><i class="icon icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon icon-youtube-play"></i></a></li>
                            <li><a href="#"><i class="icon icon-behance-square"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-element">
                      <a href="/appointment-app/public/cart.php" class="cart for-buy">
    <i class="icon icon-clipboard"></i><span>Cart</span>
</a>

                        <div class="action-menu">
                            <div class="search-bar">
                                <a href="#" class="search-button search-toggle" data-selector="#header-wrap">
                                    <i class="icon icon-search"></i>
                                </a>
                                <form role="search" method="get" class="search-box">
                                    <input class="search-field text search-input" placeholder="Search" type="search">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="main-logo">
                        <a href="/appointment-app/public/index.php">
                            <img src="/appointment-app/public/images/main-logo.png" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-10">
                    <nav id="navbar">
                        <div class="main-menu stellarnav">
                            <ul class="menu-list">
                                <li class="menu-item"><a href="/appointment-app/public/index.php">Home</a></li>
                                <li class="menu-item"><a href="/appointment-app/public/appointments/view-appointments.php">My Appointments</a></li>
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <li class="menu-item"><a href="/appointment-app/public/auth/logout.php">Logout</a></li>
                                <?php else: ?>
                                    <li class="menu-item"><a href="/appointment-app/public/auth/login.php">Login</a></li>
                                <?php endif; ?>
                            </ul>
                            <div class="hamburger">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
</div>
