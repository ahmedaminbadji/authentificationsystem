<?php
require_once("../config/db.php");
if(isset($_POST["email"])){
    $name = filter_var($_POST["name"],FILTER_SANITIZE_STRING);
    $fname = filter_var($_POST["fname"],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"],FILTER_SANITIZE_STRING);
    $password = password_hash($_POST["password"],PASSWORD_DEFAULT);

    $query = "INSERT INTO users (`name`,`fname`,`email`,`password`) VALUES(?,?,?,?)";
    $sql = $pdo->prepare($query);
    if($sql->execute([$name,$fname,$email,$password])){
        //registred
        ?>
    <script>
        window.alert("You are registred . you can now login .");
        window.location.href = "../login.html";
    </script>
<?php
    }
}
?>