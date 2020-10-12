<?php
try{    
    $pdo = new PDO("mysql:host=localhost;dbname=registrationsystem","root","amine07!");
}catch(PDOException $pe){
    echo "Couldn't connect to DB".$pe->getMessage();
}
?>