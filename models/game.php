<?php
class game
{
    // attributs par rapport à la bdd
    public $id_game;
    public $date_game;
    public $nom_game;

    // attribut de connexion à la bdd
    public $connect;

    // constructeur
    public function __construct()
    {
        $this->connect = new ConfigDB();
        $this->connect = $this->connect->getConnection();
    }

    //getter
    public function get_id_game(){
        return $this->id_game;
    }
    public function get_date_game(){
        return $this->date_game;
    }
    public function get_nom_game(){
        return $this->nom_game;
    }

    //setter
    public function set_id_game($id_game){
        $this->id_game = $id_game;
    }
    public function set_date_game($date_game){
        $this->date_game = $date_game;
    }
    public function set_nom_game($nom_game){
        $this->nom_game = $nom_game;
    }

    
}