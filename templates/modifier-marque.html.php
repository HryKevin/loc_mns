<!-- MAIN -->
<div class="container-main-index">
    <div class="container-main-add-users">
        <div class="top-container-add-users"></div>
        <div class="container-add-users">
            <div class="container-form-inscription">
                <form class="form-inscription" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="lastname">Nom de la marque:</label>
                        <input type="text" name="brand[name_brand]" value="<?= $brand['name_brand'] ?> "
                            placeholder="Nom" required>
                        <!--Message d'erreur -->
                        <?php if (isset($errors) && !empty($errors['brand']['name_brand'])): ?>
                            <div class="errors-inscr">
                                <?= $errors['brand']['name_brand'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label for="image">Image :</label>
                        <input type="file" name="brand[image]" value="<?= $brand['image'] ?>" required>
                        <img style="height:50px" src="<?= $brand['image'] ?>">
                        <?php if (isset($errors) && !empty($errors['brand']['image'])): ?>
                            <div class="errors-inscr">
                                <?= $errors['brand']['image'] ?>
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