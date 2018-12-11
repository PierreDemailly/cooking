<?php
function chargerClasse($classname)
{
    if (file_exists('../models/' . $classname . '.php')) {
        require '../models/' . $classname . '.php';
    } else {
        require '../entities/' . $classname . '.php';
    }
}
spl_autoload_register('chargerClasse');
$db = Database::DB();
$userManager = new UserManager($db);
if(!empty($_POST['email'])){
    $data_user = $userManager->getUSerbypseudo($_POST['email']);
    if($userManager->getUSerbypseudo($_POST['email'])){
        $isPasswordCorrect = password_verify($_POST['pass'], $data_user->getPass());
        if($isPasswordCorrect){
            
            session_start();
            $_SESSION['user_id'] = $data_user->getIdUser();
            $_SESSION['pseudo'] = $data_user->getPseudo();
            $_SESSION['email'] = $data_user->getEmail();
            $_SESSION['avatar'] = $data_user->getAvatar();
            header('Location:recipe.php');
        }else{
            echo 'Le mot de passe est incorrecte';
        }
    }else{
       echo 'Vous devez vous inscrire'; 
    }
    if ($_POST['connexion_auto'] == 'on') {
        setcookie('email', $_POST['email'], time() + 365 * 24 * 3600, null, null, false, true);
        setcookie('pass', password_hash($_POST['pass'], PASSWORD_DEFAULT), time() + 365 * 24 * 3600, null, null, false, true);
    }
    
}


include "../views/indexVue.php";