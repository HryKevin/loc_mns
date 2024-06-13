<!-- MAIN -->
<div class="container-main-index">
    <div class="container-main-add-users">
        <div class="top-container-add-users"></div>
        <div class="container-add-users">
            <div class="container-form-inscription">
                <form class="form-inscription" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="file"><h3>Choisir un fichier (CSV):</h3></label>
                        <p>Il doit comprendre une ligne d'en tête : "firstname, lastname, email, password, id_role".
                            Puis les informations de chaque utilisateurs dans le même ordre.
                        </p>
                        <input type="file" name="csv_file" id="csv_file" required>
                        <!--Message d'erreur-->
                        <?php if (isset($errors) && !empty($errors)): ?>
                            <div class="errors-inscr">
                                <?php foreach ($errors as $error): ?>
                                    <p><?= $error ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="submit-inscription">
                        <input type="submit" name="submit" value="Ajouter">
                        <?php if (isset($success) && !empty($success)): ?>
                            <div class="success-inscr">
                                <?= $success ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>