<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
<nav>
    <div class="containerNav">
        <h1 class="logo"><img class="logo1" src="https://images2.imgbox.com/d7/66/RfTfF1nu_o.png"></h1>
        <ul class="menuBar">
            <li><a href="../index.php">Accueil</a></li>
            <li><a href="../controllers/getAllAll.php">Nos Matchs</a></li>
			<?php
			if (!isset($_SESSION['pseudo'])){
			echo '<li><a href="./views/inscription.php">Inscription</a></li>
				  <li><a href="./views/connexion.php">Connexion</a></li>';}
			else{
			echo '<li><a href="./views/profil.php">Profil</a></li>
				  <li><a href="./controllers/deconnection.php">Déconnection</a></li>';}?>
            <!-- <li><a href="./views/inscription.php">Inscription</a></li>
			<li><a href="./views/connexion.php">Connexion</a></li>
            <li><a href="../views/addOne.php">Profil</a></li> -->
        </ul>
    </div>
</nav>

<?php include("./controllers/getMatchFini.php"); ?>

<ul class="tilesWrap">
	<li>
		<h2><?php echo $matchs[0]["date_game"] ?></h2>
		<h3><?php echo $matchs[0]["nom_equipe1"].' Vs '.$matchs[0]["nom_equipe2"] ?></h3>
		<p>
			<?php echo $matchs[0]["detail_equipe1"].' face à '. $matchs[0]["detail_equipe2"]?>
		</p>
		<p>
			<?php echo $matchs[0]['pourcentage_equipe1'].'% miser contre %'. $matchs[0]['pourcentage_equipe2']?>
		</p>
		<button>Parier ?</button>
	</li>
	<li>
		<h2><?php echo $matchs[1]["date_game"] ?></h2>
		<h3>Les matchs arrivent</h3>
		<p>
			on arrive très vite !
		</p>
		<button>Parier ?</button>
	</li>
	<li>
		<h2>03</h2>
		<h3>Les matchs arrivent</h3>
		<p>
			on arrive très vite !
		</p>
		<button>Parier ?</button>
	</li>
	<li>
		<h2>04</h2>
		<h3>Les matchs arrivent</h3>
		<p>
			on arrive très vite !
		</p>
		<button>Parier ?</button>
	</li>
</ul>


</body>
</html>