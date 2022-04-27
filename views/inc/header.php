<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".../style.css">
    <title></title>
</head>
<body>
    <nav>
        <div class="containerNav">
            <h1 class="logo"><img class="logo1" src="https://images2.imgbox.com/d7/66/RfTfF1nu_o.png"></h1>
            <ul class="menuBar">
                <li><a href="../index.php">Accueil</a></li>
                <li><a href="../controllers/getAllAll.php">Nos Matchs</a></li>
                <?php
			    session_start();
			    if (!isset($_SESSION['pseudo'])){
			    echo '<li><a href="./views/inscription.php">Inscription</a></li>
				      <li><a href="./views/connexion.php">Connexion</a></li>';}
			    else{
			    echo '<li><a href="../views/addOne.php">Profil</a></li>
				      <li><a href="./controllers/deconnection.php">Déconnection</a></li>';}?>
                <!-- <li><a href="./views/inscription.php">Inscription</a></li>
                <li><a href="../views/connexion.php">Connexion</a></li>
                <li><a href="../views/addOne.php">Profil</a></li> -->
            </ul>
        </div>
    </nav>
</body>
</html>