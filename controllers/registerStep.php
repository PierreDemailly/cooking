<?php

$userManager = new UserManager();
$recipeManager = new RecipeManager();

$LastRecipe = $recipeManager->getLastRecipeName();
if(isset($_POST['step'])){
    $recipeManager->addRecipeStep($_GET['id'], $_POST['step']);
}

include "./views/registerStepVue.php";
