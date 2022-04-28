<?php
include('../config/bdd.php');
include('../models/user.php');
include('../models/game.php');
session_start();
$pseudo = $_SESSION['pseudo'];

// je lis les paris de l'utilisateur connecté
$myUser = new User();
$myUser->set_pseudo($pseudo);
$paris_user = $myUser->lire_paris();

// j'installe un compteur et un tableau vide pour plus tard
$compteur = 0;
$matchs_miser = [];
while ($donnees = $paris_user->fetch()){
    // var_dump($donnees);

    // je conserve les données du nom de la game et du
    // nom de l'equipe sur lequel l'utilisateur a miser grace a la table d asso "parier"
    $nom_game_parier = $donnees['nom_game'];
    $nom_equipe_parier = $donnees['nom_equipe'];
    $mise_parier = $donnees['mise'];

    // je me serts des variables précedents pour aller chercher les scores
    //  et le nom du concurrent dans la table d asso "participer"
    $game = new game();
    $game->set_nom_game($nom_game_parier);
    $game_parier = $game->get_one_game();
    while ($donnees_match_parier = $game_parier->fetch()){

        if ($compteur == 0){
            $nom_game = $donnees_match_parier["nom_game"];
            $date_game = $donnees_match_parier["date_game"];
            $nom_equipe1 = $donnees_match_parier["nom_equipe"];
            $detail_equipe1 = $donnees_match_parier["detail_equipe"];
            $point_equipe1 = $donnees_match_parier["point_equipe"];
    
            $compteur += 1;     
        }
        else if ($compteur == 1){
            $nom_equipe2 = $donnees_match_parier["nom_equipe"];
            $detail_equipe2 = $donnees_match_parier["detail_equipe"];
            $point_equipe2 = $donnees_match_parier["point_equipe"];
    
            // Une fois toutes les informations dans des variables, je le met dans un tableau associatif
            $match = [
                'nom_game' => $nom_game, 
                'date_game' => $date_game, 
                'nom_equipe1' => $nom_equipe1,
                'detail_equipe1' => $detail_equipe1,
                'nom_equipe2' => $nom_equipe2,
                'detail_equipe2' => $detail_equipe2,
                'point_equipe1' => $point_equipe1,
                'point_equipe2' => $point_equipe2,
                'nom_equipe_parier' =>$nom_equipe_parier,
                'mise' =>$mise_parier,
            ];
            // Puis je met ce tableau dans un autre tableau contenant
            //  tous les matchs sur lequel l'utilisateur a miser
            array_push($matchs_miser, $match);
    
            // Je modulo pour passer au match suivant
            $compteur = $compteur%1;
        }
    }

}




?>