<section>
    
    <div class="container p-5">

            <form class="px-5" method="post" enctype="multipart/form-data">
                
                <p class="form-title">Enregistrer une recette</p>
                        
                <div class="form-group">
                    <input class="form-control" type="text" id="recipe-title" name="recipe-title" placeholder="Exemple: Omelette aux champignons">
                    <label for="recipe-title"><small>Choisissez le titre de votre recette.</small></label>
                </div>

                <div class="form-group">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="recipe-pic" name="recipe-pic">
                        <label class="custom-file-label" for="recipe-pic">tartecitron.jpg</label>
                    </div>
                </div>
                    <small>Ajoutez une photo.<br>Format du fichier: JPG<br>Taille maximale du fichier: 1MO</small>
                </div>
                

                <div class="form-group">
                    <select class="form-control" name="recipe-type" id="recipe-type">
                        <option selected disabled>Type de plat</option>
                        <option value="starter">Entrée</option>
                        <option value="main-course">Plat</option>
                        <option value="dessert">Dessert</option>
                        <option value="side">Accompagnement</option>
                        <option value="appetize">Amuse gueule</option>
                        <option value="drink">Boisson</option>
                        <option value="candy">Confiserie</option>
                        <option value="sauces">Sauce</option>
                        <option value="tip">Conseil</option>
                    </select>
                    <label for="recipe-type"><small>Choisissez le type de plat correspondant à votre recette.</small></label>
                </div>

                <div class="form-group">
                    <select class="form-control" name="recipe-difficulty" id="recipe-difficulty">
                        <option selected disabled>Difficulté</option>
                        <option value="very-easy">Très facile</option>
                        <option value="easy">Facile</option>
                        <option value="medium">Moyen</option>
                        <option value="hard">Difficile</option>
                    </select>
                    <label for="recipe-difficulty"><small>Choisissez la difficulté de la recette.</small></label>
                </div>

                <div class="form-group">
                    <select class="form-control" name="recipe-cost" id="recipe-cost">
                        <option selected disabled>Coût</option>
                        <option value="cheap">Bon marché</option>
                        <option value="average">Moyen</option>
                        <option value="quite-expensive">Assez cher</option>
                        <option value="expensive">Très cher</option>
                    </select>
                    <label for="recipe-cost"><small>Évaluez le coût de cette recette.</small></label>
                </div>

                <div class="form-group">
                    <input class="form-control input-number" type="number" name="recipe-preparation-time">
                    <small>Temps de préparation en minutes</small>
                    <input class="form-control input-number" type="number" name="recipe-cooking-time">
                    <small>Temps de cuisson en minutes</small>
                </div>

                <div class="form-group">
                    Pour <input class="form-control input-number" type="number" name="recipe-for-quantity" placeholder="x"> <input class="form-control" type="text" name="recipe-for" placeholder="personne(s)">
                    <small>Exemple: Pour 5 personnes, pour 1 litre, pour 6 pièces...</small>
                </div>

                <p>Ingrédients (quantité et intitulé)</p>

                <div class="form-group">
                    <input class="form-control" type="text" name="recipe-ingredien-quantity" placeholder="Quantité">
                    de
                    <input class="form-control" type="text" name="recipe-ingredien" placeholder="Ingrédient">
                    <small>Exemple: 5 cuillères à soupe de miel, 200 g de farine, 10 cl de lait... </small>
                    <button type="button" class="btn btn-info">+</button>
                </div>

                <p>Préparation de la recette</p>

                <div class="form-group">
                    <strong>Étape 1:</strong>
                    <input class="form-control" type="text" name="recipe-step" placeholder="Exemple: Mélanger le lait avec la farine">
                    <button type="button" class="btn btn-info">+</button>
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="recipe-drink" placeholder="Exemple: vin rouge">
                    <small>Boisson conseillée</small>
                </div>

                <button class="btn btn-success" name="recipe-submit">Envoyer</button>
        </form>

    </div>

</section>
