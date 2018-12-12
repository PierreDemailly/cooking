<?php

class RecipeManager extends Manager {

    public function getRecipes(){
        $object_recipes = [];
        $req = $this->getDb()->query('SELECT * FROM recipe');
        $data_recipes = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data_recipes as $recip) {
            $object_recipes[] = new Recipe($recip);

        }
        
         return $object_recipes;
        
    }

    public function getLastRecipeName(){
        $req = $this->getDb()->query('SELECT * FROM recipe ORDER BY id DESC LIMIT 1');
        $data_recipes = $req->fetch(PDO::FETCH_ASSOC);
        if($data_recipes==FALSE){
            return;
        }else{
            $object_last_recipe = new Recipe($data_recipes);
            return $object_last_recipe;
        }
        
    }
    public function addRecipeName(Recipe $objRecipeName){
        $req = $this->getDb()->prepare('INSERT INTO recipe(namerecipe, picture, userid) VALUES(:name_recipe, :picture, :userid)');
        $req->bindValue(':name_recipe', $objRecipeName->getNamerecipe(), PDO::PARAM_STR);
        $req->bindValue(':picture', $objRecipeName->getPicture(), PDO::PARAM_STR);
        $req->bindValue(':userid', $objRecipeName->getUserid(), PDO::PARAM_STR);
        $req->execute();
    }

    public function addRecipeStep($getId, $postStep){
        $req = $this->getDb()->prepare('INSERT INTO step(descriptionStep, recipeId) VALUES(:descriptionStep, :recipeId)');
        $req->bindValue(':descriptionStep', $postStep, PDO::PARAM_STR);
        $req->bindValue(':recipeId', $getId, PDO::PARAM_INT);
        $req->execute();
    }

    public function addRecipeIngredient($postIngredient, $getId)
    {
        $req = $this->getDb()->prepare('INSERT INTO ingredient(descriptionIngredient, recipeId) VALUES(:descriptionIngredient, :recipeId)');
        $req->bindValue(':descriptionIngredient', $postIngredient, PDO::PARAM_STR);
        $req->bindValue(':recipeId', $getId, PDO::PARAM_STR);
        $req->execute();
    }

    public function getAllRecipesName(){
        $req = $this->getDb()->query('SELECT * FROM recipe');
        $data_recipes = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach($data_recipes as $recipe){
            $arrayObjRecipes[] = new Recipe($recipe);
        }
        return $arrayObjRecipes;
    }

    public function getRecipeNameById($id){
        var_dump($id);
        $req = $this->getDb()->prepare('SELECT * FROM recipe WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $data_recipe = $req->fetch(PDO::FETCH_ASSOC);
        $objRecipe = new Recipe($data_recipe);
      
        return $objRecipe;
    }
    public function getIngredientById($getId){
        $arrayObjIngredient = [];
        $req = $this->getDb()->prepare('SELECT * FROM ingredient WHERE recipeId = :recipeId');
        $req->bindValue(':recipeId', $getId, PDO::PARAM_INT);
        $req->execute();
        $data_ingredients = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach($data_ingredients as $ingredient){
            $arrayObjIngredient[] = new Ingredient($ingredient);
        }
        return $arrayObjIngredient;
    }
     
    public function getStepById($id){
        $req = $this->getDb()->prepare('SELECT * FROM step WHERE recipeId = :recipeId');
        $req->bindValue(':recipeId', $id, PDO::PARAM_INT);
        $req->execute();
        $data_steps = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach($data_steps as $step){
            $arrayObjStep [] = new Step($step);
        }
        return $arrayObjStep;
    }

    public function deleteRecipe($id){
        $req = $this->getDb()->prepare('DELETE FROM recipe WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();

    }

    // public function addPictureRecipe(PictureRecipe $picture){
    //     $req = $this->getDb()->prepare('INSERT INTO pictures(picture, recipeId) VALUES(:picture, :recipeId)');
    //     $req->bindValue(':picture', $picture->getPicture(), PDO::PARAM_INT);
    //     $req->bindValue(':recipeId', $picture->getREcipeId(), PDO::PARAM_STR);
    //     $req->execute();
    // }

    // public function getPictureRecipeByIdRecipe(){
    //     $req = $this->getDb()->query('SELECT * FROM pictures');
    //     // $req->bindValue(':idRecipe', $idRecipe, PDO::PARAM_INT);
    //     // $req->execute();
    //     $dataPictureRecipe = $req->fetchAll(PDO::FETCH_ASSOC);
    //     foreach($dataPictureRecipe as $picture){
    //     $objPicture = new PictureRecipe($picture);
    //     }
    //     return $objPicture;
    // }

}
