<?php
// include('../models/animaux.php');
// include('../config/bdd.php');

if (
    !empty($_POST['prenom'])
    && !empty($_POST['nom'])
    && !empty($_POST['pseudo'])
    && !empty($_POST['pwd'])
    && !empty($_POST['email'])
    && !empty($_POST['fond'])
) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $pseudo = $_POST['pseudo'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];
    $fond = $_POST['fond'];
    
    
    try{
        $user = new Utilisateur();
        $user->setNom($prenom);
        $user->setCouleur($nom);
        $user->setOrigines($pseudo);
        $user->setIdRace($pwd);
        $user->setAvatar($email);
        $user->setAvatar($fond);

        $user->createOne();
        

    } catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

}
    
?>