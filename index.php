<?php
if(session_status() != PHP_SESSION_ACTIVE) {
session_start();
}
if ($_SESSION["employe"]) {
    if ($_SESSION['role'] == "Admin") {

?>
<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/img/favicon.jpg">
    <title>Gestion filiere/classe</title>


    <script src='vendor/jquery-3.2.1.min.js'></script>
    <script src='vendor/bootstrap-4.1/popper.min.js'></script>
    <script src='vendor/bootstrap-4.1/bootstrap.min.js'></script>


    <link rel='stylesheet' href='vendor/bootstrap-4.1/bootstrap.min.css'>
    <link rel='stylesheet' href='vendor/font-awesome-5/css/fontawesome-all.min.css'>
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/theme.css">
    <link rel="stylesheet" href="style/main.css">
    <link href="vendor/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" media="all">


    <script src="vendor/datatable/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="vendor/datatable/dataTables.bootstrap4.min.js" type="text/javascript"></script>

</head>
<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav style='border-top-right-radius:50px;background-color: #371C1C'; id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <div class="logo-image-small">
                    <img src="assets/img/logo-small.png" width="40" height="40">
                  </div>
                    <a href="./" class="h2 pt-2" style="margin-left: 10px;color:white">Gestion</a>

                </div>
                <div class="sidebar-header">
                    <div class="user-info">
                        <span class="user-name">
                            <strong><?php
                                        if (isset($_SESSION['nom'])) {
                                            echo $_SESSION['nom'];
                                        }
                                    ?>
                            </strong>
                        </span>
                        <span class="user-status">

                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->

                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li style='background-color: white ;list-style-type: none line-height: 80px; text-decoration: none; font-family: Georgia, "Times New Roman", Times, serif;
                            font-size: 21px;' class="header-menu">
                            <span>Gestion Filiere/Classes :</span>
                        </li>
                        <li>
                            <a href="./index.php?p=filiere"><i class="zmdi zmdi-hc-1x zmdi-group-work"></i>Filieres</a>
                        </li>
                        <li>

                        </li>
                        <li>
                            <a href="./index.php?p=classe"><i class="zmdi zmdi-hc-1x zmdi-settings"></i>Classes</a>
                        </li>
                        <li>
							</br>
                        </li>
                        <li style='background-color: white ;list-style-type: none
                            line-height: 80px;text-decoration: none;font-family: Georgia, "Times New Roman", Times, serif;font-size: 21px;' class="header-menu">
                            <span>chercher classes :</span>
                        </li>
                        <li>
                            <a href="./index.php?p=historique"><i class="zmdi zmdi-hc-1x zmdi-accounts"></i>les classes de chaque filieres</a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div style='background-color: white' class="sidebar-footer">
                <a href="./logout.php">
                    <i class="fa fa-power-off"></i>
                    <span>Log out</span>
                </a> 
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid" id="main-content">

                <?php
                    if( isset($_GET['p']) && $_GET['p'] != ""){
                        if($_GET['p']=="filiere"){
                            include_once './pages/filiere.php';
                        }elseif($_GET['p']=="classe"){
                            include_once './pages/classe.php';
                        }elseif($_GET['p']=="historique"){
                            include_once './pages/historique.php';
                        }
                    }else{
                        include_once './pages/statistiques.php';
                    }
                ?>
            </div>

        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
    <script src="script/index.js"></script>

</body>
</html>
<?php
}

} else {
    header('Location:./login.php');
}
?>