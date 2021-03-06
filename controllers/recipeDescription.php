<?php
$recipeManager = new RecipeManager();
$userManager = new UserManager();
$recipe = $recipeManager->getRecipe($_GET['id']);

$ingredients = $recipeManager->getIngredient($_GET['id']);
$steps = $recipeManager->getStep($_GET['id']);
$user = $userManager->getUser($_SESSION['id']);
$author = $userManager->getUser($recipe->getUser_id());

if (isset($_POST['delete'])) {
    $recipeManager->deleteRecipe($_GET['id']);
    header('Location: ' . $path . '/recipe');
}


if (isset($_POST['picture'])) {
    //TODO: continuer le refactoring ici
    $objPictureRecipe = new PictureRecipe([
        "picture" => $_POST['picture'],
        "id" => $_GET['id']
    ]);
    // var_dump($objPictureRecipe);
    $recipeManager->addPictureRecipe($objPictureRecipe);
}

if(isset($_POST['comment'])){
    $objComment = new Comment([
        "comment" => $_POST['message'],
        "recipe_id" => $_GET['id'],
        "user_id" => $_SESSION['id']
    ]);

    $recipeManager->addComment($objComment);    
}

$comments = $recipeManager->getComments($_GET['id']);



include './views/template/header.php';
include "./views/recipeDescriptionVue.php";
include './views/template/footer.php';
