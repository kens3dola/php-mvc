<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo isset($this->page_title) ? $this->page_title : "Restaurant"; ?></title>
    <link href="/php-mvc/public/style/style.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <?php
    include_once './mvc/views/common/alert.php'; ?>
    <style>
        body {
            color: white;
            background-color: grey;
        }

        nav a.nav-link {
            color: white;
        }

        .nav-link.active {
            border: 1px solid white;
            border-radius: 5px;
        }
    </style>
    <div id="header">
        <nav class="navbar">
            <a class="navbar-brand text-white" style="font-size:2rem;float:left" href="#">
                Lorem
            </a>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo DIR ?>home">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo DIR ?>home/menu">MENU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo DIR ?>order/reservation">RESERVATION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo DIR ?>home/contact">CONTACT</a>
                </li>
                <a class="nav-link" href="<?php echo DIR ?>order"><i class="fa fa-shopping-cart"></i></a>
                <a class="nav-link" href="<?php echo DIR ?>message"><i class="fa fa-comments"></i></a>
                <li class="nav-item dropdown">
                    <?php
                    if (!isset($_SESSION['account_id'])) {
                        echo '<a class="nav-link" href="/php-mvc/account/login">Login</i></a>';
                    } else {
                    ?>
                        <a class="nav-link navbar-dark" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-circle"></i>
                        </a>
                        <div class="dropdown-menu" style="left:-200%" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?php echo DIR ?>/account/profile">Profile</a>
                            <a class="dropdown-item" href="account/password">Password</a>
                            <a class="dropdown-item" href="<?php echo DIR ?>account/logout">Logout</a>
                        </div>
                    <?php
                    }
                    ?>
                </li>
            </ul>
        </nav>
    </div>
    <div id="content">

        <?php
        if (file_exists('./mvc/views/' . $this->view_file . '.php')) {
            require "./mvc/views/" . $this->view_file . ".php";
        }
        ?>
    </div>
    <div id="footer"></div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>