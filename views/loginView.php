<section>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-8 mx-auto mt-5 d-flex flex-column">
         <form class="rounded border p-3 m-2 border-dark d-flex flex-column" method="post">

            <p class="mx-auto">Formulaire de connexion</p>

            <?php if(isset($errors['email'])): ?>
            <p class="alert alert-warning"><?= $errors['email'] ?></p>
            <?php endif; ?>

            <div class="form-group">
              <label for="email">Email:</label>
              <input class="form-control" type="text" id="email" name="email" placeholder="Entrez votre email">
            </div>

            <?php if(isset($errors['password'])): ?>
            <p class="alert alert-warning"><?= $errors['password'] ?></p>
            <?php endif; ?>

            <div class="form-group">
              <label for="pass">Mot de passe:</label>
              <input class="form-control" type="password" id="pass" name="pass" placeholder="Entrez votre mot de passe">
            </div>

            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" name="stay-auth" id="stay-auth">
              <label class="form-check-label" for="stay-auth">Rester connecté</label>
            </div>

            <button class="btn btn-success" name="login">envoyer</button>

        </form>
        <a class="btn btn-success rounded border p-3 m-2 border-dark mx-auto" href="<?= $path ?>/register">S'inscrire
        </a>
      </div>
    </div>
  </div>
</section>
