<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark ">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand" style="cursor: pointer;" href="/CourierBD/">
                 <b>CourierBD</b>
            </a>


        </div>
        <div class="d-flex">
            <form class="d-flex me-2" id="SearchForm">
                <input class="form-control me-1" name="search" type="search" id="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">
                    <i class="fa fa-search "></i>
                </button>
            </form>
            <?php

            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            ?>
                <span class="dropdown text-light">
                    <button class="dropdown-toggle btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user-circle text-dark me-1"></i>

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="">
                        <li>
                            <a class="dropdown-item" href="#">Overview </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/CourierBD/settings.php">Settings </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/CourierBD/dashboard/">Dashboard </a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li>
                            <a class="dropdown-item" href="/CourierBD/auth/logout.php">Logout</a>
                        </li>
                    </ul>
                </span>
            <?php

            } else {
            ?>
                <a class="btn btn-outline-light" href="/CourierBD/auth/signin.php"><b>Login</b></a>
                <a class="btn btn-outline-light ms-1" href="/CourierBD/auth/signup.php"><b>Registration</b></a>
            <?php
            }
            ?>
        </div>
    </div>
</nav>

<?php

if (isset($_GET['error'])) {
    echo '
        <div class="alert alert-warning  alert-dismissible fade show my-0" role="alert">
            <strong>warning ! </strong> ' . $_GET['error'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>   
        ';
}

if (isset($_GET['success'])) {
    echo '
        <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            ' . $_GET['success'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>   
    ';
}

?>


<div id="SideNavID" class="sideNav NavOpen bg-dark border">
    <div class="_nav_top">
        <a class="nav-menu-item " href="index.php">
            <i class="fa fa-dashboard m-2"></i>Overview
        </a>

    
            <a class="nav-menu-item " href="users.php">
                <i class="fa fa-user-circle m-2"></i>Users
            </a>
            <a class="nav-menu-item " href="add-product.php">
                <i class="fa fa-tasks m-2"></i>Add product
            </a>
            <a class="nav-menu-item " href="all-product.php">
                <i class="fa fa-tasks m-2"></i>All product
            </a>
            <a class="nav-menu-item " href="message.php">
                <i class="fa fa-envelope m-2"></i>Messages
            </a>
            <a class="nav-menu-item " href="coverage-map.php">
                <i class="fa fa-map m-2"></i>Coverage map
            </a>
            <a class="nav-menu-item " href="reports.php">
                <i class="fa fa-tasks m-2"></i>Reports
            </a>
  
            <a class="nav-menu-item " href="order.php">
                <i class="fa fa-first-order m-2" aria-hidden="true"></i>Orders
            </a>
            <a class="nav-menu-item " href="package.php">
                <i class="fa fa-tasks m-2" aria-hidden="true"></i>Packages
            </a>
     


        <a class="nav-menu-item " href="#">
            <i class="fa fa-bar-chart m-2" aria-hidden="true"></i>Charts
        </a>
        <a class="nav-menu-item " href="#">
            <i class="fa fa-question-circle m-2"></i>Help
        </a>
    </div>
</div>