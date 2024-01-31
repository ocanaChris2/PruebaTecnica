<?php


$dbh = new PDO('mysql:host=localhost:3306;dbname=probe', 'root', '') or die ('Error de conexión con la base de datos.');



if (isset($_POST['password']) && isset($_POST['email'])) {


    $email = $_POST['email'];
    $password = $_POST['password'];


    $query = "SELECT * FROM User WHERE email = :email AND password = :password";

    $queryPrepare = $dbh->prepare($query);

    $queryPrepare -> bindParam(':email', $email);
    $queryPrepare -> bindParam(':password', $password);

    if ($queryPrepare->execute())
    {
        if ($queryPrepare->rowCount() > 0) {
            echo "Usuario encontrado";
    }else{
        echo "Usuario no encontrado"
    }
   
    }

} else {
    exit('404');


}




?>