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
$db = Database::DB();
$recipeManager = new RecipeManager($db);

$LastRecipe = $recipeManager->getLastRecipeName();
if(isset($_POST['ingredient'])){
    $recipeManager->addRecipeIngredient($_POST['ingredient'], $_GET['id']);
}







include "../views/registerIngredientVue.php";

