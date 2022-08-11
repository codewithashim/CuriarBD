<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand" style="cursor: pointer;" href="/CourierBD/">
                <b>CourierBD</b>
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/CourierBD">Home</a>
                </li>
    
				<li class="nav-item">
                    <a class="nav-link" style="cursor: pointer;" href="/CourierBD/services.php">Service</a>
                </li>
               <?php
                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
          	  ?>
                <li class="nav-item">
                    <a class="nav-link" style="cursor: pointer;" href="/CourierBD/search.php">Tracking</a>
                </li>
			
				  <?php 	}?>
				<li class="nav-item">
                    <a class="nav-link" style="cursor: pointer;" href="/CourierBD/notice.php">Notice</a>
                </li>
				
				<li class="nav-item">
                    <a class="nav-link" style="cursor: pointer;" href="/CourierBD/map.php">Coverage Map</a>
                </li>
				
                <li class="nav-item">
                    <a class="nav-link" style="cursor: pointer;" href="/CourierBD/about.php/">About</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" style="cursor: pointer;" href="/CourierBD/contact.php">Contact</a>
                </li>
			


            </ul>


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
                            <a class="dropdown-item" href="profile.php">Profile </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/CourierBD/settings.php">Settings </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/CourierBD/cart.php">Cart </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/CourierBD/product-card.php">Product Cart </a>
                        </li>
                        <?php
                        $user_type = $_SESSION['user_type'];
                        if ($user_type !='user') {
                        ?>
                            <li>
                                <a class="dropdown-item" href="/CourierBD/dashboard/">Dashboard </a>
                            </li>

                        <?php

                        }

                        ?>

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