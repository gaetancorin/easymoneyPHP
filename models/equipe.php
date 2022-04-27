<?php
class equipe
{
    //attributs
    public $id_equipe;
    public $nom_equipe;
    public $detail_equipe;

    // attribut de stockage info de connexion BDD
    public $connect;

    // constructeur
    public function __construct()
    {
        $this->connect = new ConfigDB();
        $this->connect = $this->connect->getConnection();
    }
    //getter
    public function get_id_equipe(){
        return $this->id_equipe;
    }
    public function get_nom_equipe(){
        return $this->nom_equipe;
    }
    public function get_detail_equipe(){
        return $this->detail_equipe;
    }

    //setter
    public function set_id_equipe($id_equipe){
        $this->id_equipe = $id_equipe;
    }
    public function set_nom_equipe($nom_equipe){
        $this->nom_equipe = $nom_equipe;
    }
    public function set_detail_equipe($detail_equipe){
        $this->detail_equipe = $detail_equipe;
    }

    // function CRUD
    public function lire_equipes(){
        $myQuery = "SELECT * FROM equipe";
        $stmt = $this->connect->prepare($myQuery);
        $stmt->execute();
        return $stmt;
    }

    public function lire_equipe(){
        $req = $this->connect->prepare(
            'SELECT
                    *
                FROM 
                    equipe
                WHERE 
                    equipe.nom_equipe = :nom'
        );
        $req->execute(
            array(
                ':nom' => $this->nom_equipe
            )
        );
        return $req;
    }

    public function lire_cinq_games_finis(){
        $req = $this->connect->prepare(
            'SELECT
                    nom_equipe, nom_game, date_game, point_equipe
                FROM 
                    equipe
                INNER JOIN
                    participer
                ON 
                    participer.id_equipe = equipe.id_equipe
                INNER JOIN
                    game
                ON 
                    game.id_game = participer.id_game
                WHERE 
                    date_game between "1900-01-01" and now()
                ORDER BY
                     date_game desc limit 10'
        );
        $req->execute();
        return $req;
    }

    public function lire_cinq_games_futurs(){
        $req = $this->connect->prepare(
            'SELECT
                    nom_equipe, nom_game, date_game
                FROM 
                    equipe
                INNER JOIN
                    participer
                ON 
                    participer.id_equipe = equipe.id_equipe
                INNER JOIN
                    game
                ON 
                    game.id_game = participer.id_game
                WHERE 
                    date_game between now() and "2200-01-01"
                ORDER BY
                     date_game asc limit 10'
        );
        $req->execute();
        return $req;
    }

    // select nom_equipe, nom_game, date_game from equipe inner join participer on participer.id_equipe = equipe.id_equipe inner join game on game.id_game = participer.id_game where date_game between now() and "2200-01-01" order by date_game asc limit 10;
}
?>