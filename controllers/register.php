<?php
$userManager = new UserManager();

// user must not be here if he already logged in
if(isset($_SESSION['id']))
    header('Location: '.$path.'/recipe');
    
if (isset($_POST['register'])) 
{
    $errors = array();

    if(empty($_POST['pseudo']) OR empty($_POST['password']) OR empty($_POST['password-v']) or empty($_POST['email']) or empty($_FILES['avatar']))
        $errors['form'] = "Veuillez remplir tous les champs.";

    if(strlen($_POST['pseudo']) < 3 OR strlen($_POST['pseudo'] > 26))
        $errors['pseudo'] = "Votre pseudo doit faire entre 3 et 26 caractères";
    elseif($userManager->pseudoExist($_POST['pseudo']))
        $errors['pseudo'] = "Votre pseudo est déjà pris.";

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        $errors['email'] = "Veuillez entrer une adresse mail valide.";
    elseif($userManager->emailExist($_POST['email']))
        $errors['email'] = "Cette adresse email est déjà associée à un compte.";
    
    if($_POST['password'] !== $_POST['password-v'])
        $errors['password'] = $errors['password-v'] = "Les mots de passe doivent être identique.";

    if($_FILES['avatar']['error'] !== 0)
        $errors['avatar'] = "Il y a eu un problème lors de l'envoie du fichier.";
    elseif($_FILES['avatar']['size'] > 1000000)
        $errors['avatar'] = "Votre image est trop volumineuse.";
    elseif(!in_array(pathinfo($_FILES['avatar']['name'])['extension'], ['jpg', 'jpeg', 'png']))
        $errors['avatar'] = "Le format de votre image n'est pas autorisé (jpg, jpeg, png).";

    if(empty($errors))
    {
        move_uploaded_file($_FILES['avatar']['tmp_name'], './assets/img/avatars/'.basename($_FILES['avatar']['name']));
        
        $user = new User($_POST);
        $user->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
        $user->setAvatar(basename($_FILES['avatar']['name']));
        $userManager->addUser($user);

        $_SESSION['id'] = $userManager->getUser($_POST['email'])->getId();
        header('Location: '.$path.'/recipe');
    }
}

include './views/template/header.php';
include "./views/registerView.php";
include './views/template/footer.php';
