<?php

$recipeManager = new RecipeManager();

if (isset($_POST['name_recipe'])) {
    if (isset($_FILES['picture']) and $_FILES['picture']['error'] == 0) {
            // Testons si le fichier n'est pas trop gros//
        if ($_FILES['picture']['size'] <= 1000000) {
                    // Testons si l'extension est autorisée//
            $infosfichier = pathinfo($_FILES['picture']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_upload, $extensions_autorisees)) {
                            // On peut valider le fichier et le stocker définitivement//
                move_uploaded_file($_FILES['picture']['tmp_name'], './assets/img/' . basename($_FILES['picture']['name']));
    $objRecipeName = new Recipe([
        "namerecipe" => $_POST['name_recipe'],
        "picture" => $_FILES['picture']['name'],
        "userid" => $_SESSION['id']
    ]);
        var_dump($_FILES['picture']);
  $recipeManager->addRecipeName($objRecipeName);
 }
}
    }
}


$data_recipes = $recipeManager->getRecipes();
$LastRecipe = $recipeManager->getLastRecipeName();



include "./views/registerRecipeVue.php";
