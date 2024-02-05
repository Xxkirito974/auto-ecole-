<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home_eleve.css">
    <title>Home eleve</title>
</head>
<body>
 <!-- navbar -->
 <div class="navbar">
    <div class="logo">
      <img src="./picture/logo.png" alt="Logo de l'auto-école">
    </div>
    <div class="menu">


    <!-- deconnexion -->
      <a href="logout.php">  <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
 width="35.000000pt" height="35.000000pt" viewBox="0 0 512.000000 512.000000"
 preserveAspectRatio="xMidYMid meet">

<g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
fill="#000000" stroke="none">
<path d="M325 5106 c-148 -37 -271 -159 -311 -310 -11 -42 -14 -384 -14 -2021
0 -2157 -3 -2031 57 -2135 37 -62 111 -134 169 -163 27 -13 350 -125 719 -248
l670 -224 90 0 c110 0 172 20 255 81 67 49 121 123 150 207 16 46 20 82 20
202 l0 145 378 0 c285 0 393 4 443 14 207 44 391 223 444 431 22 87 22 1131 0
1175 -32 62 -115 99 -183 81 -46 -13 -99 -65 -112 -112 -6 -20 -10 -242 -10
-549 l0 -515 -24 -51 c-13 -27 -42 -66 -66 -87 -76 -65 -90 -67 -502 -67
l-368 0 -2 1708 -3 1707 -31 66 c-70 147 -138 194 -420 288 l-209 70 701 0
c779 1 753 3 834 -66 24 -21 53 -60 66 -87 l24 -51 0 -515 c0 -317 4 -529 10
-552 14 -49 76 -104 129 -113 53 -9 126 25 158 74 l23 34 0 546 c0 602 0 606
-63 731 -21 42 -59 92 -108 142 -61 63 -92 85 -160 117 -46 22 -111 44 -143
50 -90 17 -2544 14 -2611 -3z m782 -527 c555 -185 666 -225 683 -246 20 -26
20 -38 20 -1985 l0 -1960 -34 -34 c-23 -23 -43 -34 -63 -34 -27 0 -1294 417
-1340 441 -11 6 -29 25 -38 43 -15 28 -16 191 -13 1982 3 1936 3 1952 23 1974
22 25 50 38 80 39 11 1 318 -98 682 -220z"/>
<path d="M4095 3826 c-41 -18 -83 -69 -91 -111 -16 -86 -14 -89 289 -392 l282
-283 -840 0 -840 0 -39 -23 c-109 -61 -106 -221 5 -277 37 -19 62 -20 876 -20
l838 0 -282 -282 c-304 -305 -305 -307 -288 -395 9 -49 69 -109 118 -118 91
-17 77 -29 540 433 236 235 435 439 443 454 18 35 18 101 0 136 -23 42 -857
870 -889 882 -38 14 -85 12 -122 -4z"/>
</g>
</svg> </a>


    </div>
    <div class="burger-menu">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
  </div>

<?php
//connexion a la base
require('connexion_pdo.php');
session_start(); 

$nomUtilisateurConnecte = $_SESSION['username']; 

//requete SQL 
$query = "SELECT information.* FROM users JOIN information ON users.user_id = information.info_id WHERE users.username = '$nomUtilisateurConnecte'";

$result = $conn->query($query);
if ($result->num_rows > 0) {
    // Afficher les données dans un formulaire HTML
    $row = $result->fetch_assoc();
?>

 <!-- contenu de la page -->
<div class="profile-container">
          <h2>Bienvenue sur votre espace personnel de l'auto-ecole</h2>
          <p>Dans votre espace vous trouverez vos information sur votre profil, votre abonnement et vos heure de conduite</p>
            <div class="profile-picture">
                <img src="./picture/profil.png" alt="Ma Photo de Profil">
            </div>
    
            <div class="profile-info">
                <h1><?php echo $row['nom']; ?> <?php echo $row['prenom']; ?></h1>
                <p><?php echo $row['numero_telephone']; ?></p>
                <p><?php echo $row['abonnement']; ?></p>
            </div>
        </div>
</body>
</html>
<?php
} else {
    echo "Aucun résultat trouvé pour cet utilisateur.";
}

// Fermer la connexion à la base de données
$conn->close();
?>