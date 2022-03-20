<?php    
class Utilisateur{

    private $login_;
    private $mdp_;
    private $id_;

    public function __construct($id_,$NewLogin,$pass){
        $this->login_ = $NewLogin;
        $this->mdp_ = $pass;
        $this->id_ = $id_;
    }
    public function seConnecter($UnMotDePass){
        
        if($UnMotDePass==$this->mdp_){
            return true;
        }else{
            return false;
        }
    }
    public function getNom(){
        return $this->login_;
    }
}
?>