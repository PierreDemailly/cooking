<?php

class IngredientManager extends Manager{

    public function addIngredient(Ingredient $ingredient){
        $req = $this->db->prepare('INSERT INTO ingredient(content_ingredient, quantity, recipe_id) VALUES (:content_ingredient, :quantity, :recipe_id)');
        $req->bindValue('content_ingredient', $ingredient->getContent_ingredient(), PDO::PARAM_STR);
        $req->bindValue('quantity', $ingredient->getQuantity(), PDO::PARAM_STR);
        $req->bindValue('recipe_id', $ingredient->getRecipe_id(), PDO::PARAM_STR);
        $req->execute();

    }
}