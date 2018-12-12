<section>
  <div class="container">
    <div class="row">
        <form class="rounded mt-5 border border-dark col-12 col-md-8 mx-auto p-3 m-2 d-flex flex-column" method="post" enctype="multipart/form-data">
          <p class="mx-auto">Formulaire d'inscription</p>

          Pseudo : <input class="form-control" type="text" name="pseudo" placeholder="Pseudo">
          Mot de passe : <input class="form-control" type="password" name="pass" placeholder="Mot de passe">
          Confirmation du mot de passe<input class="form-control" type="password" name="pass_2" placeholder="Confirmation mot de passe">
          Email : <input class="form-control" type="text" name="email" placeholder="Adresse e-mail">
            Votre photo :
          <div class="input-group mb-3">
            <div class="custom-file">
              <input name="avatar" type="file" class="custom-file-input" id="inputGroupFile02">
              <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choisir votre fichier</label>
            </div>
          </div>

          <button type="submit" class="col-6 mx-auto mt-5 btn btn-success">Envoyer</button>
        </form>
      </div>
  </div>
</section>
