<html>
    <head>
        <title>User space</title>
        <link rel="stylesheet" href="../static/css/bootstrap.min.css">
        <script src="../static/js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php
    session_start();
        if(isset($_SESSION["logged"]) && $_SESSION["logged"]==True){
            echo "Welcome ". $_SESSION["name"] . " ". $_SESSION["fname"];
        }else{
            echo " not authorized";
        }
    ?>
    <a href="../deconnexion.php"><button class="btn btn-danger">Logout</button></a>
    </body>
</html>