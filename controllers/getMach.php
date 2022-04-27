<?php 
include("./models/game.php");
include("./config/bdd.php");
$game = new game();

$game_futur1 =$game->lire_games_futurs(1);
$nom_equipe1 = [];
$detail_equipe1= [];
while($donnees = $game_futur1->fetch()){
    $nom_game1 = $donnees["nom_game"];
    $date_game1 = $donnees["date_game"];
    array_push($nom_equipe1, $donnees["nom_equipe"]);
    array_push($detail_equipe1, $donnees["detail_equipe"]);
}
echo "<h5>".$nom_game1.$date_game1.$nom_equipe1[0].$nom_equipe1[1].$detail_equipe1[0].$detail_equipe1[1]."</h5>";


$game_futur2 =$game->lire_games_futurs(2);
$nom_equipe2 = [];
$detail_equipe2= [];
while($donnees = $game_futur2->fetch()){
    $nom_game2 = $donnees["nom_game"];
    $date_game2 = $donnees["date_game"];
    array_push($nom_equipe2, $donnees["nom_equipe"]);
    array_push($detail_equipe2, $donnees["detail_equipe"]);
}
echo "<h5>".$nom_game2.$date_game2.$nom_equipe2[0].$nom_equipe2[1].$detail_equipe2[0].$detail_equipe2[1]."</h5>";

$game_futur3 =$game->lire_games_futurs(3);
$nom_equipe3 = [];
$detail_equipe3= [];
while($donnees = $game_futur3->fetch()){
    $nom_game3 = $donnees["nom_game"];
    $date_game3 = $donnees["date_game"];
    array_push($nom_equipe3, $donnees["nom_equipe"]);
    array_push($detail_equipe3, $donnees["detail_equipe"]);
}
echo "<h5>".$nom_game3.$date_game3.$nom_equipe3[0].$nom_equipe3[1].$detail_equipe3[0].$detail_equipe3[1]."</h5>";

$game_futur4 =$game->lire_games_futurs(4);
$nom_equipe4 = [];
$detail_equipe4= [];
while($donnees = $game_futur4->fetch()){
    $nom_game4 = $donnees["nom_game"];
    $date_game4 = $donnees["date_game"];
    array_push($nom_equipe4, $donnees["nom_equipe"]);
    array_push($detail_equipe4, $donnees["detail_equipe"]);
}
echo "<h5>".$nom_game4.$date_game4.$nom_equipe4[0].$nom_equipe4[1].$detail_equipe4[0].$detail_equipe4[1]."</h5>";


?>