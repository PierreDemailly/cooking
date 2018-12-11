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
$recipeManager = new RecipeManager($db);

$LastRecipe = $recipeManager->getLastRecipeName();
if(isset($_POST['step'])){
    $recipeManager->addRecipeStep($_GET['id'], $_POST['step']);
}

include "../views/registerStepVue.php";