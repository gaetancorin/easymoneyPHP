<?php 
include("./models/game.php");
include("./config/bdd.php");
include('./models/user.php');

// Je vérifie si l utilisateur est connecter
if (isset($_SESSION['pseudo'])){
    $pseudo = $_SESSION['pseudo'];
    $connexion=True;
}
else{
    $connexion=False;
}

// Je lis tous les matchs finis
$game = new game();
$games_finis =$game->lire_games_finis();

// lire_games_finis() fournis un tableau ou chaque match représente 2 enregistrements(un pour chaque equipe).
// On utilise un compteur qui s'incrémente, modulo %1 pour séparer les enregistrement 2 par 2(pour séparer chaque match)
$compteur = 0;
$matchs = [];
while($donnees = $games_finis->fetch()){

    if ($compteur == 0){
        $nom_game = $donnees["nom_game"];
        $date_game = $donnees["date_game"];
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
        // pour récupérer le pourcentage total de paris par equipe  
        $game->set_nom_game($nom_game);
        $pourcentage_mise = $game->calcul_pourcentage_miser_total($nom_equipe1,$nom_equipe2);
        $pourcentage_equipe1 = $pourcentage_mise[0];
        $pourcentage_equipe2 = $pourcentage_mise[1];


        if ($connexion){
            // je recupère la mise et l equipe sur lequel a miser l'utilisateur 
            // uniquement sur ce match
            $myUser = new User();
            $myUser->set_pseudo($pseudo);
            // $parisUserEtResultat = $myUser->get_infos_mise();
            // variable qui prend le nom_game et qui retourne le nom_equipe_parier et la mise 
        }
        


        // Une fois toutes les informations dans des variables, je le met dans un tableau associatif
        $match = [
            'nom_game' => $nom_game, 
            'date_game' => $date_game, 
            'nom_equipe1' => $nom_equipe1,
            'detail_equipe1' => $detail_equipe1,
            'point_equipe1' => $point_equipe1,
            'pourcentage_equipe1' => $pourcentage_equipe1,
            'nom_equipe2' => $nom_equipe2,
            'detail_equipe2' => $detail_equipe2,           
            'point_equipe2' => $point_equipe2,
            'pourcentage_equipe2' => $pourcentage_equipe2,
        ];
        // Puis je met ce tableau dans un autre tableau contenant tous les matchs futur
        array_push($matchs, $match);

        //Je modulo pour passer au match suivant
        $compteur = $compteur%1;
    }
}

// je souhaite récupérer la date sur le dernier match fini
// echo $matchs[0]["date_game"];

?>