<?php 
include("./models/game.php");
include("./config/bdd.php");
$game = new game();
$games_futurs =$game->lire_games_futurs();

// lire_games_futurs() fournis un tableau ou chaque match représente 2 enregistrements(un pour chaque equipe).
// On utilise un compteur qui s'incrémente, modulo %1 pour séparer les enregistrement 2 par 2(pour séparer chaque match)
$compteur = 0;
$matchs = [];
while($donnees = $games_futurs->fetch()){

    if ($compteur == 0){
        $nom_game = $donnees["nom_game"];
        $date_game = $donnees["date_game"];
        $nom_equipe1 = $donnees["nom_equipe"];
        $detail_equipe1 = $donnees["detail_equipe"];

        $compteur += 1;     
    }
    else if ($compteur == 1){
        $nom_equipe2 = $donnees["nom_equipe"];
        $detail_equipe2 = $donnees["detail_equipe"];

        // Une fois toutes les informations dans des variables, je le met dans un tableau associatif
        $match = [
            'nom_game' => $nom_game, 
            'date_game' => $date_game, 
            'nom_equipe1' => $nom_equipe1,
            'detail_equipe1' => $detail_equipe1,
            'nom_equipe2' => $nom_equipe2,
            'detail_equipe2' => $detail_equipe2
        ];
        // Puis je met ce tableau dans un autre tableau contenant tous les matchs futur
        array_push($matchs, $match);

        //Je modulo pour passer au match suivant
        $compteur = $compteur%1;
    }
}

// je souhaite récupérer la date sur le premier match
// echo $matchs[0]["date_game"];

?>