<?php

if(!isset($_SESSION['id']))
    header('Location: '.$path.'/login');
    
$recipeManager = new RecipeManager();

$arrayOfObjRecipe = $recipeManager->getAllRecipesName();

include "./views/recipeVue.php";
