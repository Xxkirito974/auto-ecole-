<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/register.css">
    <title>Register</title>
</head>
<body>
    <?php 
    require ('connexion_pdo.php');
    if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'], $_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['numero_telephone'], $_POST['abonnement'])){
        // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn, $username);
        // récupérer l'email et supprimer les antislashes ajoutés par le formulaire 
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn, $email);
        // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        //Récupérer le nom et supprimer les antislashes ajouté par le formulaire
        $nom = stripslashes($_REQUEST['nom']);
        $nom = mysqli_real_escape_string($conn, $nom);
        //Récupérer le prenom et supprimer les antislashes
        $prenom = stripslashes($_REQUEST['prenom']);
        $prenom = mysqli_real_escape_string($conn, $prenom);
        //Récupérer le numero de tel et supprimer les antislashes
        $numero_telephone = stripslashes($_REQUEST['numero_telephone']);
        $numero_telephone = mysqli_real_escape_string($conn, $numero_telephone);
        //Recupere l'abonnement
        $abonnement = $_POST['abonnement'];
        $abonnement = mysqli_real_escape_string($conn, $abonnement);

        //requete SQL + mot de passe crypté
        $queryUser = "INSERT into `users` (username, email, password)
                VALUES ('$username', '$email', '".hash('sha256', $password)."')";

        $queryInfo = "INSERT into `information` (nom, prenom, numero_telephone, abonnement)
                VALUES ('$nom', '$prenom', '$numero_telephone', '$abonnement')";

        // Executer la requete sur la base de données
        $resUser = mysqli_query($conn, $queryUser);
        $resInfo = mysqli_query($conn, $queryInfo);
        if($resUser && $resInfo){
            echo "<h3>Vous êtes bien inscrit.</h3> 
            <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>";
        }
    }else{
        ?>
<form class="form" action="" method="post">
        <p class="title">Register</p>
        <p class="message">Signup now and get full access to our app. </p>
            <div class="flex">
            <label>
                <input class="input" type="text" name="username" placeholder="" required="">
                <span>Username</span>
            </label>
            <label>
                <input class="input" type="text" name="nom" placeholder="" required="">
                <span>Nom</span>
            </label>
            <label>
                <input class="input" type="text" name="prenom" placeholder="" required="">
                <span>Prenom</span>
            </label>
            <label>
                <input class="input" type="text" name="numero_telephone" placeholder="" required="">
                <span>Numero de telephone</span>
            </label>
        <label>
            <input class="input" type="email" name="email" placeholder="" required="">
            <span>Email</span>
        </label> 
            
        <label>
            <input class="input" type="password" name="password" placeholder="" required="">
            <span>Mot de passe</span>
        </label>
        <label>
            <select class="input" name="abonnement" id="abonnement">
                <option value="">Choisis ton abonnement</option>
                <option value="Inscription">Inscription</option>
                <option value="Code">Code + Examen code</option>
                <option value="Conduite">Cours de conduite + Examen</option>
                <option value="Code + Conduite">Code + Conduite</option>
            </select>
       </label>
    </div>  
        <button class="submit" name="submit" value="S'inscrire">Submit</button>
        <p class="signin">Already have an acount ? <a href="login.php">Signin</a> </p>
    </form>

        <?php } ?>
</body>
</html>