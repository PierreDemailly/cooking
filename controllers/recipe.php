<?php

if(!isset($_SESSION['id']))
    header('Location: '.$path.'/login');
    
$recipeManager = new RecipeManager();

$arrayOfObjRecipe = $recipeManager->getAllRecipesName();

include './views/template/header.php';
include "./views/recipeVue.php";
include './views/template/footer.php';
