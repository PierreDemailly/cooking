<?php
include("template/header.php")
?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-8 mx-auto mt-5 d-flex flex-column">
         <form class="rounded border p-3 m-2 border-dark d-flex flex-column" action="index.php" method="post">
            <p class="mx-auto">Formulaire de connexion</p>
            Email : <input class="form-control" type="text" name="email" placeholder="Entrez votre email">
            Mot de passe : <input class="form-control" type="password" name="pass" placeholder="Entrez votre mot de passe">
            <div class="input-group mb-3">
              <div class="input-group-prepend mx-auto">
                <p class="input-group-text">Inscription automatique :</p>
                <div class="input-group-text mr-5">
                   
                  <input name="connexion_auto" type="checkbox" aria-label="Checkbox for following text input">
                </div>
                
              </div>
               
            </div>
            <button type="submit" class="col-6 mx-auto mt-5 btn btn-success">envoyer</button>
        </form>
        <a class="btn btn-success rounded border p-3 m-2 border-dark mx-auto" href="register.php">S'inscrire
        </a>
      </div>
    </div>
  </div>
</section>

<?php
include("template/footer.php")
?>