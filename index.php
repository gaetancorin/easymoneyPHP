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
            <li><a href="./views/inscription.php">Inscription</a></li>
            <li><a href="../views/addOne.php">Profil</a></li>
        </ul>
    </div>
</nav>

<?php include("./controllers/getMach.php"); ?>

<ul class="tilesWrap">
	<li>
		<h2><?php echo $date_game1 ?></h2>
		<h3>Title 1</h3>
		<p>
			Lorem Ipsum is simply dummy text of the printing and typesetting   
			industry. Lorem Ipsum has been the industry's standard dummy text ever 
			since the 1500s.
		</p>
		<button>Parier ?</button>
	</li>
	<li>
		<h2>02</h2>
		<h3>Title 2</h3>
		<p>
			When an unknown printer took a galley of type and scrambled it to make 
			a type specimen book. It has survived not only five centuries.
		</p>
		<button>Parier ?</button>
	</li>
	<li>
		<h2>03</h2>
		<h3>Title 3</h3>
		<p>
			But also the leap into electronic typesetting, remaining essentially 
			unchanged. It was popularised in the 1960s.
		</p>
		<button>Parier ?</button>
	</li>
	<li>
		<h2>04</h2>
		<h3>Title 4</h3>
		<p>
			With the release of Letraset sheets containing Lorem Ipsum passages,  
			and more recently with desktop publishing software like Aldus PageMaker 
			including versions of Lorem Ipsum.
		</p>
		<button>Parier ?</button>
	</li>
</ul>


</body>
</html>