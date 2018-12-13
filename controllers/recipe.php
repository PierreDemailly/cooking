<?php

if(!isset($_SESSION['id']))
    header('Location: '.$path.'/login');
    
$recipeManager = new RecipeManager();

$recipes = $recipeManager->getRecipes();

include './views/template/header.php';
include "./views/recipeVue.php";
include './views/template/footer.php';
