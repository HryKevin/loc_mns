<!-- MAIN -->
<div class="container-main-index">
    <div class="container-main-add-users">
        <div class="top-container-add-users"></div>
        <div class="container-add-users">
            <div class="container-form-inscription">
                <form class="form-inscription" method="POST">
                    <div>
                        <label for="name">Nom du matériel :</label>
                        <input type="text" name="users[lastname]" id="" value="<?= $material['name_material']?>" placeholder="Nom" required>
                        <!--Message d'erreur -->
                        <?php if (isset($errors) && !empty($errors['users']['lastname'])): ?>
                            <div class="errors-inscr">
                                <?= $errors['users']['lastname'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label for="description">Déscription :</label>
                        <input type="text" name="users[firstname]" id="firstname" value="<?= $material['description'] ?>" placeholder="Prénom"
                            required>
                        <?php if (isset($errors) && !empty($errors['users']['firstname'])): ?>
                            <div class="errors-inscr">
                                <?= $errors['users']['firstname'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    

                    <div>
                        <label for="serial_number">Numéro de série : </label>
                        <input type="email" name="users[email]" id="email" value="<?= $material['serial_number'] ?>" placeholder="Email" required>
                        <?php if (isset($errors) && !empty($errors['users']['email'])): ?>
                            <div class="errors-inscr">
                                <?= $errors['users']['email'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="password-inscr">
                        <label for="serial_number">Numéro de série : </label>
                        <input type="email" name="users[email]" id="email" value="<?= $material['serial_number'] ?>" placeholder="Email"
                            required>
                        <?php if (isset($errors) && !empty($errors['users']['email'])): ?>
                            <div class="errors-inscr">
                                <?= $errors['users']['email'] ?>
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
</div>


</div>
</div>