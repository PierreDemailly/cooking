<?php
include("template/header.php")
?>
<section>

        <div class="flex-wrap mt-5 p-3 d-flex justify-content-center">
            
            <?php if(isset($arrayOfObjRecipe)){foreach($arrayOfObjRecipe as $recipe){ ?>
                <!-- <a class="card col-md-3 m-1" href="recipeDescription.php?id=<?php echo $recipe->getId(); ?>">
                    <div class="sizeDiv">
                        <img src="../assets/img/dddddddddd" alt="pictureRecipe">
                        <p class="obs text-center font-weight-bold"><?php echo $recipe->getNamerecipe(); ?></p>
                    </div>
                </a> -->
                <div class="card m-2" style="width: 18rem;">
                    <img class="card-img-top" src="../assets/img/<?php echo $recipe->getPicture(); ?>" alt="Card image cap">
                    <a class="card-body" href="recipeDescription.php?id=<?php echo $recipe->getId(); ?>">
                        <div class="">
                            <p class="text-center text-white font-weight-bold card-text"><?php echo $recipe->getNamerecipe(); ?></p>
                        </div>
                    </a>
                </div>
            <?php } } ?>
            </div>
            
</section>

<?php
include("template/footer.php")
?>