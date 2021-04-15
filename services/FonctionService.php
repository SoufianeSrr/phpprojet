<?php

include_once 'beans/Classe.php';
include_once 'connexion/Connexion.php';
include_once 'dao/IDao.php';
class FonctionService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }


    public function create($o) {
        $query = "INSERT INTO Classe VALUES (NULL,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCode(),$o->getNom() )) or die('Error');

    }

    public function delete($id) {
        $query = "DELETE FROM Classe WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select * from Classe";
        $req = $this->connexion->getConnexion()->query($query);
        $f= $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }


    public function findById($id) {
        $query = "select * from Classe where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res=$req->fetch(PDO::FETCH_OBJ);
        $classe = new Classe($res->id,$res->code, $res->nom);
        return $classe;
    }

     public function findByIdApi($id) {
        $query = "select * from Classe where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res=$req->fetch(PDO::FETCH_OBJ);
        return $res;
    }

    public function update($o) {
        $query = "UPDATE Classe SET nom = ?,code=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(),$o->getCode(), $o->getId())) or die('Error');
    }

}
