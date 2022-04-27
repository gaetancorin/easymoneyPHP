<?php
class User
{
    // attributs par rapport à la bdd
    public $id_user;
    public $pseudo;
    public $prenom;
    public $nom;
    public $mot_de_passe;
    public $email;
    public $argent;

    // attribut de connexion à la bdd
    public $connect;

    // constructeur
    public function __construct()
    {
        $this->connect = new ConfigDB();
        $this->connect = $this->connect->getConnection();
    }

    //getter
    public function get_id_user(){
        return $this->id_user;
    }
    public function get_pseudo(){
        return $this->pseudo;
    }
    public function get_prenom(){
        return $this->prenom;
    }
    public function get_nom(){
        return $this->nom;
    }
    public function get_mot_de_passe(){
        return $this->nom;
    }
    public function get_email(){
        return $this->detail_equipe;
    }
    public function get_argent(){
        return $this->argent;
    }

    //setter
    public function set_id_user($id_user){
        $this->id_user = $id_user;
    }
    public function set_pseudo($pseudo){
        $this->pseudo = $pseudo;
    }
    public function set_prenom($prenom){
        $this->prenom = $prenom;
    }
    public function set_nom($nom){
        $this->nom = $nom;
    }
    public function set_mot_de_passe($mot_de_passe){
        $this->mot_de_passe = $mot_de_passe;
    }
    public function set_email($email){
        $this->email = $email;
    }
    public function set_argent($argent){
        $this->argent = $argent;
    }
    

    // méthode qui va créer un utilisateur dans la BDD
    public function create_user(){
        try {
            //
            $maRequete = "INSERT INTO 
                                utilisateur 
                            SET 
                                pseudo = :pseudo,
                                prenom = :prenom,
                                nom = :nom,
                                mot_de_passe = :mot_de_passe,
                                email = :email";
            $req = $this->connect->prepare($maRequete);
            // pour la partie 2 je stocke le résultat de l'enregistrement dans une variable
            $req->bindParam(':pseudo', $this->pseudo);
            $req->bindParam(':prenom', $this->prenom);
            $req->bindParam(':nom', $this->nom);
            $req->bindParam(':mot_de_passe', $this->mot_de_passe);
            $req->bindParam(':email', $this->email);

            return $req->execute();
        } 
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}