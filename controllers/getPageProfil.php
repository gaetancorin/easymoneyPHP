<?php
include('../config/bdd.php');
include('../models/user.php');
include('../models/game.php');
session_start();
$pseudo = $_SESSION['pseudo'];

// je lis les paris de l'utilisateur connecté, 
$myUser = new User();
$myUser->set_pseudo($pseudo);
$parisUserEtResultat = $myUser->lire_paris_resultats();

// j'installe un compteur et un tableau vide pour plus tard
$compteur = 0;
$matchs_miser = [];
while ($donnees = $parisUserEtResultat->fetch()){
    // Je recupère toutes les informations sur chaque match ou l'utilisateur a miser
    // Les données sort 2 tuples par match, un tuple pour chaque equipe.
    if ($compteur == 0){
        $nom_game = $donnees["nom_game"];
        $date_game = $donnees["date_game"];       
        $nom_equipe_parier = $donnees["nom_equipe_parier"];
        $mise_parier = $donnees["mise"];
        $nom_equipe1 = $donnees["nom_equipe"];
        $detail_equipe1 = $donnees["detail_equipe"];
        $point_equipe1 = $donnees["point_equipe"];

        $compteur += 1;
    }

    else if ($compteur == 1){
        $nom_equipe2 = $donnees["nom_equipe"];
        $detail_equipe2 = $donnees["detail_equipe"];
        $point_equipe2 = $donnees["point_equipe"];
        

        // je me sert du nom de la game et du nom des equipes 
        // pour récupérer le pourcentage total de mise par equipe 
        $game = new game();
        $game->set_nom_game($nom_game);
        $pourcentage_mise = $game->calcul_pourcentage_miser_total($nom_equipe1,$nom_equipe2);
        $pourcentage_equipe1 = $pourcentage_mise[0];
        $pourcentage_equipe2 = $pourcentage_mise[1];

        // Une fois toutes les informations dans des variables, je le met dans un tableau associatif
        $match = [
            'nom_game' => $nom_game, 
            'date_game' => $date_game,
            'nom_equipe_parier' =>$nom_equipe_parier,
            'mise' =>$mise_parier, 
            'nom_equipe1' => $nom_equipe1,
            'detail_equipe1' => $detail_equipe1,
            'point_equipe1' => $point_equipe1,
            'pourcentage_equipe1' => $pourcentage_equipe1,
            'nom_equipe2' => $nom_equipe2,
            'detail_equipe2' => $detail_equipe2,            
            'point_equipe2' => $point_equipe2,
            'pourcentage_equipe2' => $pourcentage_equipe2,    
        ];
        // Puis je met ce tableau dans un autre tableau contenant
        //  tous les matchs sur lequel l'utilisateur a miser
        array_push($matchs_miser, $match);

        // Je modulo pour passer au match suivant
        $compteur = $compteur%1;
    }


}