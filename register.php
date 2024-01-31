<?php


$dbh = new PDO('mysql:host=localhost:3306;dbname=probe', 'root', '') or die ('Error de conexión con la base de datos.');



if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $query = "INSERT INTO User (username, password, email, createdAt) VALUES (:username, :password, :email, :createdAt)";

    $queryPrepare = $dbh->prepare($query);

    $queryPrepare->bindParam(':username', $username);
    $queryPrepare->bindParam('password', $password);
    $queryPrepare->bindParam(':email', $email);
    $queryPrepare->bindParam(':createdAt', date("Y/m/d"));


    if ($queryPrepare->execute()){
    echo "Registro realizado correctamente";

    }


} else {
    exit('404');


}




?>