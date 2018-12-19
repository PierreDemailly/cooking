<section>
    
    <div class="container p-5">

            <form class="col-12 col-md-8 mx-auto p-5" method="post" enctype="multipart/form-data">
                
                <p class="form-title">Enregistrer une recette</p>
                        
                <?php if(isset($errors['recipe-title'])): ?>
                    <p class="alert alert-warning"><?= $errors['recipe-title'] ?></p>
                <?php endif; ?>
                <div class="col-md-12 mx-auto form-group">
                    <input class="form-control" type="text" id="recipe-title" name="name" placeholder="Exemple: Omelette aux champignons">
                    <label for="recipe-title"><small>Choisissez le titre de votre recette.</small></label>
                </div>
                <?php if(isset($errors['recipe-pic'])){ ?>

                    <p class="alert alert-warning"><?= $errors['recipe-pic'] ?></p>
   

                <?php } ?>
                <div class="col-md-12 mx-auto form-group">
                <div class="input-group">
                    <input class="btn-dark mx-auto mb-2 rounded py-1 px-2" type="file" name="picture">
                    <small>Ajoutez une photo. / Format du fichier: JPG. / Taille maximale du fichier: 1MO</small>
                </div>
                <hr>
            <div class="row mx-auto">
                <div class="col-md-4 mx-auto form-group">
                <?php if (isset($errors['recipe-type'])) { ?>

                    <p class="alert alert-warning"><?= $errors['recipe-type'] ?></p>


                <?php 
            } ?>
                    <select class="form-control" name="type" id="recipe-type">
                        <option selected disabled>Type de plat</option>
                        <option value="starter">Entrée</option>
                        <option value="main-course">Plat</option>
                        <option value="dessert">Dessert</option>
                        <option value="side">Accompagnement</option>
                        <option value="appetizer">Amuse gueule</option>
                        <option value="drink">Boisson</option>
                        <option value="candy">Confiserie</option>
                        <option value="sauce">Sauce</option>
                        <option value="tip">Conseil</option>
                    </select>
                    <label for="recipe-type"><small>Choisissez le type de plat correspondant à votre recette.</small></label>
                </div>
                <div class="col-md-4 mx-auto form-group">
                <?php if (isset($errors['recipe-difficulty'])) { ?>

                    <p class="alert alert-warning"><?= $errors['recipe-difficulty'] ?></p>


                <?php 
            } ?>
                    <select class="form-control" name="difficulty" id="recipe-difficulty">
                        <option selected disabled>Difficulté</option>
                        <option value="very-easy">Très facile</option>
                        <option value="easy">Facile</option>
                        <option value="medium">Moyen</option>
                        <option value="hard">Difficile</option>
                    </select>
                    <label for="recipe-difficulty"><small>Choisissez la difficulté de la recette.</small></label>
                </div>
                <div class="col-md-4 mx-auto form-group">
                <?php if (isset($errors['recipe-cost'])) { ?>

                    <p class="alert alert-warning"><?= $errors['recipe-cost'] ?></p>

                <?php 
            } ?>
                    <select class="form-control" name="cost" id="recipe-cost">
                        <option selected disabled>Coût</option>
                        <option value="cheap">Bon marché</option>
                        <option value="average">Moyen</option>
                        <option value="quite-expensive">Assez cher</option>
                        <option value="expensive">Très cher</option>
                    </select>
                    <label for="recipe-cost"><small>Évaluez le coût de cette recette.</small></label>
                </div>
                </div>
<hr>
                    <?php if (isset($errors['recipe-preparation-time'])) { ?>

                    <p class="alert alert-warning"><?= $errors['recipe-preparation-time'] ?></p>


                <?php 
            } ?>
                <div class="row form-group">
                    <div class="d-flex inline">
                        <input class="form-control input-number" type="number" name="preparation_time">
                        <small>Temps de préparation en minutes</small>
                    </div>
                    <?php if (isset($errors['recipe-cooking-time'])) { ?>

                    <p class="alert alert-warning"><?= $errors['recipe-cooking-time'] ?></p>


                <?php 
            } ?>
                    <div class="d-flex inline">
                        <input class="form-control input-number" type="number" name="cooking_time">
                        <small>Temps de cuisson en minutes</small>
                    </div>
                </div>
<hr>
                <?php if (isset($errors['recipe-for'])) { ?>

                    <p class="alert alert-warning"><?= $errors['recipe-for'] ?></p>

                <?php 
            } ?>
        
                <div class="row mx-auto inline col-md-12 form-group">
                
                        <p class="mt-3 mx-3">Pour</p>
                        <input class="mr-2 col-md-2 form-control input-number" type="number" name="nb" placeholder="x"> 
                        <input class="col-md-8 form-control" type="text" name="unite" placeholder="personne(s)">
                    
                    <small>Exemple: Pour 5 personnes, pour 1 litre, pour 6 pièces...</small>
                </div>
<hr>
                <p class="text-center font-weight-bold">Ingrédients (quantité et intitulé)</p>
                <div id="input_ingredients">
                    <?php if (isset($errors['recipe-ingredient'])) { ?>

                    <p class="alert alert-warning"><?= $errors['recipe-ingredient'] ?></p>

                <?php 
            } ?>
                   <div id="parent-1" class="form-group row mx-auto  col-md-12">
                            <input class="col-md-3 form-control" type="text" name="quantity[]" placeholder="Quantité">
                            <span class="mt-2 mx-2">de</span>
                            <input class="col-md-6 form-control" type="text" name="content_ingredient[]" placeholder="Ingrédient">
                            <button type="button" onclick="get_ingredient(this)" class="mx-2 btn btn-info">+</button>
                    </div>
                </div>
                    <small>Exemple: 5 cuillères à soupe de miel, 200 g de farine, 10 cl de lait... </small>
<hr>
                <p class="text-center font-weight-bold">Préparation de la recette</p>
<?php if (isset($errors['recipe-step'])) { ?>

                    <p class="alert alert-warning"><?= $errors['recipe-step'] ?></p>


                <?php 
            } ?>
                <div  id="stepDiv" class="justify-content-center form-group">

                    <div class="row">
                        <strong class="mt-2 mx-2">Étape 1:</strong>
                        <textarea class="col-md-9 form-control" type="text" rows="1" name="content_step[]" placeholder="Exemple: Mélanger le lait avec la farine"></textarea>
                        <button type="button" onclick="get_step(this)" class="mx-2 col-md-1 btn btn-info">+</button>
                    </div>
                     
                </div>
<hr>
<?php if (isset($errors['recipe-drink'])) { ?>

                    <p class="alert alert-warning"><?= $errors['recipe-drink'] ?></p>

                <?php 
            } ?>
                <div class="row justify-content-center form-group">
                    <input class="col-md-12 form-control" type="text" name="recipe-drink" placeholder="Exemple: vin rouge">
                    <small>Boisson conseillée</small>
                </div>

                <button class="btn btn-success col-md-12" name="recipe-submit">Envoyer</button>
        </form>

    </div>

</section>
