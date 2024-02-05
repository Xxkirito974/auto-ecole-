<?php
          //Information d'identification
          define('DB_SERVER', 'localhost');
          define('DB_USERNAME', 'root');
          define('DB_PASSWORD', '');
          define('DB_NAME', 'auto_ecole');

          //connexion a la base de données Mysql
          $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

          //verifier la connexion 
          if($conn === false){
            die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
          }
        ?>
