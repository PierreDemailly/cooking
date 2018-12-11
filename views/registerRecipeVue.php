<?php
include("template/header.php")
?>

<section>
    
    <div class="container">
    
        
        <?php if(isset($_GET['id'])){ ?>
            <div class="row">
                <a class="mt-5 btn btn-success mx-auto" href="<?= $path ?>/register_step/<?= $LastRecipe->getId(); ?>">La premiere étape</a>
            </div>
            <?php }else{?>
        <form class="p-5 mt-3 col-12 mx-auto d-flex flex-column" action="<?= $path ?>/register_recipe/" method="post" enctype="multipart/form-data">
            
            <input class="form-control mx-auto" type="text" name="name_recipe" placeholder="Nom de la recette" required>
            <input class="mx-auto mt-5" type="file" name="picture" value="picture">
            <div class="row">
                <button type="submit" class="col-6 mx-auto mt-5 btn btn-success">Envoyer</button>
            </div>
        </form>
        <?php } ?>
        </div>
</section>

<?php
include("template/footer.php")
?>
