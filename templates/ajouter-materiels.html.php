<!-- MAIN -->
<div class="container-main-material">
  <!-- BARRE GRISE -->
  <div class="top-container-material"> <a href="/?page=ensemble-materiel"><img src="./assets/img/arrow-return.svg"></a>
    <div class="top-txt-container"><a href="/?page=materiels">Matériels </a> / <a href="/?page=ensemble-materiel"> Tous les équipements </a>/ Ajouter des matériels</div>
  </div>
  <!-- CONTAINER GLOBAL -->
  <div class="container-material">
    <div class="flex-container">
      <div class="container-form-material">
        <form class="form-add-material" method="POST">
          <div>
            <div> 
            <div>
              <label for="file">
                <h3>Choisir un fichier (CSV):</h3>
              </label>
              <p>Il doit comprendre une ligne d'en tête : "firstname, lastname, email, password, id_role".
                Puis les informations de chaque utilisateurs dans le même ordre.
              </p>
              <input type="file" name="csv_file" id="csv_file" required>
              <!--Message d'erreur-->
              <?php if (isset($errors) && !empty($errors)) : ?>
                <div class="errors-inscr">
                  <?php foreach ($errors as $error) : ?>
                    <p><?= $error ?></p>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>

            <div class="submit-inscription">
              <input type="submit" name="submit" value="Ajouter">
              <?php if (isset($success) && !empty($success)) : ?>
                <div class="success-inscr">
                  <?= $success ?>
                </div>
              <?php endif; ?>
            </div>
            </div>
            <div><img src="./assets/img/background-update-users.svg"></div>
          </div>
      </div>
    </div>
  </div>
</div>