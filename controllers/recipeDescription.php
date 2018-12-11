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
$userManager = new UserManager($db);
$arrayOfObjRecipe = $recipeManager->getAllRecipesName();
$recipeNameById = $recipeManager->getRecipeNameById($_GET['id']);
$arrayOfObjIngredient = $recipeManager->getIngredientById($_GET['id']);
$arrayOfObjStep = $recipeManager->getStepById($_GET['id']);
$propriet =  $userManager->getUSerbypseudo($_SESSION['email']);

if(isset($_POST['delete'])){
    $recipeManager->deleteRecipe($_GET['id']);
    header('Location: recipe.php');
}

if(isset($_POST['picture'])) {
    $objPictureRecipe = new PictureRecipe([
        "picture" => $_POST['picture'],
        "recipeId" => $_GET['id']
    ]);
    var_dump($objPictureRecipe);
    $recipeManager->addPictureRecipe($objPictureRecipe);
}


include "../views/recipeDescriptionVue.php";