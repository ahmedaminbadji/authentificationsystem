<?php
require_once("../config/db.php");
session_start();
if(isset($_POST["email"])){
    
    $email = filter_var($_POST["email"],FILTER_SANITIZE_STRING);
    $password = $_POST["password"];
    $hashedPass = password_hash($password,PASSWORD_DEFAULT);
    echo $password;
    $query = "SELECT * FROM users WHERE email = ?";
    $sql = $pdo->prepare($query);
    if($sql->execute([$email])){
        //user exist
       // echo $email;
       // echo $password;

        $result = $sql->fetch(PDO::FETCH_ASSOC);
        //echo $result["password"];
        var_dump(password_verify($password,$result["password"]));
        if(password_verify($password,$result["password"])){
            //connected
            
            session_unset();
            session_destroy();
            session_start();
            $_SESSION["logged"] = True;
            $_SESSION["name"] = $result["name"];
            $_SESSION["fname"] = $result["fname"];
            ?>
            <script>
                window.alert("You are Logged in.");
                
                window.location.href = "../users/";
            </script>
        <?php
           // header('Location: ../users/');
        }else{
            ?>
            <script>
                window.alert("Wrong password.");
                window.location.href = "../login.html";
            </script>
        <?php
        }
    }else{
        ?>
            <script>
                window.alert("Wrong email.");
                window.location.href = "../login.html";
            </script>
        <?php
    }
}
?>