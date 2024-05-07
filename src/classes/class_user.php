<?php
class User{
    private $dbh;
    function __construct($dbh){
        $this->dbh = $dbh;
    }
    public function log(){
        echo '<br /> Je suis bien connecté !! !!! !! !! !! ! ! ! ! ! !';
    }
    public function insert($nom, $prenom, $age, $email, $date, $tel, $cp, $rue, $ville, $bac, $mdp){
        $sql = 'insert into User(nom, prenom, age, email, dateNaissance, dateInscription, tel, codePostal, rue, ville, annee, password) values(:nom, :prenom, :age, :email, :date, now(), :tel, :cp, :rue, :ville, :bac, :mdp)';
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':nom', $nom, PDO::PARAM_STR);
        $sth->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $sth->bindParam(':age', $age, PDO::PARAM_INT);
        $sth->bindParam(':email', $email, PDO::PARAM_STR);
        $sth->bindParam(':date', $date, PDO::PARAM_STR);
        $sth->bindParam(':tel', $tel, PDO::PARAM_STR);
        $sth->bindParam(':cp', $cp, PDO::PARAM_STR);
        $sth->bindParam(':rue', $rue, PDO::PARAM_STR);
        $sth->bindParam(':ville', $ville, PDO::PARAM_STR);
        $sth->bindParam(':bac', $bac, PDO::PARAM_INT);
        $sth->bindParam(':mdp', $mdp, PDO::PARAM_STR);
        $sth->execute();
    }
    public function emailVerif($email){
        $sql = 'select count(email) as nb from User where User.email = :email';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':email', $email, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_BOTH);
        if($result['nb']>0){
            return true;
        }else{
            return false;
        }
    }
    public function compteVerify($email,$mdp){
        $sql = 'select User.email as email, User.password as mdp from User where User.email = :email';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':email', $email, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_BOTH);
        if($result!=null){
            return password_verify($mdp, $result['mdp']);
        }else{
            return false;
        }

    }
}
?>