<?php
include('../controllers/gestionPageProfil.php');
?>
<h1>page profil</h1>
<?php
// echo count($matchs_miser);
for ($i=0; $i< count($matchs_miser); $i++){

    echo '<p>'.$matchs_miser[$i]["date_game"].' match de '.$matchs_miser[$i]["nom_equipe1"].' et de '.$matchs_miser[$i]["nom_equipe2"].'<br> Votre paris est de '.$matchs_miser[$i]["mise"].' euros pour '.$matchs_miser[$i]["nom_equipe_parier"].'</p>' ;
    
    if($matchs_miser[$i]["point_equipe1"]){
    echo $matchs_miser[$i]["point_equipe1"].' pour '.$matchs_miser[$i]["nom_equipe1"].' // '.$matchs_miser[$i]["point_equipe2"].' pour '.$matchs_miser[$i]["nom_equipe2"];

        if( ($matchs_miser[$i]["point_equipe1"] > $matchs_miser[$i]["point_equipe2"]) 
            && ($matchs_miser[$i]["nom_equipe_parier"] == $matchs_miser[$i]["nom_equipe1"]) ){
            echo "  /// Vous avez gagné !";
        }

        else if( ($matchs_miser[$i]["point_equipe1"] < $matchs_miser[$i]["point_equipe2"]) 
            && ($matchs_miser[$i]["nom_equipe_parier"] == $matchs_miser[$i]["nom_equipe2"]) ){
            echo "  /// Vous avez gagné !";
        }
        else{
            echo "  /// Vous avez perdu...";
        }
    }
}
?> 