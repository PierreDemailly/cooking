<?php
include("template/header.php")
?>
<section>
    <div class="container">
    <div class="size">
                <img src="<?= $path ?>/assets/img/<?php echo $propriet->getAvatar(); ?>" alt="">
    </div>
        <div class="row flex-column"> 
            <h1 class="text-white mt-2 font-weight-bold mx-auto"><?php echo $recipeNameById->getNamerecipe(); ?></h1>
            
        </div>
        <div class="bg-light p-5 row d-flex justify-content-center">
            <div class="d-flex flex-column col-md-6">
                <ul>
                <?php foreach ($arrayOfObjIngredient as $ingredient) { ?>
                    <li><?php echo $ingredient->getDescriptionIngredient(); ?></li>
                <?php 
            } ?>
            </ul>


            </div>
            <div class="d-flex flex-column col-md-6 mb-5">
                <ul>
                <?php foreach ($arrayOfObjStep as $step) { ?>
                    <li><?php echo $step->getDescriptionStep(); ?></li>
                <?php 
            } ?>
            </ul>
            </div>
             
            <form action="<?= $path ?>/recipe_description/<?= $_GET['id']; ?>" method="post">
                <input type="hidden" name="delete">
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </div>

    </div>
</section>

<?php
include("template/footer.php")
?>
