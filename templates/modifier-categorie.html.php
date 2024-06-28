<!-- MAIN -->
<div class="container-main-index">
    <div class="container-main-add-users">
        <div class="top-container-add-users"></div>
        <div class="container-add-users">
            <div class="container-form-inscription">
                <form class="form-inscription" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="lastname">Nom de la catégorie :</label>
                        <input type="text" name="category[name_category]" value="<?= $category['name_category'] ?> "
                            placeholder="Nom" required>
                        <!--Message d'erreur -->
                        <?php if (isset($errors) && !empty($errors['category']['name_category'])): ?>
                            <div class="errors-inscr">
                                <?= $errors['category']['name_category'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label for="image">Image :</label>
                        <input type="file" name="category[image]" value="<?= $category['image'] ?>" required>
                        <img style="height:50px" src="<?= $category['image'] ?>">
                        <?php if (isset($errors) && !empty($errors['category']['image'])): ?>
                            <div class="errors-inscr">
                                <?= $errors['category']['image'] ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="submit-inscription">
                        <input type="submit" name="submit" value="Modifier">
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
</div>


</div>
</div>