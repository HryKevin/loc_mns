<!-- MAIN -->
<div class="container-main-index">
    <div class="container-main-add-users">
        <!-- BARRE GRISE -->

        <div class="top-container-add-users"> <img id= "backButton"src="./assets/img/arrow-return.svg">
            <div class="top-txt-container"><a href="/?page=materiels">Matériels </a> / <a href="/?page=categories"> Catégories </a>/ Ajouter une catégorie</div>
        </div>
        <div class="container-add-users">
            <div class="container-form-inscription">
                <form class="form-inscription" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="lastname">Nom de la catégorie :</label>
                        <input type="text" name="category[name_category]" value="" placeholder="Nom" required>
                        <!--Message d'erreur -->
                        <?php if (isset($errors) && !empty($errors['category']['name_category'])) : ?>
                            <div class="errors-inscr">
                                <?= $errors['category']['name_category'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label for="image">Image :</label>
                        <input type="file" name="category[image]" value="" required>
                        <?php if (isset($errors) && !empty($errors['category']['image'])) : ?>
                            <div class="errors-inscr">
                                <?= $errors['category']['image'] ?>
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

                </form>
            </div>



        </div>

    </div>
</div>
</div>
</div>
<script src="./assets/js/retour.js"></script>