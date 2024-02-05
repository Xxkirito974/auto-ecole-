<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/connexion.css">
    <title>Login</title>
</head>
<body>

<?php
    require ('connexion_pdo.php');
    session_start();

    if(isset($_POST['username'])){
        //recupérer les informations sur username et suprimmer les antislashes
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn, $username);
        //recupérer les informations sur password et supprimer les antislashes
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);

        //La Requete SQL + mot de passe crypté 
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";

        //Excuter la requete
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);
        if(!empty($rows)){
            $_SESSION['username'] = $username;
            header("Location: home_eleve.php"); // Redirection vers la page home_eleve
            exit(); // Assurez-vous de terminer le script après la redirection
        } else {
            $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
        }
    }
?>

    <div class="form-container">
        <p class="title">Login</p>
        <form class="form" method="post" name="login">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="">
                <div class="forgot">
                    <a rel="noopener noreferrer" href="#">Forgot Password ?</a>
                </div>
            </div>
            <button class="sign" value="connexion" name="submit">Sign in</button>
            <?php if (! empty($message)) { ?>
            <p class="errorMessage"><?php echo $message; ?></p>
            <?php } ?>
        </form>
        <p class="signup">Don't have an account?
            <a rel="noopener noreferrer" href="register.php" class="">Sign up</a>
        </p>
    </div>
</body>
</html>