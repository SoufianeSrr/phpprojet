<?php

include_once 'beans/Employe.php';
include_once 'connexion/Connexion.php';
include_once 'dao/IDao.php';

class EmployeService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO `employe`(`cin`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `password`, `role`, `photo`, `classe`, `filiere`) "
                . "VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCin(), $o->getNom(), $o->getPrenom(), $o->getEmail(), $o->getTelephone(), $o->getAdresse(),
                    $o->getPassword(), $o->getRole(), $o->getPhoto(), $o->getClasse(), $o->getFiliere())) or die('Error');
    }

    public function delete($cin) {
        $query = "DELETE FROM Employe WHERE cin = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select e.* , f.nom as 'nomf', d.libelle as 'nomd' from Employe e inner join classe f on e.classe = f.id inner join filiere d on e.filiere=d.id";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findById($cin) {
        $query = "select * from Employe where cin =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $employe = new Employe($res->cin, $res->nom, $res->prenom, $res->email, $res->telephone, $res->adresse, $res->password, $res->role, $res->photo, $res->classe, $res->filiere);
        return $employe;
    }

    public function findByEmail($email) {
        $query = "select * from Employe where email =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($email));
        $s = $req->fetchAll(PDO::FETCH_OBJ);
        if (count($s) != 0) {
            foreach ($s as $res) {
                $cin = $res->cin;
        }
            return $cin;
        } else
            return -1;
        /* $employe = new Employe($res->cin, $res->nom, $res->prenom, $res->email, $res->telephone, $res->adresse, $res->password, $res->role, $res->photo, $res->classe, $res->filiere);
          return $employe; */
    }

    public function update($o) {
        $query = "UPDATE Employe SET  nom=?, prenom =?, email =?, telephone =?, adresse =?, password =?, role =?, photo =?, classe =?, filiere =?  where cin = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(), $o->getPrenom(), $o->getEmail(), $o->getTelephone(), $o->getAdresse(),
                    $o->getPassword(), $o->getRole(), $o->getPhoto(), $o->getClasse(), $o->getFiliere(), $o->getCin())) or die('Error');
    }

}
