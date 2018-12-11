<?php
session_start();
function chargerClasse($classname)
{
    if (file_exists('../models/' . $classname . '.php')) {
        require '../models/' . $classname . '.php';
    } else {
        require '../entities/' . $classname . '.php';
    }
}
spl_autoload_register('chargerClasse');

// On se connecte à la base de données
$db = Database::DB();
$userManager = new UserManager($db);


if (isset($_POST['pseudo']) and isset($_POST['pass'])) {
    $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
//secure html charactere for all variable//
    $pass = htmlspecialchars($_POST['pass']);
    $pass_2 = htmlspecialchars($_POST['pass_2']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $avatar = $_FILES['avatar']['name'];
  //if variable is not empty//
    if (!empty($pseudo) and !empty($pass)) {
    //if mail is valide using REGEX//
        if (preg_match("#^[a-z0-9-._]+@[a-z0-9-._]{2,}\.[a-z]{2,4}$#", $email)) {
      //if pseudo is already use//
            if ($userManager->exist($_POST['pseudo']) === FALSE) {
        //if password is already use//
                if ($pass == $pass_2) {
          // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur//
                    if (isset($_FILES['avatar']) and $_FILES['avatar']['error'] == 0) {
            // Testons si le fichier n'est pas trop gros//
                        if ($_FILES['avatar']['size'] <= 1000000) {
                    // Testons si l'extension est autorisée//
                            $infosfichier = pathinfo($_FILES['avatar']['name']);
                            $extension_upload = $infosfichier['extension'];
                            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                            if (in_array($extension_upload, $extensions_autorisees)) {
                            // On peut valider le fichier et le stocker définitivement//
                                move_uploaded_file($_FILES['avatar']['tmp_name'], '../assets/img/' . basename($_FILES['avatar']['name']));
                            // echo "L'envoi a bien été effectué !";
                                $user = new User([
                                    "pseudo" => $pseudo,
                                    "pass"=> $pass_hache,
                                    "email"=>$email,
                                    "avatar"=>$avatar
                                ]);
                                
                                $userManager->addUser($user);
                                header('Location: index.php');
                                
                                
                            } else {
                                echo "le format du fichier n'est pas autorisé(jpg, jpeg, gif, png)";
                            }
                        } else {
                            echo "la taille du fichier est superieur a 1mo";
                        }
                    } else {
                        echo "probleme lors de l'envoi";
                    }
                } else {
                    echo "les mots de passe sont differents";
                }
            } else {
                echo "le pseudo est deja utilisé";
            }
        } else {
            echo "l'adresse email n'est pas valide";
        }
    } else {
        echo "le champ du pseudo ou du mot est vide";
    }
}


if (isset($_POST['deconnexion'])) {
    // Suppression des variables de session et de la session
    $_SESSION = array();
    session_destroy();

// Suppression des cookies de connexion automatique

    setcookie('email', '');
    setcookie('pass', '');
    header('Location:index.php');
}



include "../views/registerVue.php";

?>
