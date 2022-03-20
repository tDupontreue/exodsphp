<?php include "Utilisateur.php"?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Formulaire</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='index.css'>
    <script src='main.js'></script>
</head>
<body>
<div class="formulaire">
 <form action="" method="get" class="form">
        <div class="form">
          <label for="Login">Entrez votre login: </label>
          <input type="text" name="login" id="login">
        </div>
        <div class="form">
          <label for="mdp">Entrez votre mot de passe: </label>
          <input type="mdp" name="mdp" id="mdp">
        </div>
        <div class="form2">
          <input type="submit" name="Connexion">
        </div>
      </form>
</div>
<?php
        $utilisateurtableau = array();
        try {
            $bdd = new PDO('mysql:host=192.168.64.63;dbname=formulaire', 'root', 'root');
            $req = "SELECT * from User";
            $reponses = $bdd->query($req);
            while ($donnees = $reponses->fetch())
            {
                array_push($utilisateurtableau,new User($donnees['id'],$donnees['login'],$donnees['mdp']));
            } 

        } catch (Exception $z) {
            echo 'Exception reçue : ',  $z->getMessage() ;
        }
        if(isset($_POST["connexion"])){
            $trouve = false;
            foreach ($utilisateurtableau as  $utilisateur) {
                if($utilisateur->getNom()==$_POST['login']){
                    $trouve = true;
                   
                    if($utilisateur->seConnecter($_POST['mdp'])){
                        ?>
                        <h1>Connexion résussi</h1>
                        <?php
                    }else{
                        ?>
                        <h2>Vous n'etes pas connecté</h2>
                        <?php
                    }
                }
            }
        }
        ?>
</body>
</html>
